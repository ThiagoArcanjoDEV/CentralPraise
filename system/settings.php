<?php
/** Configurações do banco de dados **/
	require_once("database.php");				// Arquivo com as configurações de PROD e DEV do Banco de Dados.
	
	defined('HOST') || define('HOST',DEV_HOST);		// Host do banco de dados
	defined('USER') || define('USER',DEV_USER);		// Usuário do mysql
	defined('PASS') || define('PASS',DEV_PASS);		// Senha do usuário
	defined('DATABASE') || define('DATABASE',DEV_DATABASE);	// Banco de Dados

/** Configurações de pastas **/
	defined('PAGES_TPL') || define('PAGES_TPL','view');
	defined('PAGES_IMG') || define('PAGES_IMG','view/img');
	defined('PAGES_THEME') || define('PAGES_THEME','view/theme');
	defined('PAGES_APOIO') || define('PAGES_APOIO','system/classes/apoio');
	$_ROOT = PAGES_THEME;

/** Configurações gerais **/
	defined('APP_NAME') || define('APP_NAME','Central Praise');		// Título do APP
	defined('APP_VERSION') || define('APP_VERSION','v1.1');			// Versao do APP
	date_default_timezone_set('America/Sao_Paulo');

/** Configurações de Imagens **/
	defined('ICON_LOGO') || define('ICON_LOGO','glyphicons chevron-right');			// Imagem padrão para LOGO
	defined('ICON_MUSICAS') || define('ICON_MUSICAS','glyphicons music');			// Imagem padrão para Musicas
	defined('ICON_ESCALAS') || define('ICON_ESCALAS','glyphicons notes_2');			// Imagem padrão para Escalas
	defined('ICON_EQUIPES') || define('ICON_EQUIPES','glyphicons group');			// Imagem padrão para Equipes
	defined('ICON_SENHA') || define('ICON_SENHA','glyphicons keys');			// Imagem padrão para Senha
        defined('ICON_USER') || define('ICON_USER','glyphicons user');				// Imagem padrão para Login
	defined('ICON_AGENDA') || define('ICON_AGENDA','glyphicons calendar');			// Imagem padrão para Agenda
	defined('ICON_NEWS') || define('ICON_NEWS','glyphicons circle_info');			// Imagem padrão para Noticias
	defined('ICON_ESCALADOS') || define('ICON_ESCALADOS','glyphicons parents');		// Imagem padrão para Escalados
	defined('ICON_MEMBRO') || define('ICON_MEMBRO','glyphicons user');			// Imagem padrão para Membro
	defined('ICON_PAINEL') || define('ICON_PAINEL','glyphicons fullscreen');		// Imagem padrão para o Painel
	defined('ICON_LOGOUT') || define('ICON_LOGOUT','glyphicons eject');			// Imagem padrão para Logout
	defined('ICON_CHANGE') || define('ICON_CHANGE','glyphicons edit');			// Imagem padrão para Logout
	
/** Configurações THEME **/
	// development / production
	defined('DEV') || define('DEV', false);

	// used to determine what resources to use in final package
	defined('DEMO') || define('DEMO', false);

	// toggle google analytics code in head section
	defined('GA') || define('GA', false);

	// default level / used for getURL paths (should't be modified)
	defined('LEVEL') || define('LEVEL', 0);

	// allow menu customization from the browser
	defined('MENU_JS') || define('MENU_JS', false);

	// allow layout customization from the browser
	defined('LAYOUT_JS') || define('LAYOUT_JS', false);

	// allow skin customization from the browser
	defined('SKIN_JS') || define('SKIN_JS', false);

	// show dark/light style toggle button
	defined('STYLE_TOGGLE') || define('STYLE_TOGGLE', !DEMO ? false : true);

	// 'menu-right' / 'menu-left' or 'menu-hidden'
	defined('MENU_POSITION') || define('MENU_POSITION', 'menu-hidden');

	// 'fixed' or 'fluid'
	defined('LAYOUT_TYPE') || define('LAYOUT_TYPE', 'fluid');

	// MAIN stylesheet
	defined('STYLE') || define('STYLE', 'style-light');

	// filename without extension (eg. "brown") or false for default
	defined('SKIN_CUSTOM') || define('SKIN_CUSTOM', 'blue-gray');

	// edit SKIN_CUSTOM above
	defined('SKIN') || define('SKIN', SKIN_JS ? false : SKIN_CUSTOM);

	// enable or disable the Guided Tour
	defined('GUIDED_TOUR') || define('GUIDED_TOUR', false);

	// enable or disable the Resizable sidebars functionality
	defined('MENU_RESIZABLE') || define('MENU_RESIZABLE', false);

	// Colors
	defined('primaryColor') || define('primaryColor', "#8ec657");
	defined('dangerColor') || define('dangerColor', "#b55151");
	defined('successColor') || define('successColor', "#609450");
	defined('warningColor') || define('warningColor', "#ab7a4b");
	defined('inverseColor') || define('inverseColor', "#45484d");
?>
