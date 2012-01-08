<?php
/**
*
* @copyright (c) 2011 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
* Instructions: You must be logged in as an administrator to use this file.
* Copy this file to your phpBB root directory, then access it from your browser.
*/

/**
* @ignore
*/
define('IN_PHPBB', true);
$phpbb_root_path = './';
$phpEx = substr(strrchr(__FILE__, '.'), 1);
include($phpbb_root_path . 'common.' . $phpEx);
include($phpbb_root_path . 'includes/db/db_tools.' . $phpEx);

// Start session management
$user->session_begin();
$auth->acl($user->data);
$user->setup('common');
if (!$auth->acl_get('a_'))
{
	trigger_error($user->lang['NOT_AUTHORISED']);
}
$message = '';
$error = false;
$sql_array = array();
$db->sql_return_on_error(false);
$db_tools = new phpbb_db_tools($db);
$db_tools->return_statements = true;
$user->add_lang('mods/pre-install_check');

$usr = array();
$usernames = array();
$sql_query = 'SELECT user_id, username, user_email FROM ' . USERS_TABLE . ' WHERE username ' . $db->sql_like_expression($db->any_char . '@' . $db->any_char . '.' . $db->any_char);
$result = $db->sql_query($sql_query);
while ($row = $db->sql_fetchrow($result))
{
	$user_info[$row['username']] = $row;
	$usernames[] = $row['username'];
}
$db->sql_freeresult($result);

// We now have a list of usernames that could be email addresses, so check 
// to see if anyone has an email address matching one of these usernames.
$warn = '';
if (!empty($usernames))
{
	$sql_query = 'SELECT user_id, username, user_email FROM ' . USERS_TABLE . ' WHERE ' . $db->sql_in_set('user_email', $usernames);
	$result = $db->sql_query($sql_query);
	while ($row = $db->sql_fetchrow($result))
	{
		$usr = $user_info[$row['user_email']];
		$user1 = '<a href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=viewprofile&amp;u=' . htmlspecialchars($usr['user_id'])) . '" title="' . $user->lang['EMAIL']  . ': ' . htmlspecialchars($usr['user_email']) . '" style="font-weight:bold;">' . htmlspecialchars($usr['username']) . '</a>';
		$user2 = '<a href="' . append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=viewprofile&amp;u=' . htmlspecialchars($row['user_id'])) . '" title="' . $user->lang['EMAIL']  . ': ' . htmlspecialchars($row['user_email']) . '" style="font-weight:bold;">' . htmlspecialchars($row['username']) . '</a>';
		$warn .= '<span style="color:#FF0000;font-style:italic;">' . $user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK_WARNING'] . ':</span> ' . sprintf($user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK_MATCH'], $user1, $user2) . '<br />';
	}
	$db->sql_freeresult($result);
}
$result = $warn ? $user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK_RESOLVE'] : $user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK_OKAY'];
$message  = '<strong>' . $user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK'] . '</strong><br /><br />';
$message .= $user->lang['PRIME_LOGIN_VIA_EMAIL_PRECHECK_EXPLAIN'] . ' ' . $result . '<br /><br />' . $warn;
trigger_error($message);

?>