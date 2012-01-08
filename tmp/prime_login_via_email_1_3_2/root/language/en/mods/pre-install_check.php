<?php
/**
*
* pre-install_check [English]
*
* @package language
* @copyright (c) 2008 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine
//
// Some characters you may want to copy&paste:
// ’ » “ ” …
//

$lang = array_merge($lang, array(
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK'			=> 'Pre-Installation Check for Prime Login Via E-Mail',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_EXPLAIN'	=> 'The search for usernames that match with existing e-mail addresses has completed.',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_OKAY'		=> 'No conflicts were found, and you may proceed with installation!',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_WARNING'	=> 'Warning',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_MATCH'		=> 'The username %1$s matches the e-mail address of %2$s.',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_RESOLVE'	=> 'You should resolve any matches before installing this modification.',
));

?>