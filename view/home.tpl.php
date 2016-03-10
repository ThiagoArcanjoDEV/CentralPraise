<div id="content">
<h2><tag{APP_NAME}> <span><tag{home_subtitle}></span></h2>
<div class="innerLR innerT">
	<!-- AGENDA e INFO -->
	<div class="widget span7">
	
		<!-- Widget heading -->
		<div class="widget-head">
			<h4 class="heading <tag{ICON_AGENDA}>"><i></i>Agenda</h4>
		</div>
		<!-- // Widget heading END -->
		
		<div class="widget-body">
			<div id="calendar"></div>
		</div>
		<div class="widget-footer">
			<div class="separator"></div>
		</div>
		<div class="row-fluid">
			<div class="widget widget-activity margin-none" data-toggle="collapse-widget">
				<div class="widget-head">
					<h4 class="heading <tag{ICON_NEWS}>"><i></i>&Uacute;ltimas Not&iacute;cias</h4>
				</div>
				<div class="widget-body">
					<div class="tab-content">
						<div class="tab-pane active" id="filterMessagesTab">
							<ul class="list">
								<tag{NEWS}>
							</ul>
						</div>
						<!-- // Filter Messages Tab END -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // AGENDA e INFO END -->
	
	<div class="span1 hidden-phone">&nbsp;</div>
	
	<!-- PROXIMA ESCALA -->
	<div class="span8">
		<div class="relativeWrap">
			<div class="widget widget-3">
				<div class="widget-head">
					<div id="listaEscaladosTitle">
						<h4 class="heading <tag{ICON_ESCALAS}>"><i></i><tag{NEXT_ESCALA}></h4>
					</div>
				</div>
				<div class="widget-body">
					<div id="listaEscalados">
						<table class="table table-condensed table-vertical-center table-thead-simple table-responsive">
							<thead>
								<tr>
									<th colspan="2" class="center"><h4 class="<tag{ICON_ESCALADOS}>"><i></i>Escalados</h4></th>
								</tr>
							</thead>
							<tbody>
								<tag{NEXT_ESCALADOS}>
							</tbody>
						</table>
					</div>
					<div class="separator bottom"></div>
					<div id="listaMusicasEscala">
						<table class="table table-condensed table-vertical-center table-thead-simple table-responsive">
							<thead>
								<tr>
									<th colspan="2" class="center">
										<div class="row-fluid">
											<div class="span9">
												<h4 class="<tag{ICON_MUSICAS}>"><i></i>M&uacute;sicas</h4>
											</div>
											<div class="span3">
												<span class="btn btn-block btn-primary btn-icon <tag{ICON_PAINEL}> louvorOpen"><i></i>PAINEL</span>
											</div>
										</div>
									</th>
								</tr>
							</thead>
							<tbody>
								<tag{NEXT_MUSICAS}>
							</tbody>
						</table>
					</div>
					<div id="loading"><img src="<tag{PAGES_IMG}>/load.gif">&nbsp;Carregando...</div>
				</div>
			</div>
		</div>
	</div>
	<!-- // PROXIMA ESCALA END -->
</div>
