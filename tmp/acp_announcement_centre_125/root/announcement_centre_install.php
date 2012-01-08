<?php
/**
 *
 * @author lefty74 (Heiko Carsteens) lefty@lefty74.com
 * @version $Id$
 * @copyright (c) 2011 lefty74
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 *
 */

/**
 * @ignore
 */
define('UMIL_AUTO', true);
define('IN_PHPBB', true);
$phpbb_root_path = (defined('PHPBB_ROOT_PATH')) ? PHPBB_ROOT_PATH : './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);

include($phpbb_root_path . 'common.' . $phpEx);
$user->session_begin();
$auth->acl($user->data);
$user->setup();

if (!file_exists($phpbb_root_path . 'umil/umil_auto.' . $phpEx))
{
	trigger_error('Please download the latest UMIL (Unified MOD Install Library) from: <a href="http://www.phpbb.com/mods/umil/">phpBB.com/mods/umil</a>', E_USER_ERROR);
}

// The name of the mod to be displayed during installation.
$mod_name = 'ACP_ANNOUNCEMENT_TITLE';

/*
* The name of the config variable which will hold the currently installed version
* UMIL will handle checking, setting, and updating the version itself.
*/
$version_config_name = 'acmod_version';


// The language file which will be included when installing
$language_file = 'mods/announcement_centre';


/*
* Optionally we may specify our own logo image to show in the upper corner instead of the default logo.
* $phpbb_root_path will get prepended to the path specified
* Image height should be 50px to prevent cut-off or stretching.
*/
//$logo_img = 'styles/prosilver/imageset/site_logo.gif';

/*
* The array of versions and actions within each.
* You do not need to order it a specific way (it will be sorted automatically), however, you must enter every version, even if no actions are done for it.
*
* You must use correct version numbering.  Unless you know exactly what you can use, only use X.X.X (replacing X with an integer).
* The version numbering must otherwise be compatible with the version_compare function - http://php.net/manual/en/function.version-compare.php
*/

// prepare to fill some of the columns
$uid_text = $bitfield_text = $options_text = ''; // will be modified by generate_text_for_storage
$uid_text_guests = $bitfield_text_guests = $options_text_guests = ''; // will be modified by generate_text_for_storage
$uid_draft = $bitfield_draft = $options_draft = ''; // will be modified by generate_text_for_storage
$allow_bbcode = $allow_urls = $allow_smilies = true;
$announcement_text = '[color=red][b]Site Announcements[/b][/color] can be seen here!! :mrgreen:';
$announcement_text_guests = '[color=green][b]Guest Announcements[/b][/color] can be seen here!! :wink:';
$announcement_draft = '[color=red][b]Draft Announcements[/b][/color] can be seen here!! :mrgreen:';

generate_text_for_storage($announcement_text, $uid_text, $bitfield_text, $options_text, $allow_bbcode, $allow_urls, $allow_smilies);
generate_text_for_storage($announcement_text_guests, $uid_text_guests, $bitfield_text_guests, $options_text_guests, $allow_bbcode, $allow_urls, $allow_smilies);
generate_text_for_storage($announcement_draft, $uid_draft, $bitfield_draft, $options_draft, $allow_bbcode, $allow_urls, $allow_smilies);

$versions = array(
	'1.2.2' => array(
		
		'permission_add' => array(
			array('a_announcement_centre', 1),
			array('m_announcement_centre', 1),
		),

		'table_add' => array(
			array('phpbb_announcement_centre', array(
				'COLUMNS'      => array(
					'announcement_forum_id'         			=> array('UINT', 0),
					'announcement_topic_id'   					=> array('UINT', 0),
					'announcement_post_id'   					=> array('UINT', 0),
					'announcement_gopost'   					=> array('BOOL', 0),
					'announcement_first_last_post'  			=> array('VCHAR:4', 0),
					'announcement_draft'   						=> array('TEXT_UNI', ''),
					'announcement_draft_bbcode_uid'   			=> array('VCHAR:8', ''),
					'announcement_draft_bbcode_bitfield'  		=> array('VCHAR:255', ''),
					'announcement_draft_bbcode_options'			=> array('UINT:11', 7),
					'announcement_text'   						=> array('TEXT_UNI', ''),
					'announcement_text_bbcode_uid'   			=> array('VCHAR:8', ''),
					'announcement_text_bbcode_bitfield'  		=> array('VCHAR:255', ''),
					'announcement_text_bbcode_options'			=> array('UINT:11', 7),
					'announcement_text_guests'   				=> array('TEXT_UNI', ''),
					'announcement_text_guests_bbcode_uid'   	=> array('VCHAR:8', ''),
					'announcement_text_guests_bbcode_bitfield'  => array('VCHAR:255', ''),
					'announcement_text_guests_bbcode_options'	=> array('UINT:11', 7),
					'announcement_title'  						=> array('VCHAR:255', ''),
					'announcement_title_guests'  				=> array('VCHAR:255', ''),
				),
			)),
		),
			
		// next let's add our module		
		'module_add' => array(
			array('acp', 'ACP_CAT_DOT_MODS', 'ACP_ANNOUNCEMENTS_CENTRE'),


			array('acp', 'ACP_ANNOUNCEMENTS_CENTRE', array(
				'module_basename'	=> 'announcements_centre',
				),
			),
		
			array('mcp', '', 'MCP_ANNOUNCEMENTS_CENTRE'),

			array('mcp', 'MCP_ANNOUNCEMENTS_CENTRE', array(
					'module_basename'	=> 'announce',
			)),	
		),

		//now some configs
		'config_add' => (array(
			array('announcement_enable', true),
			array('announcement_show_index', false),
			array('announcement_enable_guests', true),
			array('announcement_show', true),
			array('announcement_show_birthdays', true),
			array('announcement_birthday_avatar', true),
			array('announcement_ava_max_size', 40, true),
			array('announcement_show_birthdays_always', true),
			array('announcement_show_birthdays_and_announce', true),
			array('announcement_show_group', 0, true),
			array('announcement_align', 'center'),
			array('announcement_guests_align', 'center'),
		)),

	),

	'1.2.3' => array(),
	
	'1.2.4' => array(

		'table_remove'=> array('phpbb_announcement_centre'),
		
		'table_add' => array(
			array('phpbb_announcement_centre', array(
				'COLUMNS'      => array(
					'announcement_forum_id'         => array('UINT', 0),
					'announcement_topic_id'   		=> array('UINT', 0),
					'announcement_post_id'   		=> array('UINT', 0),
					'announcement_gopost'   		=> array('BOOL', 0),
					'announcement_first_last_post'  => array('VCHAR:4', 0),
					'announcement_draft'   			=> array('TEXT_UNI', ''),
					'announcement_draft_uid'   		=> array('VCHAR:8', ''),
					'announcement_draft_bitfield'  	=> array('VCHAR:255', ''),
					'announcement_draft_options'	=> array('UINT:11', 7),
					'announcement_text'   			=> array('TEXT_UNI', ''),
					'announcement_text_uid'   		=> array('VCHAR:8', ''),
					'announcement_text_bitfield'  	=> array('VCHAR:255', ''),
					'announcement_text_options'		=> array('UINT:11', 7),
					'announcement_text_guests'   	=> array('TEXT_UNI', ''),
					'announcement_text_guests_uid'  => array('VCHAR:8', ''),
					'announcement_text_guests_bit'  => array('VCHAR:255', ''),
					'announcement_text_guests_opt'	=> array('UINT:11', 7),
					'announcement_title'  			=> array('VCHAR:255', ''),
					'announcement_title_guests'  	=> array('VCHAR:255', ''),
				),
			)),
		),

		// Now we need to insert some data.
		'table_insert'	=> array(
			array('phpbb_announcement_centre', array(
				array(
					'announcement_title' 			=> 'Site Announcements',
					'announcement_text' 			=> (string) $announcement_text,
					'announcement_gopost' 			=> 0,
					'announcement_forum_id' 		=> 0,
					'announcement_topic_id' 		=> 0,
					'announcement_post_id' 			=> 0,
					'announcement_first_last_post' 	=> 'DESC',
					'announcement_text_uid'		 	=> (string) $uid_text,
					'announcement_text_bitfield'	=> (string) $bitfield_text,
					'announcement_text_options' 	=> (int) 	$options_text,
					'announcement_draft' 			=> (string) $announcement_draft,
					'announcement_draft_uid' 		=> (string) $uid_draft,
					'announcement_draft_bitfield' 	=> (string) $bitfield_draft,
					'announcement_draft_options' 	=> (int) 	$options_draft,
					'announcement_title_guests' 	=> 'Guest Announcements',
					'announcement_text_guests' 		=> (string) $announcement_text_guests,
					'announcement_text_guests_uid' 	=> (string) $uid_text_guests,
					'announcement_text_guests_bit' 	=> (string) $bitfield_text_guests,
					'announcement_text_guests_opt' 	=> (int) 	$options_text_guests,
				),
			)),
		),			
	),

	'1.2.5' => array(),

);

// Include the UMIL Auto file, it handles the rest
include($phpbb_root_path . 'umil/umil_auto.' . $phpEx);
?>