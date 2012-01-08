<?php
/**
*
* @copyright (c) 2011 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
* Instructions: You must be logged in as an administrator to use this file.
* Copy this file to your phpBB root directory, then access it from your browser.
* Make sure to delete this file when the update is complete.
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
$user->setup('acp/common');
if (!$auth->acl_get('a_'))
{
	trigger_error($user->lang['NOT_AUTHORISED']);
}

$message = '';
$error = false;
$sql_array = array();
$db->sql_return_on_error(true);
$db_tools = new phpbb_db_tools($db);
$db_tools->return_statements = true;


/**
* Build an SQL query string for adding a new config setting if it does not already exist.
*/
function sql_add_config($data)
{
	global $db;
	
	$sql_query = 'SELECT COUNT(*) as total FROM ' . CONFIG_TABLE . " WHERE config_name = '{$data['config_name']}'";
	$result = $db->sql_query($sql_query);
	$total = (int) $db->sql_fetchfield('total');
	$db->sql_freeresult($result);
	$sql_query = !empty($total) ? '' : 'INSERT INTO ' . CONFIG_TABLE . ' ' . $db->sql_build_array('INSERT', $data);
	return $sql_query;
}

// SQL Statements
//---------------------------------------------------------------------------//
$mod_name = 'Prime Login via E-Mail';

$sql_array['install'][] = 'INSERT INTO ' . CONFIG_TABLE . ' ' . $db->sql_build_array('INSERT', array(
							'config_name'	=> 'login_via_email_enable',
							'config_value'	=> 1,
							'is_dynamic'	=> 0));

$sql_array['remove'][] = 'DELETE FROM ' . CONFIG_TABLE . ' WHERE config_name = \'login_via_email_enable\'';

//---------------------------------------------------------------------------//

// Language strings
$user->add_lang('install');
$user->add_lang('acp/common');
$user->lang['SQL_STATEMENT_SQL']    	= $user->lang['SQL'];
$user->lang['SQL_STATEMENT_SUCCESS']	= $user->lang['DONE'];
$user->lang['SQL_STATEMENT_FAILURE']	= $user->lang['ERROR'];
$user->lang['SQL_RESULT_SUCCESS']		= $user->lang['UPDATE_DB_SUCCESS'];
$user->lang['SQL_RESULT_FAILURE']		= $user->lang['SOME_QUERIES_FAILED'];
$user->lang['DB_UPDATE_TITLE']			= $user->lang['STAGE_UPDATE_DB'];
$user->lang['DB_UPDATE_INSTALL']		= $user->lang['INSTALL'];
$user->lang['DB_UPDATE_REMOVE']			= $user->lang['REMOVE'];
$user->lang['DB_UPDATE_PREVIEW']		= $user->lang['PREVIEW'];
$user->lang['DB_UPDATE_EXECUTE']		= $user->lang['RUN_DATABASE_SCRIPT']; // $user->lang['SUBMIT']
$user->lang['DB_UPDATE_NONE']			= $user->lang['NA'];

function execute_sql_list($sql_list, $preview = false)
{
	global $user, $db, $error;
	
	$message = '';
	foreach ($sql_list as $sql_query)
	{
		if (is_array($sql_query))
		{
			$message .= execute_sql_list($sql_query, $preview);
		}
		else if ($sql_query === 'begin' || $sql_query === 'commit')
		{
			$db->sql_transaction($sql_query);
		}
		else if (!empty($sql_query))
		{
			$result_msg = '';
			if (!$preview)
			{
				$result = $db->sql_query($sql_query);
				if ($result)
				{
					$result_msg = '<strong style="color:green;">' . $user->lang['SQL_STATEMENT_SUCCESS'] . '!</strong>';
				}
				else
				{
					$error = true;
					$db_error = $db->sql_error();
					$result_msg = '<span style="color:red;"><strong>' . $user->lang['SQL_STATEMENT_FAILURE'] . ': </strong>' . $db_error['message'] . '</span>';
				}
			}
			$message .= '<span style="display:block;background-color:#FAFAFA;color:#333;padding-left:4px;padding-right:4px;"><span style="font-family:\'Courier New\',monospace"><strong>' . $user->lang['SQL_STATEMENT_SQL'] . ': </strong>' . $sql_query . '</span><br/>' . $result_msg . '</span>';
			$message .= '<br/>';
		}
	}
	return $message;
}

$msg_title = $user->lang['DB_UPDATE_TITLE'] . (!empty($mod_name) ? ': ' . $mod_name : '');
$db_update_mode = request_var('db_update_mode', '');
$db_update_preview = request_var('db_update_preview', '');
$sql_list = isset($sql_array[$db_update_mode]) ? $sql_array[$db_update_mode] : array();

$db_update_form = '
	</p><form action="" method="post" style="margin-bottom:1em;"><fieldset><legend style="display:none;">' . $mod_name . '</legend><p>
		<label><input type="radio" name="db_update_mode" value="install" class="radio" ' . ($db_update_mode != 'remove' ? ' checked="checked"' : '') . '/> ' . $user->lang['DB_UPDATE_INSTALL'] . '</label>
		<label><input type="radio" name="db_update_mode" value="remove" class="radio"' . ($db_update_mode == 'remove' ? ' checked="checked"' : '') . '/> ' . $user->lang['DB_UPDATE_REMOVE'] . '</label>
		<br/><br/>
		<input type="submit" value="' . $user->lang['DB_UPDATE_EXECUTE'] . '" class="button1"/> &nbsp;
		<input type="submit" value="' . $user->lang['DB_UPDATE_PREVIEW'] . '" class="button1" name="db_update_preview"/>
	</p></fieldset></form><p>
';

if (isset($_POST['db_update_mode']) && empty($db_update_preview) && !empty($sql_list) && ($db_update_mode == 'install' || $db_update_mode == 'remove'))
{
	// Begin executing SQL statements
	$results_msg = execute_sql_list($sql_list);

	// Final result
	if ($error == true)
	{
		$message .= '<span style="border:1px solid #A00;background-color:#FEE;display:block;padding:2px;"><strong>' . $user->lang['RESULT'] . ': </strong>' . $user->lang['SQL_RESULT_FAILURE'] . '</span><br/>' . $results_msg . '<hr/>' . $db_update_form;
	}
	else if (!empty($results_msg))
	{
		$message .= '<span style="border:1px solid #0A0;background-color:#EFE;display:block;padding:2px;"><strong>' . $user->lang['RESULT'] . ': </strong>' . $user->lang['SQL_RESULT_SUCCESS'] . '</span><br/>' . $results_msg;
	}
	else
	{
		$message .= $db_update_form . '<strong>' . $user->lang['RESULT'] . ': </strong>' . $user->lang['DB_UPDATE_NONE'];
	}

	$cache->purge();
}
else
{
	$message = $db_update_form;
	
	// Preview
	if (strcmp($db_update_preview, $user->lang['DB_UPDATE_PREVIEW']) === 0)
	{
		$message .= '<strong>' . $user->lang['DB_UPDATE_PREVIEW'] . ': </strong>';
		$results_msg = execute_sql_list($sql_list, true);
		$message .= empty($results_msg) ? $user->lang['DB_UPDATE_NONE'] : $results_msg;
	}
}
trigger_error($message);

?>