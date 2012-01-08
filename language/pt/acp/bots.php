<?php
/**
*
* acp_bots [Português]
*
* @package language
* @version 1.0.2
* @Traduzido por: http://phpbbportugal.com - segundo as normas do Acordo Ortográfico
* @copyright (c) 2005 phpBB Group
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

// Bot settings
$lang = array_merge($lang, array(
	'BOTS'						=> 'Gestão de Motores de Busca',
	'BOTS_EXPLAIN'				=> 'Motores de Busca ou espiões são agentes de pesquisa usados para manter atualizadas as Bases de Dados dos servidores de pesquisa. Estes podem distorcer as estatísticas do número de visitantes, aumentando a carga do servidor e, em algumas situações, provocar erros. Aqui pode definir um tipo especial de utilizador para contornar estes problemas.',
	'BOT_ACTIVATE'				=> 'Ativar',
	'BOT_ACTIVE'				=> 'Bot Ativo',
	'BOT_ADD'					=> 'Adicionar bot',
	'BOT_ADDED'					=> 'Novo bot adicionado com sucesso.',
	'BOT_AGENT'					=> 'Agente de partida',
	'BOT_AGENT_EXPLAIN'			=> 'Uma sequência inciando os agentes de navegadores de bots, são permitidas partidas parciais.',
	'BOT_DEACTIVATE'			=> 'Desativar',
	'BOT_DELETED'				=> 'Bot removido com sucesso.',
	'BOT_EDIT'					=> 'Editar bots',
	'BOT_EDIT_EXPLAIN'			=> 'Aqui pode editar ou adicionar novos bots. Pode definir qualquer sequência de agentes e/ou um ou mais endereços de IP (ou grupo de endereços) para coincidir. Cuidado ao definir os parâmetros dos agentes ou endereços. Pode especificar um estilo ou Idioma com os quais o Bot visualizará o seu Fórum. Isto pode reduzir o tráfego de seu site especificando um estilo simples para bots. Lembre-se de especificar permissões para o grupo especial de bots.',
	'BOT_LANG'					=> 'Idioma do Bot',
	'BOT_LANG_EXPLAIN'			=> 'O idioma presente no bot quando ele navega.',
	'BOT_LAST_VISIT'			=> 'Última visita',
	'BOT_IP'					=> 'Endereço do IP do Bot',
	'BOT_IP_EXPLAIN'			=> 'São permitidos nomes parciais se separados por virgulas (,).',
	'BOT_NAME'					=> 'Nome do Bot',
	'BOT_NAME_EXPLAIN'			=> 'Usado apenas para sua informação.',
	'BOT_NAME_TAKEN'			=> 'Este nome está a ser usado por um Utilizador e não pode ser usado por um Bot.',
	'BOT_NEVER'					=> 'Nunca',
	'BOT_STYLE'					=> 'Estilo do Bot',
	'BOT_STYLE_EXPLAIN'			=> 'O estilo usado para o Fórum pelo bot.',
	'BOT_UPDATED'				=> 'Bot existente atualizado com sucesso.',

	'ERR_BOT_AGENT_MATCHES_UA'	=> 'O agente de bot que escolheu é semelhante ao que está a usar atualmente. Por favor ajuste o agente para este bot.',
	'ERR_BOT_NO_IP'				=> 'O IP que forneceu é inválido ou o hostname não pode ser resolvido.',
	'ERR_BOT_NO_MATCHES'		=> 'Tem que indicar pelo menos uma descrição do navegador ou um IP para o parâmetro.',

	'NO_BOT'					=> 'O bot selecionado não existe.',
	'NO_BOT_GROUP'				=> 'O Grupo de bots especial existe.',
));

?>