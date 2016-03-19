<?php
// Indica qual charset utilizado
header('Content-Type: text/html; charset=utf-8');

//# Iniciando a sessão #
@session_start();

//Autoload
include('system/autoload.php');

$FileText = new FileText;
$FileText->setDefault("geral");

// Configurações
include('system/settings.php');

// Textos
include('system/textos.php');

// Classes principais
$Tpl = new Tpl();
$SQL = new SQL();
$Pages = new Pages();
$Ajax = new Ajax();

// Definições gerais utilizados nos templates
$Tpl->setTag('APP_NAME',APP_NAME);
$Tpl->setTag('APP_VERSION',APP_VERSION);
$Tpl->setTag('PAGES_TPL',PAGES_TPL);
$Tpl->setTag('PAGES_IMG',PAGES_IMG);
$Tpl->setTag('PAGES_THEME',PAGES_THEME);

// ICONES
$Tpl->setTag('ICON_LOGO',ICON_LOGO);
$Tpl->setTag('ICON_MUSICAS',ICON_MUSICAS);
$Tpl->setTag('ICON_ESCALAS',ICON_ESCALAS);
$Tpl->setTag('ICON_EQUIPES',ICON_EQUIPES);
$Tpl->setTag('ICON_SENHA',ICON_SENHA);
$Tpl->setTag('ICON_USER',ICON_USER);
$Tpl->setTag('ICON_AGENDA',ICON_AGENDA);
$Tpl->setTag('ICON_NEWS',ICON_NEWS);
$Tpl->setTag('ICON_ESCALADOS',ICON_ESCALADOS);
$Tpl->setTag('ICON_MEMBRO',ICON_MEMBRO);
$Tpl->setTag('ICON_PAINEL',ICON_PAINEL);
$Tpl->setTag('ICON_CHANGE',ICON_CHANGE);

if(!empty($_GET))
{
	$option = array_keys($_GET);
	if(isset($_GET['ajax'])) $Ajax->Load($_POST);
}
else $option = false;

if(isset($_SESSION['ACESSO']['ID']) && !empty($_SESSION['ACESSO']['ID']))
{
	if($option && !isset($_GET['ajax'])) $_SESSION["PAGE"] = $option[0];
	else $_SESSION["PAGE"] = 'home';
}
else $_SESSION["PAGE"] = 'login';

$Tpl->setTag('PAGE',$_SESSION["PAGE"]);
$Pages->Load($_SESSION["PAGE"]);

if(!isset($_GET['ajax'])) $Tpl->show();
?>
