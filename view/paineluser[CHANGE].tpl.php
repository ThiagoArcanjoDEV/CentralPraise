<div id="content">
<h2><tag{MENU}> <span><tag{paineluser_change_subtitle}></span></h2>
	<div class="innerLR innerT">
		<div class="span7">
			<div class="widget widget-activity">
				<div class="widget-head">
					<h4 class="heading <tag{ICON_CHANGE}>"><i></i><tag{paineluser_change}></h4>
				</div>
				<div class="widget-body">
					<!-- Form -->
					<form name="formChangeMember" id="formChangeMember" method="post" action="">
						<input id="member_id" name="member_id" class="hidden" type="hidden" value="<tag{MEMBER_ID}>">
						<label for="member_name">Nome</label>
						<input id="member_name" name="member_name" class="input-block-level" placeholder="<tag{paineluser_name_input}>" type="text" value="<tag{MEMBER_NAME}>" maxlength="50">
						<label for="member_tag">TAG</label>
						<input id="member_tag" name="member_tag" class="input-block-level" placeholder="<tag{paineluser_tag_input}>" type="text" value="<tag{MEMBER_TAG}>">
						<label for="member_tel">Telefone</label>
						<input id="member_tel" name="member_tel" class="input-block-level phone" placeholder="<tag{paineluser_tel_input}>" type="text" value="<tag{MEMBER_TEL}>">
						<label for="member_cel">Celular</label>
						<input id="member_cel" name="member_cel" class="input-block-level phone" placeholder="<tag{paineluser_cel_input}>" type="text" value="<tag{MEMBER_CEL}>">
						<label for="member_email">E-mail</label>
						<input id="member_email" name="member_email" class="input-block-level email" placeholder="<tag{paineluser_email_input}>" type="text" value="<tag{MEMBER_EMAIL}>">
						<label for="login_text">Login</label>
						<input id="login_text" name="login_text" class="input-block-level" placeholder="<tag{paineluser_login_input}>" type="text" value="<tag{MEMBER_LOGIN}>">
						<label for="login_senha">Senha<a class="password" href=""><tag{login_forgot_password}></a></label>
						<input id="login_senha" name="login_senha" class="input-block-level margin-none" placeholder="<tag{paineluser_senha_input}>" type="password">
						<label for="login_senha_conf">Confirmar Senha<a class="password" href=""><tag{login_forgot_password}></a></label>
						<input id="login_senha_conf" name="login_senha_conf" class="input-block-level margin-none" placeholder="<tag{paineluser_senha_conf}>" type="password">
						<div class="separator bottom"></div> 
						<div class="row-fluid">
							<div class="span4 center">
								<button class="btn btn-block btn-primary formSubmitButton"><tag{geral_change}></button>
							</div>
						</div>
					
					</form>
				</div>
				<div class="widget-footer">
					<div class="separator"></div>
				</div>
			</div>
		</div>
		<div class="span1 hidden-phone">&nbsp;</div>
		<div id="div_alerts" class="span6"></div>
	</div>
</div>
