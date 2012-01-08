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
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK'			=> 'Previa a la instalación para Prime Login Via E-Mail',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_EXPLAIN'	=> 'La búsqueda de nombres de usuario que coinciden con las actuales direcciones de correo electrónico se ha completado.',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_OKAY'		=> 'No hay conflictos fueron encontrados, y usted puede proceder con la instalación!',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_WARNING'	=> 'Advertencia',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_MATCH'		=> 'El nombre de usuario %1$s coincide con la dirección de correo electrónico de %2$s.',
	'PRIME_LOGIN_VIA_EMAIL_PRECHECK_RESOLVE'	=> 'Usted tendrá que resolver las coincidencias antes de instalar esta modificación.',
));

?>