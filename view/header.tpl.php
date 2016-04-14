<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9"> <![endif]-->
<!--[if gt IE 8]> <html class="ie gt-ie8"> <![endif]-->
<!--[if !IE]><!--><html><!-- <![endif]-->
	<head>
		<title><tag{APP_NAME}> - <tag{MENU}></title>
	
		<!-- Meta -->
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="light">
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
		
		<!-- Bootstrap -->
		<link href="<tag{PAGES_THEME}>/bootstrap/css/bootstrap.css" rel="stylesheet" />
		<link href="<tag{PAGES_THEME}>/bootstrap/css/responsive.css" rel="stylesheet" />

		<!-- Glyphicons Font Icons -->
		<link href="<tag{PAGES_THEME}>/theme/css/glyphicons.css" rel="stylesheet" />

		<!-- Uniform Pretty Checkboxes -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/pixelmatrix-uniform/css/uniform.default.css" rel="stylesheet" />

	<?php if ($_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'choose'): ?>
		<!-- Bootstrap Extended -->
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap.min.css" rel="stylesheet">
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/jasny-bootstrap/css/jasny-bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-wysihtml5/css/bootstrap-wysihtml5-0.0.2.css" rel="stylesheet">
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-select/bootstrap-select.css" rel="stylesheet" />
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" rel="stylesheet" />

		<!-- Select2 Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/select2/select2.css" rel="stylesheet" />

		<!-- DateTimePicker Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet" />

		<!-- JQueryUI -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/system/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" />

		<!-- MiniColors ColorPicker Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.css" rel="stylesheet" />

		<!-- Notyfy Notifications Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.css" rel="stylesheet" />
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/notifications/notyfy/themes/default.css" rel="stylesheet" />

		<!-- Gritter Notifications Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/notifications/Gritter/css/jquery.gritter.css" rel="stylesheet" />

		<!-- Easy-pie Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.css" rel="stylesheet" />

		<!-- Google Code Prettify Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/other/google-code-prettify/prettify.css" rel="stylesheet" />

	<?php endif; ?>
	<?php if ((GUIDED_TOUR && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'documentation' && $_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'choose') || $_SESSION["PAGE"] == 'tour'): ?>
		<!-- Pageguide Guided Tour Plugin -->
		<!--[if gt IE 8]><!--><link media="screen" href="<tag{PAGES_THEME}>/theme/scripts/plugins/other/pageguide/css/pageguide.css" rel="stylesheet" /><!--<![endif]-->

	<?php endif; ?>
	<?php if ($_SESSION["PAGE"] == 'tables'): ?>
		<!-- DataTables Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/tables/DataTables/media/css/DT_bootstrap.css" rel="stylesheet" />

	<?php endif; ?>
	<?php if ($_SESSION["PAGE"] == 'sliders'): ?>
		<!-- JQRangeSlider Sliders Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/sliders/jQRangeSlider/css/iThing.css" rel="stylesheet" />

	<?php endif; ?>
	<?php if ($_SESSION["PAGE"] == 'index' || $_SESSION["PAGE"] == 'gallery_1' || $_SESSION["PAGE"] == 'gallery_2' || $_SESSION["PAGE"] == 'shop_client_product'): ?>
		<!-- Bootstrap Image Gallery -->
		<link href="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-image-gallery/css/bootstrap-image-gallery.min.css" rel="stylesheet" />

	<?php endif; ?>
	<?php if ($_SESSION["PAGE"] == 'form_elements'): ?>
		<!-- Farbtastic ColorPicker Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/color/farbtastic/farbtastic.css" rel="stylesheet" />

	<?php endif; ?>
	<?php if ($_SESSION["PAGE"] == 'calendar'): ?>
		<!-- Calendar Plugin -->
		<link href="<tag{PAGES_THEME}>/theme/scripts/plugins/calendars/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />

	<?php endif; ?>
		<!-- Main Theme Stylesheet :: CSS -->
		<link href="<tag{PAGES_THEME}>/theme/css/<?php echo STYLE; ?>.css" rel="stylesheet" />

		<!-- Skin Stylesheet :: CSS -->
		<link href="<tag{PAGES_THEME}>/theme/skins/css/<?php echo SKIN; ?>.css" rel="stylesheet" />

		<!-- LESS.js Library -->
		<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/less.min.js"></script>
		
		<!-- My Styles -->
		<link rel="stylesheet" type="text/css" href="<tag{PAGES_TPL}>/css/estilos.css" />
		<link rel="stylesheet" type="text/css" href="<tag{PAGES_TPL}>/css/areas.css" />
	
	</head>

	<body class='<?php if ($_SESSION["PAGE"] == "login" || $_SESSION["PAGE"] == "error"): ?>login<?php endif; ?>'>
		<div id="div_alerts" class="span6"></div>
		<?php if ($_SESSION["PAGE"] != 'login'): ?>
		<div class="container-fluid fluid">
			<tag{TOPNAV}>
		<?php endif; ?>
