<?php
	if(isset($_GET['change'])) $next = '';
	else $next = 'active';
?>
<div class="widget widget-tabs widget-tabs-double-2">
	<div class="widget-head">
		<ul>
			<li class="<?=$next;?>"><a class="glyphicons <tag{ICON_AGENDA}>" href="#tabNext" data-toggle="tab"><i></i><span><tag{escalas_next_events}></span></a></li>
			<li><a class="glyphicons inbox_plus" href="#tabAdd" data-toggle="tab"><i></i><span><tag{geral_add}></span></a></li>
			<?php if(isset($_GET['change'])) { ?>
				<li class="active"><a class="glyphicons pencil" href="#tabChange" data-toggle="tab"><i></i><span><tag{geral_change}></span></a></li>
			<?php }?>
		</ul>
	</div>
	<div class="widget-body">
		<div class="tab-content">
			<div id="tabNext" class="tab-pane <?=$next;?> widget-body-regular">
				<div class="widget widget-activity">
					<div class="widget-head">
						<div class="row-fluid">
							<span class="span3"><strong>DATA</strong></span>
							<span class="span5"><strong>EVENTO</strong></span>
							<span class="span3"><strong>EQUIPE</strong></span>
							<span></span>
						</div>
					</div>
					<div class="widget-body">
						<div class="row-fluid">
							<div class="slim-scroll" data-scroll-height="400px" id="listaEscalas">
								<ul class="list">
									<tag{LISTA_ESCALAS}>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tabAdd" class="tab-pane widget-body-regular">
				<div class="widget">
					<!-- Form -->
					<form name="formAddEscala" id="formAddEscala" method="post" action="">
						<div class="widget-head">
							<h4 class="heading"><tag{geral_add}> - <tag{escalas_title}></h4>
						</div>
						<div class="widget-body">
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_nome"><tag{escalas_nome}></label>
										<div class="controls">
											<input id="escalas_nome" name="escalas_nome" placeholder="<tag{escalas_nome_text}>" type="text" maxlength="50">
										</div>
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_data"><tag{escalas_data}></label>
										<div class="controls">
											<div class="input-append date" id="datetimepicker">
												<input id="escalas_data" name="escalas_data" type="text" maxlength="50" value="<tag{escalas_data_today}>">
											<span class="add-on"><i class="icon-th"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
								<div class="control-group">
									<label class="control-label" for="agenda_obs"><tag{escalas_agenda_obs}></label>
									<div class="controls">
										<span class="span1">&nbsp;</span>
										<input id="agenda_obs" class="span11" name="agenda_obs" placeholder="<tag{escalas_agenda_obs}>" type="text">
									</div>
								</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
								<div class="control-group">
									<label class="control-label" for="escala_obs"><tag{escalas_obs}></label>
									<div class="controls">
										<span class="span1">&nbsp;</span>
										<input id="escala_obs" class="span11" name="escala_obs" placeholder="<tag{escalas_obs}>" type="text">
									</div>
								</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_equipes"><tag{escalas_equipes}></label>
										<div class="controls">
											<span class="span1">&nbsp;</span>
											<select id="escalas_equipes" name="escalas_equipes"><tag{SELECT_EQUIPES}></select>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="control-group">
										<label class="control-label" for="escalas_equipes"><tag{escalas_musicas}></label>
										<div class="slim-scroll" data-scroll-height="250px">
											<tag{SELECT_MUSICAS}>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span4 center">
									<span class="btn btn-primary formSubmitButton"><tag{geral_add}></span>
								</div>
							</div>
							<div class="separator"></div>
						</form>
					</div>
				</div>
			</div>
			<?php if(isset($_GET['change'])) { ?> 
			<div id="tabChange" class="tab-pane active widget-body-regular">
				<div class="widget">
					<!-- Form -->
					<form name="formChangeEscala" id="formChangeEscala" method="post" action="">
						<input type="hidden" id="escala_id" name="escala_id">
						<div class="widget-head">
							<h4 class="heading"><tag{geral_change}> - <tag{escalas_title}></h4>
						</div>
						<div class="widget-body">
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_nome"><tag{escalas_nome}></label>
										<div class="controls">
											<input id="escalas_nome" name="escalas_nome" placeholder="<tag{escalas_nome_text}>" type="text" maxlength="50" value="">
										</div>
									</div>
								</div>
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_data"><tag{escalas_data}></label>
										<div class="controls">
											<div class="input-append date" id="datetimepicker">
												<input id="escalas_data" name="escalas_data" type="text" maxlength="50" value="<tag{escalas_data_today}>">
											<span class="add-on"><i class="icon-th"></i></span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
								<div class="control-group">
									<label class="control-label" for="agenda_obs"><tag{escalas_agenda_obs}></label>
									<div class="controls">
										<span class="span1">&nbsp;</span>
										<input id="agenda_obs" class="span11" name="agenda_obs" placeholder="<tag{escalas_agenda_obs}>" type="text">
									</div>
								</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
								<div class="control-group">
									<label class="control-label" for="escala_obs"><tag{escalas_obs}></label>
									<div class="controls">
										<span class="span1">&nbsp;</span>
										<input id="escala_obs" class="span11" name="escala_obs" placeholder="<tag{escalas_obs}>" type="text">
									</div>
								</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span6">
									<div class="control-group">
										<label class="control-label" for="escalas_equipes"><tag{escalas_equipes}></label>
										<div class="controls">
											<span class="span1">&nbsp;</span>
											<select id="escalas_equipes" name="escalas_equipes"><tag{SELECT_EQUIPES}></select>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="control-group">
										<label class="control-label" for="escalas_equipes"><tag{escalas_musicas}></label>
										<div class="slim-scroll" data-scroll-height="250px">
											<tag{SELECT_MUSICAS}>
										</div>
									</div>
								</div>
							</div>
							<div class="row-fluid">
								<div class="span4 center">
									<span class="btn btn-primary formSubmitButton"><tag{geral_add}></span>
								</div>
							</div>
							<div class="separator"></div>
						</form>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
	<div class="widget-footer">
		<div class="separator"></div>
	</div>
</div>
