/** SCRIPTS **/
$(function()
{
	/* initialize the calendar
	-----------------------------------------------------------------*/
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,today',
			center: 'title',
			right: 'next'
		},
		editable: false,
		droppable: false,
		dateFormat: 'dd/mm/yyyy',
		dayNames: ['Domingo','Segunda','Ter&ccedil;a','Quarta','Quinta','Sexta','S&aacute;bado'],
		dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S&aacute;b','Dom'],
		monthNames: ['Janeiro','Fevereiro','Mar&ccedil;o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		buttonText: {
			today: 'hoje',
			month: 'm&ecirc;s',
			week: 'semana',
			day: 'dia'
		},
		events: "?ajax=calendar",
        	eventRender: function(event, element) {
			element.attr('title', event.tip);
			element.attr('data-placement', "right");
			element.attr('data-original-title', event.tip);
			element.attr('data-toggle', "tooltip");
			element.attr('rel', "tooltip");
		},
		eventAfterRender: function (event, element, view) {
			var date = new Date();
			var d = date.getDate();
			var m = date.getMonth();
			var y = date.getFullYear();
			if (d < 10) {
				d = "0" + d;
			}
			if (m < 10) {
				m = "0" + m;
			}
			var dateFormated = y+''+m+''+d;

			date = new Date(event.start);
			d = date.getDate();
			m = date.getMonth();
			y = date.getFullYear();
			if (d < 10) {
				d = "0" + d;
			}
			if (m < 10) {
				m = "0" + m;
			}
			var edateFormated = y+''+m+''+d;

			if (edateFormated < dateFormated) {
				element.addClass('old_event');
				element.children().removeClass('fc-event-skin');
			} else if (edateFormated == dateFormated) {
				element.addClass('day_event');
				element.children().removeClass('fc-event-skin');
			} else if (edateFormated > dateFormated) {
				element.addClass('next_event');
				element.children().removeClass('fc-event-skin');
			}
		},
		eventClick: function (event)
		{
			if(event.id) mountListas('escala',event.id);
		}
	});
});
