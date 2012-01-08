<?php
/**
*
* @package phpBB3
* @version $Id: prime_login_via_email.php,v 1.3.2 2011/02/05 19:27:00 primehalo Exp $
* @copyright (c) 2007-2011 Ken F. Innes IV
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @modification by: Enrique Berzosa (theeye0@gmail.com), 2010/10/11
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* Only include this file once.
*/
global $prime_login_via_email;
if (!class_exists('prime_login_via_email'))
{
	/**
	* Options
	*/
	define('REAUTHENTICATE_VIA_EMAIL', true);	// Allow re-authenticating using the e-mail address?

	/**
	* Constants
	*/
	define('LOGIN_VIA_EMAIL_NO',		0);
	define('LOGIN_VIA_EMAIL_YES',		1);
	define('LOGIN_VIA_EMAIL_SILENT',	2);
	define('LOGIN_VIA_EMAIL_ONLY',		3);

	/**
	* Displays an ACP option.
	*/
	function prime_login_via_email_acp_option($key = '', $select_id = 0)
	{
		global $config, $user;

		// Special case, disable the E-Mail Re-use option
		if ($key == 'allow_emailreuse')
		{
			$user->add_lang('mods/prime_login_via_email');
			$select  = '<label><input type="radio" disabled="disabled" name="config[' . $key . ']" value="1" class="radio" id="' . $key . '"/> ' . $user->lang['YES'] . '</label> ';
			$select .= '<label><input type="radio" disabled="disabled" name="config[' . $key . ']" value="0" class="radio" checked="checked" /> ' . $user->lang['NO'] . '</label>';
			return $select;
		}

		$options_array = array(
			'login_via_email_enable' => array(
				LOGIN_VIA_EMAIL_YES		=> 'YES',
				LOGIN_VIA_EMAIL_NO		=> 'NO',
				LOGIN_VIA_EMAIL_SILENT	=> 'LOGIN_VIA_EMAIL_SILENT',
				LOGIN_VIA_EMAIL_ONLY	=> 'LOGIN_VIA_EMAIL_ONLY'
			)
		);
		if (!empty($key) && is_array($options_array[$key]))
		{
			$select = '';
			foreach ($options_array[$key] as $idx => $title)
			{
				$selected = ((integer)$config[$key] === $idx) ? ' checked="checked"' : '';
				$select .= '<label><input type="radio"' . ($idx == 1 ? ' id="' . $key . '"' : '') . ' name="config[' . $key . ']" value="' . $idx . '"' . $selected . ' class="radio" /> ' . $user->lang[$title] . '</label>';
			}
			return($select);
		}
	}

	/**
	* Prime Login via Email class structure
	*/
	class prime_login_via_email
	{

		/**
		* Constructor
		*/
		function prime_login_via_email()
		{
			$this->initialize_options();
		}

		/**
		* Set defaults for options if they have not been set
		*/
		function initialize_options()
		{
			global $config;

/*
			$defaults = array(
				'login_via_email_enable' => LOGIN_VIA_EMAIL_YES,
			);
			foreach ($defaults as $option => $default)
			{
				if (!isset($config[$option]))
				{
					set_config($option, $default);
				}
			}
*/
			if (!isset($config['login_via_email_enable']))
			{
				set_config('login_via_email_enable', LOGIN_VIA_EMAIL_YES);
			}

			// Special case, turn off e-mail reuse if this MOD is enabled
			if ($config['login_via_email_enable'])
			{
				set_config('allow_emailreuse', false);
			}
		}

		/**
		* Display the ACP options.
		*/
		function display_acp_options(&$display_vars)
		{
			global $config, $user;
			global $mode; // global to acp_board.php

			// Special case, disable e-mail reuse option if this MOD is enabled
			if ($mode == 'registration' && $config['login_via_email_enable'])
			{
				$user->add_lang('mods/prime_login_via_email');
				$user->lang['ALLOW_EMAIL_REUSE_EXPLAIN'] .= ' ' . $user->lang['EMAIL_REUSE_DISABLED'];
				$allow_emailreuse = &$display_vars['vars']['allow_emailreuse'];
				$allow_emailreuse['type'] = 'custom';
				$allow_emailreuse['function'] = 'prime_login_via_email_acp_option';
				$allow_emailreuse['params'] = array('{KEY}', '{CONFIG_VALUE}');
			}
			else if ($mode == 'features')
			{
				$user->add_lang('mods/prime_login_via_email');
				$display_copy = $display_vars['vars'];
				$display_vars['vars'] = array();
				foreach ($display_copy as $key => $val)
				{
					$display_vars['vars'][$key] = $val;
					if ($key == 'allow_birthdays')	// Insert our option after this one
					{
						$display_vars['vars']['login_via_email_enable'] = array('lang' => 'LOGIN_VIA_EMAIL_ENABLE', 'validate' => 'int',	'type' => 'custom', 'function' => 'prime_login_via_email_acp_option', 'params' => array('{KEY}', '{CONFIG_VALUE}'), 'explain' => true);
					}
				}
			}
		}

		/**
		* Login failed because username did not exist, so try it as an e-mail address.
		*/
		function check_for_email(&$row, &$sql, $email_login)
		{
			global $config, $db, $user;

			if (!empty($config['login_via_email_enable']) && !$row)
			{
				if (strpos($email_login, '@') !== false)
				{
					if (preg_match('/^' . get_preg_expression('email') . '$/i', $email_login))
					{
						// Don't need to check for boolean FALSE because the position should never be zero.
						$where_pos = strpos($sql, 'WHERE username_clean = ');
						$where_pos = $where_pos ? $where_pos : strpos($sql, 'WHERE username = ');
						if ($where_pos)
						{
							$sql = substr($sql, 0, $where_pos) . 'WHERE user_email = \'' . $db->sql_escape(strtolower($email_login)) . '\'';
							$result = $db->sql_query($sql);
							$row = $db->sql_fetchrow($result);
							$db->sql_freeresult($result);
						}
					}
				}
				// Update the error message
				if (!$row && ($config['login_via_email_enable'] == LOGIN_VIA_EMAIL_YES || $config['login_via_email_enable'] == LOGIN_VIA_EMAIL_ONLY))
				{
					$user->add_lang('mods/prime_login_via_email');
					$user->lang['LOGIN_ERROR_USERNAME'] = ($config['login_via_email_enable'] == LOGIN_VIA_EMAIL_ONLY) ? $user->lang['LOGIN_ERROR_EMAIL'] : $user->lang['LOGIN_ERROR_USERNAME_OR_EMAIL'];
				}
			}
		}

		/**
		* Change the text next to the username box to "Username or E-Mail".
		*/
		function update_label($admin = false)
		{
			global $config, $user, $template;

			if ($config['login_via_email_enable'] == LOGIN_VIA_EMAIL_YES || (!empty($admin) && REAUTHENTICATE_VIA_EMAIL && $config['login_via_email_enable'] == LOGIN_VIA_EMAIL_ONLY))
			{
				$user->add_lang('mods/prime_login_via_email');
				$template->assign_var('L_USERNAME', $user->lang['USERNAME_OR_EMAIL']);
			}
			else if ($config['login_via_email_enable'] == LOGIN_VIA_EMAIL_ONLY && empty($admin))
			{
				$user->add_lang('mods/prime_login_via_email');
				$template->assign_var('L_USERNAME', $user->lang['EMAIL']);
			}
		}

		/**
		* Admin re-authentication adjustment.
		*/
		function correct_username_var($admin)
		{
			global $config, $user, $template;

			if (!empty($config['login_via_email_enable']))
			{
				if ($admin && !REAUTHENTICATE_VIA_EMAIL)
				{
					return;
				}
				// This is a re-authentication (otherwise username will be Anonymous)
				if ($admin && isset($_POST['login']))
				{
					// If incoming username is the user's email address, then set it to their actual username
					$username = request_var('username', '', true);

					// Note: I'm doing a comparison with strtolower() instead of utf8_case_fold_nfc()
					// because that is what the e-mail goes through before being stored in the database.
					if (strtolower($username) === strtolower($user->data['user_email']))
					{
						$_POST['username'] = $_REQUEST['username'] = $user->data['username'];
					}
				}
				$this->update_label($admin);
			}
		}
	}
	// End class

	$prime_login_via_email = new prime_login_via_email();
}
?>