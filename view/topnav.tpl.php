<!-- Top Menu for Desktop -->
<div class="row-fluid widget-stats-group hidden-phone hidden-print">
	<div class="span1 center">
		<a class="widget-stats" href="?home">
			<span class="<tag{ICON_LOGO}>"><i></i></span>
			<span class="txt"><tag{APP_NAME}></span>
		</a>
	</div>
	<div class="span2">
                <span class="widget-stats">
                                <select class="span10" id="igreja_select" name="igreja_select">
                                        <option value="" disabled selected>Selecione a Localidade</option>
                                        <tag{SELECT_IGREJA}>
                                </select>
                </span>
	</div>
	<div class="span2">
		<a class="widget-stats" href="?musicas">
			<span class="<tag{ICON_MUSICAS}>"><i></i></span>
			<span class="txt">M&uacute;sicas</span>
			<div class="clearfix"></div>
			<span class="count label label-primary"><tag{MUSICA_QUANT}></span>
		</a>
	</div>
	<div class="span2">
		<a class="widget-stats" href="?escalas">
			<span class="<tag{ICON_ESCALAS}>"><i></i></span>
			<span class="txt">Escalas</span>
			<div class="clearfix"></div>
			<span class="count label label-primary"><tag{ESCALA_QUANT}></span>
		</a>
	</div>
	<div class="span2">
		<a class="widget-stats" href="?equipes">
			<span class="<tag{ICON_EQUIPES}>"><i></i></span>
			<span class="txt">Equipes</span>
			<div class="clearfix"></div>
			<span class="count label label-primary"><tag{EQUIPE_QUANT}></span>
		</a>
	</div>
	<div class="span2" id="profile">
		<tag{USER_TOPNAV}>
	</div>
</div>
<!-- Top Menu for Phone -->
<div class="navbar main visible-phone hidden-print">
	<div class="wrapper">
		<ul class="topnav pull-left">
			<li class="dropdown dd-1">
				<a href="" data-toggle="dropdown">MENU</a>
				<ul class="dropdown-menu pull-left">
					<li><a href="?home" class="<tag{ICON_LOGO}>"><i></i><tag{APP_NAME}></a></li>
					<li>
		                                <select class="span10" id="igreja_select" name="igreja_select">
                		                        <option value="" disabled selected>Selecione a Localidade</option>
                                		        <tag{SELECT_IGREJA}>
		                                </select>
					</li>
					<li><a href="?musicas" class="<tag{ICON_MUSICAS}>"><i></i> M&uacute;sicas</a></li>
					<li><a href="?escalas" class="<tag{ICON_ESCALAS}>"><i></i> Escalas</a></li>
					<li><a href="?equipes" class="<tag{ICON_EQUIPES}>"><i></i> Equipes</a></li>
					<li><tag{USER_TOPNAV_MOB}></li>
				</ul>
			</li>
		</ul>
		<!-- // Top Menu END -->
		<div class="clearfix"></div>
	</div>
	<!-- // Wrapper END -->
</div>
<div class="clearfix"></div>
<div class="separator bottom"></div>
<!-- Top navbar END -->
