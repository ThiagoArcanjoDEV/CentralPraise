/** SCRIPTS **/
$(function(){
	// Select Igreja
	$('#igreja_select').change(function(){
		var id = $(this).find(":selected").val();
                $.ajax({
                        type: "post",
                        url: "?ajax=igreja&select",
                        data: {id:id}
                }).done(function(){
                        location.reload();
                });
                return false;
	});

	// Monta Popover
	$('.mountPopover').click(function(){
		var mount = $(this);
		$.ajax({
			type: "post",
			url: "?ajax=login&mount",
			data: {}
		}).done(function( retorno ){
			$('.popover-content').html(retorno);
		});
		return false;
	});

	// Login
	$(document).on('keypress','.formLogin',function(e)
	{
		if(e.which == 13)
		{		
			$('.formLoginButton').click(); //Trigger search button click event
		}
	});
	$(document).on("click",".formLoginButton",function(){
		var login = $('#login_text').val();
		var senha = $('#login_senha').val();
                $.ajax({
                        type: "post",
                        url: "?ajax=login",
                        data:
			{
				login:login,
				senha:senha
			}
                }).done(function( retorno ){
			retorno = retorno.split('|');
			if(retorno[0]=='1')
			{
				$('.restart').children('span').html(retorno[1]);
				setTimeout(function(){document.location = '?';},1000);
			}
			else $('.restart').children('span').html(retorno[1]);
                });
                return false;
	});

	// Open - Louvor
	$('div').on("click",".louvorOpen", function(){
		var id = '';
                if($(this).find('span.musica_id').text())
                {
                        id = $(this).find('span.musica_id').text();
                        window.open('?louvoropen&music='+id,'LOUVOR');
                }
		else
		{
			if($('#listaEscaladosTitle').find('span.escala_id').text())
			{
				id = $('#listaEscaladosTitle').find('span.escala_id').text();
				window.open('?louvoropen='+id,'LOUVOR');
			}
			else window.open('?louvoropen','LOUVOR');
		}
		return false;
	});

	//Listas
	$('div').on("click",".listaL",function()
	{
		var thisClasses = $(this).attr('class');
		var lista = null;
		thisClasses = thisClasses.split(' ');
		for(var a=0;a<thisClasses.length;a++){
			if(thisClasses[a].indexOf('|')>=0){
				lista = thisClasses[a].split('|');
				break;
			}
		}
		mountListas(lista[0],lista[1]);
	});

	// Botao de filtro nas escalas
	$('.btn-action.search.escalas').click(function()
	{
		var search = $('#search_text').val();
		$.ajax(
		{
			type: "post",
			url: "?ajax=escalas&filtro",
			data: {search:search}
		}).done(function(retorno)
		{
			$('#listaEscalas').children('ul').html(retorno);
		});
	});

	// FORM CHANGE MEMBER
	$('#formChangeMember #member_tag').mask('SSS',
	{
		onKeyPress: function (value, event) {event.currentTarget.value = value.toUpperCase();}
	});
	$("#formChangeMember .phone").mask("(99) Z9999-9999",
	{
		translation:{'Z': {pattern: /[9]/, optional: true}}
	});
	$("#formChangeMember .email").blur(function()
	{
		if(!(validateEmail($(this).val()))) $(this).val('');
	});
	$("#formChangeMember").submit(function(event)
	{
		event.preventDefault();
		$('#div_alerts').html('');
		var errors = [];
		var types = [];
		if($('#member_name').val()=='') errors.push('member_name');
		if($('#member_tag').val()=='') errors.push('member_tag');
		if($('#member_email').val()=='') errors.push('member_email');
		if($('#login_text').val()=='') errors.push('login_text_empty');
		if($('#login_senha').val()=='') errors.push('login_senha_empty');
		else if($('#login_senha_conf').val()!='' && $('#login_senha').val()!=$('#login_senha_conf').val()) errors.push('login_senha_conf');
		
		if(errors.length>0)
		{
			$.each(errors, function(index, value)
			{
				if(value=='login_senha_empty') types.push("");
				else types.push("alert-error");
			});
			
			showAlerts(errors,types);
		}
		else
		{
			$.ajax({
				type: 'post',
				url: '?ajax=membros&change',
				data:
				{
					member_id: $('#member_id').val(),
					member_name: $('#member_name').val(),
					member_tag: $('#member_tag').val(),
					member_tel: $('#member_tel').val(),
					member_cel: $('#member_cel').val(),
					member_email: $('#member_email').val(),
					login_text: $('#login_text').val(),
					login_senha: $('#login_senha').val()
				},
				dataType: 'json'
			}).done(function( retorno ){
				types.push(retorno[0]);
				errors.push(retorno[1]);
					
				showAlerts(errors,types);
				if(retorno[2]) setTimeout(function(){document.location = '?home';},2000); 
			});
		}
		return false;
	});

	$('#datetimepicker').datetimepicker(
	{
		format: "dd/mm/yyyy hh:ii"
	});
	
	$('#selectMembersModal').click(function()
	{
		var equipe = $('#escalas_equipes').val();
		
		$.ajax({
			type: 'post',
			url: '?ajax=escalas&mountSelectMembros',
			data: {equipe:equipe}
		}).done(function( retorno ){
			var listaEscalados = $('#listaEscalados').children().find('tbody');
			 listaEscalados.html(retorno);
		});
	});

});

function showAlerts(msg,type)
{
	$('#div_alerts').html('');

	$.ajax({
		type: 'post',
		url: '?ajax=getMessages',
		data: {msg:msg},
		dataType: 'json'
	}).done(function( retorno ){
		$.each(retorno, function(index, value)
		{
			var listaDiv = null;
			var div_alert = document.createElement('div');
			$(div_alert).addClass("alert");
			$(div_alert).addClass(type[index]);
			$(div_alert).html(value);
			$('#div_alerts').append(div_alert);
		});
	});
}

function validateEmail(email) {
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	return emailReg.test(email);
}

function mountListas(lista,id)
{
	$("#loading").show();
	$.ajax({
		type: 'post',
		url: '?ajax=lista',
		data: {lista:lista,listaID:id}
	}).done(function( retorno ){
		var listaDiv = null;
		var aux = null;

		switch(lista){
			case 'equipe':
				aux = $('#listaMembros').children().find('tbody');
				break;
			case 'escala':
				aux = Array();
				aux[0] = $('#listaEscalados').children().find('tbody');
				aux[1] = $('#listaMusicasEscala').children().find('tbody');
				aux[2] = $('#listaEscaladosTitle').children().find('span');
				retorno = retorno.split("||");
				break;
		}

		if(aux instanceof Array){
			aux[0].empty();
			aux[1].empty();
			aux[2].empty();
			aux[0].html(retorno[0]);
			aux[1].html(retorno[1]);
			aux[2].html(retorno[2]);
		}
		else{
			aux.empty();
			aux.append(retorno);
		}
	});

	$("#loading").hide();

	return false;
}