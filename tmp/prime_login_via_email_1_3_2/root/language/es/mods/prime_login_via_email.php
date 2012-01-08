<?php
/**
*
* prime_login_via_email [Spanish]
*
* @package language
* @version $Id: prime_login_via_email.php,v 1.3.1 2010/09/22 00:33:00 primehalo Exp $
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* @modified by: Enrique Berzosa (theeye0@gmail.com), 2010/10/11
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
	'USERNAME_OR_EMAIL'					=> 'Usuario o E-Mail',
	'LOGIN_ERROR_USERNAME_OR_EMAIL'		=> 'Ha especificado un nombre de usuario o correo electrónico incorrecto. Por favor verifique su entrada e inténtelo de nuevo. Si continúa teniendo problemas, por favor contacte con %sLa Administración del Sitio%s.',
	'LOGIN_ERROR_EMAIL'					=> 'Ha especificado un correo electrónico incorrecto. Por favor verifique su correo electrónico e inténtelo de nuevo. Si continúa teniendo problemas, por favor contacte con %sLa Administración del Sitio%s.',

	// ACP
	'LOGIN_VIA_EMAIL_ENABLE'			=> 'Login vía E-Mail',
	'LOGIN_VIA_EMAIL_ENABLE_EXPLAIN'	=> 'Permite a los usuarios logearse usando el nombre de usuario o/y el email. Con la opción "discreto" no existirá ningún texto que indique esta posibilidad.',
	'LOGIN_VIA_EMAIL_SILENT'			=> 'Si, discreto',
	'LOGIN_VIA_EMAIL_ONLY'				=> 'Sólo E-Mail',
	'EMAIL_REUSE_DISABLED'				=> 'Esta opción está deshabilitada cuando <em>Login via Email</em> está habilitado.',
));

?>