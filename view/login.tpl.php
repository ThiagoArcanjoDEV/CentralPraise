<div id="login">
	<div id="container">
		<div class="wrapper">
			<a class="appbrand" href="?" style="text-decoration:none;">
				<h1 class="glyphicons lock">
					<i></i>
					<tag{APP_NAME}>
				</h1>
			</a>
			<!-- BOX -->
			<div class="widget">
				<div class="widget-head">
					<h3 class="heading"><tag{login_subtitle}></h3>
					<div class="pull-right">
						<tag{login_without_account}>
						<a href="" class="btn btn-inverse btn-mini">Cadastrar</a>
					</div>
				</div>
				<div class="widget-body formLogin">
					<!-- Form -->
						<label for="login_text">Login</label>
						<input id="login_text" name="login_text" class="input-block-level" placeholder="<tag{login_input_text}>" type="text"> 
						<label for="login_senha">Senha<a class="password" href=""><tag{login_forgot_password}></a></label>
						<input id="login_senha" name="login_senha" class="input-block-level margin-none" placeholder="<tag{login_input_senha}>" type="password">
						<div class="separator bottom"></div> 
						<div class="row-fluid">
							<div class="span4 center">
								<button class="btn btn-block btn-primary formLoginButton">Entrar</button>
							</div>
						</div>
					<!-- // Form END -->
				</div>
				<div class="widget-footer">
					<p class="glyphicons restart"><i></i><span><tag{login_form_info}></span></p>
				</div>
			</div>
		</div>
	</div>
</div>
