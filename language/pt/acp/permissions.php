<?php
/**
*
* acp_permissions [Português]
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

$lang = array_merge($lang, array(
	'ACP_PERMISSIONS_EXPLAIN'	=> ' 
		<p>As Permissões do phpBB3 são bastante abrangentes e estão agrupadas em quatro grandes Grupos:</p> 

		<h2>1 - Permissões Globais</h2> 
		<p>Aqui pode controlar o acesso a nível global e aplicá-lo ao Fórum inteiro. As Permissões estão divididas em Permissões de Utilizadores, Grupos, Administradores e Moderadores Globais.</p>

		<h2>2 - Permissões do Fórum</h2> 
		<p>Aqui pode controlar o acesso Básico ao Fórum. As Permissões estão dividias em Permissões de Fóruns, Moderadores de Fóruns, Permissões de Utilizadores em Fóruns e Permissões de Grupos em Fóruns.</p>

		<h2>3 - Tarefas de Permissão</h2>
		<p>Aqui pode criar diferentes terefas de Permissão para os diversos tipos de Permissões existentes. As configurações padrão devem cobrir a Administração do Fórum, entretanto com uma das quatro divisões, deve ainda pode adicionar/editar/excluir configurações se assim desejar ou achar necessário.</p>

		<h2>4 - Máscaras de Permissões</h2>
		<p>Aqui pode ver as Permissões atribuídas a Utilizadores, Moderadores (locais e globais), Administradores ou Fóruns.</p>
	 
		<br /> 

		<p><b>Para mais informações sobre a configuração e a Gestão de Permissões no phpBB3, veja o <a href="http://www.phpbb.com/support/documentation/3.0/quickstart/quick_permissions.html" onclick="this.target=\'_blank\';" title="Abrir numa janela nova">Capítulo 1.5 do Guia de Inicialização Rápida</a></b>.</p> 
	',

	'ACL_NEVER'				=> 'Nunca',
	'ACL_SET'				=> 'Configurar Permissões',
	'ACL_SET_EXPLAIN'		=> 'As Permissões são baseadas num sistema <samp>SIM</samp>/<samp>NÃO</samp>. A opção <samp>Nunca</samp> selecionada para um Utilizador ou Grupo sobrepor-se-á a todas as outras. Se não deseja atribuir um valor de qualquer opção para este Utilizador ou Grupo, selecione <samp>NÃO</samp>. Se valores são atribuídos para esta opção ou em outra qualquer, eles serão preferencialmente utilizados, senão o <samp>Nunca</samp> é assumido. Todos os objetos marcados (com a caixa de confirmação em frente a eles) irão copiar as permissões que definiu.',
	'ACL_SETTING'			=> 'Configuração',

	'ACL_TYPE_A_'			=> 'Permissões Administrativas',
	'ACL_TYPE_F_'			=> 'Permissões de Fóruns',
	'ACL_TYPE_M_'			=> 'Permissões Moderativas',
	'ACL_TYPE_U_'			=> 'Permissões de Utilizador',

	'ACL_TYPE_GLOBAL_A_'	=> 'Permissões Administrativas',
	'ACL_TYPE_GLOBAL_U_'	=> 'Permissões de Utilizador',
	'ACL_TYPE_GLOBAL_M_'	=> 'Permissões de Moderadores Globais',
	'ACL_TYPE_LOCAL_M_'		=> 'Permissões de Moderadores de Fóruns',
	'ACL_TYPE_LOCAL_F_'		=> 'Permissões de Fóruns',

	'ACL_NO'				=> 'Não',
	'ACL_VIEW'				=> 'Vendo as Permissões',
	'ACL_VIEW_EXPLAIN'		=> 'Aqui pode ver as Permissões dos Utilizadores/Grupos. Um quadrado vermelho indica que o Utilizador/Grupo não tem a Permissão, um quadrado verde indica que o Utilizador/Grupo tem a Permissão.',
	'ACL_YES'				=> 'Sim',

	'ACP_ADMINISTRATORS_EXPLAIN'			=> 'Aqui pode configurar as Permissões Administrativas dos Utilizadores e Grupos. Todos os Utilizadores com Permissões Administrativas podem entrar no Painel de Administração.',
	'ACP_FORUM_MODERATORS_EXPLAIN'			=> 'Aqui pode configurar Utilizadores e Grupos como Moderadores do Fórum. Para configurar Permissões de Utilizador, para definir Permissões de Moderadores Globais ou Administradores, por favor, use a página apropriada.',
	'ACP_FORUM_PERMISSIONS_EXPLAIN'			=> 'Aqui pode definir que Utilizadores e Grupos podem aceder a cada um dos Fóruns. Para configurar Moderadores ou Administradores, por favor, use a página apropriada.',
	'ACP_FORUM_PERMISSIONS_COPY_EXPLAIN'		=> 'Aqui pode copiar permissões de um Fórum para outro ou outros Fóruns.',
	'ACP_GLOBAL_MODERATORS_EXPLAIN'			=> 'Aqui pode configurar Permissões de Moderadores Globais para Utilizadores e Grupos. Estes são Moderadores normais, exceto se tiverem acesso a todos Fóruns.',
	'ACP_GROUPS_FORUM_PERMISSIONS_EXPLAIN'	=> 'Aqui pode configurar Permissões de Fóruns para Grupos.',
	'ACP_GROUPS_PERMISSIONS_EXPLAIN'		=> 'Aqui pode configurar as Permissões Globais dos Grupos - Permissões dos Utilizadores, Permissões Globais e Permissões Administrativas. As Permissões dos Utilizadores incluem o uso de Avatares, envio de Mensagens Privadas, etc. Permissões Globais como a Aprovação de Mensagens, Gestão de Tópicos, Gestão de Expulsões, etc. Por último, as Permissões Administrativas como a alteração de Permissões, definição de BBCodes, Gestão de Fóruns, etc. As Permissões dos Utilizadores individuais apenas devem ser alteradas em ocasiões muito especificas. Adicione os Utilizadores a um Grupo e altere as permissões do Grupo.',
	'ACP_ADMIN_ROLES_EXPLAIN'				=> 'Aqui pode configurar as tarefas para Permissões Administrativas. Tarefas são Permissões efetivas. Se alterar uma tarefa, altera também as Permissões dos itens associados.',
	'ACP_FORUM_ROLES_EXPLAIN'				=> 'Aqui pode configurar as tarefas para Permissões dos Fóruns. Tarefas são Permissões efetivas. Se alterar uma tarefa, altera também as Permissões dos itens associados.',
	'ACP_MOD_ROLES_EXPLAIN'					=> 'Aqui pode configurar as tarefas para Permissões de Moderação. Tarefas são Permissões efetivas. Se alterar uma tarefa, altera também as Permissões dos itens associados.',
	'ACP_USER_ROLES_EXPLAIN'				=> 'Aqui pode configurar as tarefas para Permissões de Utilizadores. Tarefas são permissões efetivas. Se alterar uma tarefa, altera também as Permissões dos itens associados.',
	'ACP_USERS_FORUM_PERMISSIONS_EXPLAIN'	=> 'Aqui pode configurar as Permissões de Fóruns para Utilizadores.',
	'ACP_USERS_PERMISSIONS_EXPLAIN'			=> 'Aqui pode configurar as Permissões Globais para Utilizadores. As Permissões de Utilizadores incluem autorização do uso de Avatares, envio de Mensagens Privadas e etc; Permissões Globais como a aprovação de mensagens, gestão de Tópicos, gestão de Expulsões etc; Por último, as Permissões Administrativas como a alteração de permissões, definição de BBCodes, gestão de Fóruns e etc. Para alterar estas configurações para um grande número de Utilizadores, o sistema de permissões de grupos é o método mais aconselhável. As Permissões dos Utilizadores individuais apenas devem ser alteradas em ocasiões muito especificas. Adicione os Utilizadores a um Grupo e altere as permissões do Grupo.',
	'ACP_VIEW_ADMIN_PERMISSIONS_EXPLAIN'	=> 'Aqui pode ver as Permissões Administrativas efetivas dadas aos Utilizadores/Grupos selecionados.',
	'ACP_VIEW_GLOBAL_MOD_PERMISSIONS_EXPLAIN'	=> 'Aqui pode ver as Permissões Globais dadas aos Utilizadores/Grupos selecionados.',
	'ACP_VIEW_FORUM_PERMISSIONS_EXPLAIN'		=> 'Aqui pode ver as Permissões de Fóruns dadas aos Utilizadores/Grupos e Fóruns selecionadas.',
	'ACP_VIEW_FORUM_MOD_PERMISSIONS_EXPLAIN'	=> 'Aqui pode ver as Permissões de Moderador de Fóruns dadas aos Utilizadores/Grupos e Fóruns selecionadas.',
	'ACP_VIEW_USER_PERMISSIONS_EXPLAIN'			=> 'Aqui pode ver as Permissões de Utilizadores efetivas dadas aos Utilizadores/Grupos selecionados.',

	'ADD_GROUPS'					=> 'Adicionar Grupos',
	'ADD_PERMISSIONS'				=> 'Adicionar Permissões',
	'ADD_USERS'						=> 'Adicionar Utilizadores',
	'ADVANCED_PERMISSIONS'			=> 'Permissões Avançadas',
	'ALL_GROUPS'					=> 'Selecionar todos os Grupos',
	'ALL_NEVER'						=> 'Tudo <samp>Nunca</samp>',
	'ALL_NO'						=> 'Tudo <samp>Não</samp>',
	'ALL_USERS'						=> 'Selecionar Todos os Utilizadores',
	'ALL_YES'						=> 'Tudo <samp>Sim</samp>',
	'APPLY_ALL_PERMISSIONS'			=> 'Aplicar todas as Permissões',
	'APPLY_PERMISSIONS'				=> 'Aplicar Permissões',
	'APPLY_PERMISSIONS_EXPLAIN'		=> 'As Permissões e tarefas definidas para este item serão apenas aplicadas a este item e todos os itens marcados.',
	'AUTH_UPDATED'					=> 'As Permissões foram atualizadas com sucesso.',

	'COPY_PERMISSIONS_CONFIRM'				=> 'Tem a certeza que pretende prosseguir com esta operação? Por favor, esteja ciente que isto irá sobrescrever quaisquer permissões existentes nos alvos selecionados.',
	'COPY_PERMISSIONS_FORUM_FROM_EXPLAIN'	=> 'Irá copiar as permissões deste Fórum.',
	'COPY_PERMISSIONS_FORUM_TO_EXPLAIN'		=> 'O Fórum de destino, na qual pretende copiar as permissões do outro.',
	'COPY_PERMISSIONS_FROM'					=> 'Copiar Permissões de',
	'COPY_PERMISSIONS_TO'					=> 'Aplicar Permissões a',

	'CREATE_ROLE'					=> 'Criar Tarefa',
	'CREATE_ROLE_FROM'				=> 'Usar Configurações de',
	'CUSTOM'						=> 'Personalizar',

	'DEFAULT'						=> 'Padrão',
	'DELETE_ROLE'					=> 'Eliminar Tarefa',
	'DELETE_ROLE_CONFIRM'			=> 'Deseja realmente Eliminar esta Tarefa? Itens atribuídos a esta Tarefa <strong>não</strong> perderão as suas configurações de Permissões.',
	'DISPLAY_ROLE_ITEMS'			=> 'Ver Itens utilizando esta Tarefa',

	'EDIT_PERMISSIONS'				=> 'Editar Permissões',
	'EDIT_ROLE'						=> 'Editar Tarefa',

	'GROUPS_NOT_ASSIGNED'			=> 'Nenhum Grupo atribuído a esta Tarefa',

	'LOOK_UP_GROUP'					=> 'Gerir o Grupo',
	'LOOK_UP_USER'					=> 'Procurar um Utilizador',

	'MANAGE_GROUPS'					=> 'Administrar Grupos',
	'MANAGE_USERS'					=> 'Administrar Utilizadores',

	'NO_AUTH_SETTING_FOUND'			=> 'A Configuração de Permissões não foi definida.',
	'NO_ROLE_ASSIGNED'				=> 'Sem Tarefas atribuidas',
	'NO_ROLE_ASSIGNED_EXPLAIN'		=> 'A Configuração para esta Tarefa não alterou as Permissões na direita. Se deseja desativar/excluir todas as Permissões deve utilizar o atalho "Tudo <samp>Não</samp>".',
	'NO_ROLE_AVAILABLE'				=> 'Sem Tarefas Disponíveis',
	'NO_ROLE_NAME_SPECIFIED'		=> 'O nome da Tarefa deve ser escrito.',
	'NO_ROLE_SELECTED'				=> 'A Tarefa não foi encontrada.',
	'NO_USER_GROUP_SELECTED'		=> 'Não selecionou nenhum Utilizador ou Grupo.',

	'ONLY_FORUM_DEFINED'			=> 'Apenas selecionou Fóruns. Selecione pelo menos um Utilizador ou um Grupo.',

	'PERMISSION_APPLIED_TO_ALL'		=> 'As Tarefas e Permissões também serão aplicadas a todos os objetos selecionados',
	'PLUS_SUBFORUMS'				=> '+ Subfóruns',

	'REMOVE_PERMISSIONS'			=> 'Eliminar Permissões',
	'REMOVE_ROLE'					=> 'Eliminar Tarefa',
	'RESULTING_PERMISSION'			=> 'Resultando Permissão',
	'ROLE'							=> 'Tarefa',
	'ROLE_ADD_SUCCESS'				=> 'A Tarefa foi adicionada com sucesso.',
	'ROLE_ASSIGNED_TO'				=> 'Os Utilizadores/Grupos foram atribuídos a %s',
	'ROLE_DELETED'					=> 'A Tarefa foi excluída com sucesso.',
	'ROLE_DESCRIPTION'				=> 'Descrição da Tarefa',

	'ROLE_ADMIN_FORUM'				=> 'Administração de Fóruns',
	'ROLE_ADMIN_FULL'				=> 'Administração Completa',
	'ROLE_ADMIN_STANDARD'			=> 'Administração Padrão',
	'ROLE_ADMIN_USERGROUP'			=> 'Administração de Utilizadores e Grupos',
	'ROLE_FORUM_BOT'				=> 'Acesso de BOT',
	'ROLE_FORUM_FULL'				=> 'Acesso Completo',
	'ROLE_FORUM_LIMITED'			=> 'Acesso Limitado',
	'ROLE_FORUM_LIMITED_POLLS'		=> 'Acesso Limitado + Votações',
	'ROLE_FORUM_NOACCESS'			=> 'Sem Acesso',
	'ROLE_FORUM_ONQUEUE'			=> 'Na Fila de Moderação',
	'ROLE_FORUM_POLLS'				=> 'Acesso Padrão + Votações',
	'ROLE_FORUM_READONLY'			=> 'Acesso só de Leitura',
	'ROLE_FORUM_STANDARD'			=> 'Acesso Padrão',
	'ROLE_FORUM_NEW_MEMBER'			=> 'Utilizadores Registados Recentemente',
	'ROLE_MOD_FULL'					=> 'Moderador Completo',
	'ROLE_MOD_QUEUE'				=> 'Moderador da Fila',
	'ROLE_MOD_SIMPLE'				=> 'Moderador Simples',
	'ROLE_MOD_STANDARD'				=> 'Moderador Padrão',
	'ROLE_USER_FULL'				=> 'Todas as Permissões',
	'ROLE_USER_LIMITED'				=> 'Permissões Limitadas',
	'ROLE_USER_NOAVATAR'			=> 'Sem Avatar',
	'ROLE_USER_NOPM'				=> 'Sem Mensagens Privadas',
	'ROLE_USER_STANDARD'			=> 'Permissões Padrão',
	'ROLE_USER_NEW_MEMBER'			=> 'Utilizadores Registados Recentemente',

	
	'ROLE_DESCRIPTION_ADMIN_FORUM'			=> 'Tem acesso às Configurações de Gestão e Permissões de Fóruns.',
	'ROLE_DESCRIPTION_ADMIN_FULL'			=> 'Tem acesso a todas as funções administrativas neste Fórum. <b>Não recomendado a Administradores Normais</b>.',
	'ROLE_DESCRIPTION_ADMIN_STANDARD'		=> 'Tem acesso à maior parte das funções administrativas, mas não está autorizado a utilizar ferramentas relacionadas com o Servidor ou o Sistema.',
	'ROLE_DESCRIPTION_ADMIN_USERGROUP'		=> 'Tem acesso à administração de Utilizadores e Grupos: Pode alterar permissões, configurações, administrar explusões e ranks.',
	'ROLE_DESCRIPTION_FORUM_BOT'			=> 'Esta Tarefa é recomendada para BOTs e motores de busca.',
	'ROLE_DESCRIPTION_FORUM_FULL'			=> 'Pode utilizar todas as Funções do Fórum, incluindo criar Anúncios e Tópicos Fixos. Pode ignorar o limite de mensagens. <b>Não recomendado a Utilizadores Normais</b>.',
	'ROLE_DESCRIPTION_FORUM_LIMITED'		=> 'Pode utilizar algumas Funções do Fórum, mas não pode anexar Ficheiros ou utilizar ícones nas Mensagens.',
	'ROLE_DESCRIPTION_FORUM_LIMITED_POLLS'	=> 'Como o Acesso Limitado, mas pode criar Votações.',
	'ROLE_DESCRIPTION_FORUM_NOACCESS'		=> 'Não pode ver nem entrar no Fórum.',
	'ROLE_DESCRIPTION_FORUM_ONQUEUE'		=> 'Pode utilizar a maior parte das Funções do Fórum, incluindo os Anexos, mas os Tópicos e Mensagens têm que ser Aprovadas por um Moderador.',
	'ROLE_DESCRIPTION_FORUM_POLLS'			=> 'Igual ao Acesso Padrão, mas pode Criar Votações.',
	'ROLE_DESCRIPTION_FORUM_READONLY'		=> 'Pode ler o Fórum, mas não pode criar Tópicos ou responder a Mensagens.',
	'ROLE_DESCRIPTION_FORUM_STANDARD'		=> 'Pode utilizar a maior parte das Funções do Fórum, incluindo os Anexos, mas não pode trancar ou eliminar os próprios Tópicos, e Criar Votações.',
	'ROLE_DESCRIPTION_FORUM_NEW_MEMBER'		=> 'A função dos membros do Grupo Especial de Utilizadores Registados Recentemente. Contém permissões <b>Nunca</b> para bloquear recursos aos novos utilizadores.',
	'ROLE_DESCRIPTION_MOD_FULL'				=> 'Pode utilizar todas as Funções de Moderação, incluindo as explusões.',
	'ROLE_DESCRIPTION_MOD_QUEUE'			=> 'Pode utilizar a Fila de Moderação para validar e Editar Mensagens.',
	'ROLE_DESCRIPTION_MOD_SIMPLE'			=> 'Pode utilizar apenas as opções Básicas dos Tópicos. Não pode criar Advertências ou utilizar a Fila de Moderação.',
	'ROLE_DESCRIPTION_MOD_STANDARD'			=> 'Pode utilizar a maior parte das Ferramentas de Moderação, mas não pode Expulsar Utilizadores ou alterar o Autor da Mensagem.',
	'ROLE_DESCRIPTION_USER_FULL'			=> 'Pode utilizar todas as funções do Fórum disponíveis para utilizadores, incluindo a alteração do Nome do Utilizador ou ignorar o Limite de mensagens. <b>Não recomendado a Utilizadores Normais</b>.',
	'ROLE_DESCRIPTION_USER_LIMITED'			=> 'Pode utilizar algumas das Funções dos Utilizadores. Não são permitidos anexos, emails ou mensagens urgentes',
	'ROLE_DESCRIPTION_USER_NOAVATAR'		=> 'Tem funções limitadas e não pode usar Avatar.',
	'ROLE_DESCRIPTION_USER_NOPM'			=> 'Tem funções limitadas e não está autorizado a utilizar Mensagens Privadas.',
	'ROLE_DESCRIPTION_USER_STANDARD'		=> 'Pode utilizar a maior parte das Funções, mas não todas as Ferramentas do Utilizador. Não pode por exemplo, alterar o Nome do Utilizador ou ignorar o limite de mensagens.',
	'ROLE_DESCRIPTION_USER_NEW_MEMBER'		=> 'A função dos membros do Grupo Especial de Utilizadores Registados Recentemente. Contém permissões <b>Nunca</b> para bloquear recursos aos novos utilizadores.',

	'ROLE_DESCRIPTION_EXPLAIN'				=> 'Pode escrever uma pequena explicação sobre a tarefa o objetivo da mesma. O Texto será mostrado nas Permissões.',
	'ROLE_DESCRIPTION_LONG'					=> 'A Descrição da tarefa é muito grande. Por Favor, limite seu texto a 4000 caracteres.',
	'ROLE_DETAILS'							=> 'Detalhes da tarefa',
	'ROLE_EDIT_SUCCESS'						=> 'A Tarefa foi editada com sucesso.',
	'ROLE_NAME'								=> 'Nome da Tarefa',
	'ROLE_NAME_ALREADY_EXIST'				=> 'Uma tarefa nomeada <strong>%s</strong> já existe para o Tipo de Permissão especificado.',
	'ROLE_NOT_ASSIGNED'						=> 'A Tarefa ainda não foi atribuída.',

	'SELECTED_FORUM_NOT_EXIST'				=> 'Os Fóruns selecionados não existem.',
	'SELECTED_GROUP_NOT_EXIST'				=> 'Os Grupos selecionados não existem.',
	'SELECTED_USER_NOT_EXIST'				=> 'Os Utilizadores selecionados não existem.',
	'SELECT_FORUM_SUBFORUM_EXPLAIN'			=> 'Nesta opção, selecionando um Fórum incluirá todos os seus Subfóruns.',
	'SELECT_ROLE'							=> 'Selecionar Tarefa',
	'SELECT_TYPE'							=> 'Selecionar Tipo',
	'SET_PERMISSIONS'						=> 'Dar Permissões',
	'SET_ROLE_PERMISSIONS'					=> 'Dar Permissões da Tarefa',
	'SET_USERS_PERMISSIONS'					=> 'Dar Permissões dos Utilizadores',
	'SET_USERS_FORUM_PERMISSIONS'			=> 'Dar Permissões dos Fóruns',

	'TRACE_DEFAULT'							=> 'Por Padrão, todas as opções estão assinaladas como <samp>NÃO</samp> (unset). Então, a permissão pode ser substituida por outras configurações.',
	'TRACE_FOR'								=> 'Copiar para',
	'TRACE_GLOBAL_SETTING'					=> '%s (global)',
	'TRACE_GROUP_NEVER_TOTAL_NEVER'			=> 'A Permissão do Grupo está assinalada como <samp>NUNCA</samp> como o resultado total, então o resultado antigo foi salvo.',
	'TRACE_GROUP_NEVER_TOTAL_NEVER_LOCAL'	=> 'A Permissão do Grupo para este Fórum está assinalada como <samp>NUNCA</samp>, então o antigo resultado total foi salvo.',
	'TRACE_GROUP_NEVER_TOTAL_NO'			=> 'A Permissão do Grupo está assinalada como <samp>NUNCA</samp> que torna-se o novo valor total porque ainda não estava assinalado (assinale <samp>NÃO</samp>).',
	'TRACE_GROUP_NEVER_TOTAL_NO_LOCAL'		=> 'A Permissão do Grupo para este Fórum está assinalada como <samp>NUNCA</samp> que vem a ser o novo valor total porque isto ainda não havia sido determinado (assinale <samp>NÃO</samp>).',
	'TRACE_GROUP_NEVER_TOTAL_YES'			=> 'A Permissão do Grupo está assinalada como <samp>NUNCA</samp> que substitui o total <samp>SIM</samp> para um <samp>NUNCA</samp> para este utilizador.',
	'TRACE_GROUP_NEVER_TOTAL_YES_LOCAL'		=> 'A Permissão do Grupo para este Fórum está assinalada como <samp>NUNCA</samp> que substitui o total <samp>SIM</samp> para um <samp>NUNCA</samp> a este Utilizador.',
	'TRACE_GROUP_NO'						=> 'A Permissão está assinalada como <samp>NÃO</samp> para este Grupo, o antigo valor total foi salvo.',
	'TRACE_GROUP_NO_LOCAL'					=> 'A Permissão do Grupo está assinalada como <samp>NÃO</samp>, o antigo valor total foi salvo.',
	'TRACE_GROUP_YES_TOTAL_NEVER'			=> 'A Permissão do Grupo está assinalada como <samp>SIM</samp> mas o total <samp>NUNCA</samp> não pode ser substituído.',
	'TRACE_GROUP_YES_TOTAL_NEVER_LOCAL'		=> 'A Permissão do Grupo está assinalada como <samp>SIM</samp> mas o total <samp>NUNCA</samp> não pode ser substituído.',
	'TRACE_GROUP_YES_TOTAL_NO'				=> 'A Permissão do Grupo está assinalada como <samp>SIM</samp> que torna-se o novo valor total porque ainda não estava assinalado (assinale <samp>NÃO</samp>).',
	'TRACE_GROUP_YES_TOTAL_NO_LOCAL'		=> 'A Permissão do Grupo está assinalada como <samp>SIM</samp> que se torna um novo valor total pois ainda não estava definito (assinale <samp>NÃO</samp>).',
	'TRACE_GROUP_YES_TOTAL_YES'				=> 'A Permissão do Grupo está assinalada como <samp>SIM</samp> e a permissão total já está assinalada como <samp>SIM</samp>, então o resultado total foi salvo.',
	'TRACE_GROUP_YES_TOTAL_YES_LOCAL'		=> 'A Permissão do Grupo para este Fórum está assinalada como <samp>SIM</samp> e a permissão total já está assinalada como <samp>SIM</samp>, então o antigo resultado total foi salvo.',
	'TRACE_PERMISSION'						=> 'Permissão de Cópia - %s',
	'TRACE_RESULT'							=> 'Indicar resultado',
	'TRACE_SETTING'							=> 'Configuração de Cópia',

	'TRACE_USER_GLOBAL_YES_TOTAL_YES'		=> 'A Permissão de Utilizador independente do Fórum está avaliada como <samp>SIM</samp> mas a permissão total já está assinalada como <samp>SIM</samp>, então o resultado total é salvo. %sCópia da Permissão Global%s',
	'TRACE_USER_GLOBAL_YES_TOTAL_NEVER'		=> 'A Permissão de Utilizador independente do Fórum está avaliada como <samp>SIM</samp> que substitui o resultado local atual <samp>NUNCA</samp>. %sCópia da Permissão Global%s',
	'TRACE_USER_GLOBAL_NEVER_TOTAL_KEPT'	=> 'A Permissão de Utilizador independente do Fórum está avaliada como <samp>NUNCA</samp> que não influencia na permissão local. %sCópia da Permissão Global%s',

	'TRACE_USER_FOUNDER'					=> 'O Utilizador é um Fundador, por isso as Permissões Administrativas estão sempre assinaladas como <samp>SIM</samp>.',
	'TRACE_USER_KEPT'						=> 'A Permissão do Utilizador é <samp>NÃO</samp>, então o antigo valor total foi salvo.',
	'TRACE_USER_KEPT_LOCAL'					=> 'A permissão do Utilizador está assinalada como <samp>NUNCA</samp> e o valor total está assinalado como <samp>NUNCA</samp>, então nada será alterado.',
	'TRACE_USER_NEVER_TOTAL_NEVER'			=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> e o valor total está assinalado como <samp>NUNCA</samp>, então nada é alterado.',
	'TRACE_USER_NEVER_TOTAL_NEVER_LOCAL'	=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> e o valor total está assinalado como <samp>NUNCA</samp> e substitui o sim previo.',
	'TRACE_USER_NEVER_TOTAL_NO'				=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> que torna-se o valor total porque estava assinalado como <samp>NÃO</samp>.',
	'TRACE_USER_NEVER_TOTAL_NO_LOCAL'		=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> mas o total <samp>NUNCA</samp> não pode ser substituído.',
	'TRACE_USER_NEVER_TOTAL_YES'			=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> e substitui o <samp>SIM</samp> prévio.',
	'TRACE_USER_NEVER_TOTAL_YES_LOCAL'		=> 'A Permissão do Utilizador está assinalada como <samp>NUNCA</samp> e substitui o <samp>SIM</samp> prévio',
	'TRACE_USER_NO_TOTAL_NO'				=> 'A Permissão do Utilizador é <samp>NÃO</samp> e o valor total estava assinalado como <samp>NÃO</samp>, então é padronizado para <samp>NUNCA</samp>.',
	'TRACE_USER_NO_TOTAL_NO_LOCAL'			=> 'A Permissão deste Utilizador para este Fórum é <samp>NÃO</samp> mas o total e o valor total estava definido como NÃO então é pré-definido para <samp>NUNCA</samp>.',
	'TRACE_USER_YES_TOTAL_NEVER'			=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> mas o total <samp>NUNCA</samp> não pode ser substituído.',
	'TRACE_USER_YES_TOTAL_NEVER_LOCAL'		=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> mas o total <samp>NUNCA</samp> não pode ser substituído.',
	'TRACE_USER_YES_TOTAL_NO'				=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> que torna-se o valor total porque estava assinalado como <samp>NÃO</samp>.',
	'TRACE_USER_YES_TOTAL_NO_LOCAL'			=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> que torna-se o valor total porque estava assinalado como <samp>NÃO</samp>.',
	'TRACE_USER_YES_TOTAL_YES'				=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> and o valor total é assinalado como <samp>SIM</samp>, então nada é alterado.',
	'TRACE_USER_YES_TOTAL_YES_LOCAL'		=> 'A Permissão do Utilizador está assinalada como <samp>SIM</samp> and o valor total é assinalado como <samp>SIM</samp>, então nada é alterado.',
	'TRACE_WHO'								=> 'Quem',
	'TRACE_TOTAL'							=> 'Total',

	'USERS_NOT_ASSIGNED'					=> 'Nenhum Utilizador atribuído a esta tarefa',
	'USER_IS_MEMBER_OF_DEFAULT'				=> 'é um Membro dos Grupos Pre-Definidos seguintes',
	'USER_IS_MEMBER_OF_CUSTOM'				=> 'é um Membro dos Grupos Personalizados pelo Utilizador seguintes',

	'VIEW_ASSIGNED_ITEMS'					=> 'Ver Itens Atribuídos',
	'VIEW_LOCAL_PERMS'						=> 'Permissões Locais',
	'VIEW_GLOBAL_PERMS'						=> 'Permissões Globais',
	'VIEW_PERMISSIONS'						=> 'Ver Permissões',

	'WRONG_PERMISSION_TYPE'					=> 'O Tipo de Permissão foi selecionado de forma errada, o phpBB NÃO o consegue processar corretamente.',
	'WRONG_PERMISSION_SETTING_FORMAT'		=> 'O Tipo de Permissão foi selecionado de forma errada, o phpBB NÃO o consegue processar corretamente.',
));

?>