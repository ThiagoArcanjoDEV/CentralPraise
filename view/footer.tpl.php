<?php if ($_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'choose'): ?>	
		<div id="footer" class="hidden-print">
			<!--  Copyright Line -->
			<div class="copy">
				<p>&copy; copyright | <tag{APP_NAME}> | 2013 | All Rights Reserved.</p>
			</div>
			<!--  End Copyright Line -->
		</div>
		<!-- // Footer END -->
	</div>
	<!-- // Main Container Fluid END -->
<?php endif; ?>

	<!-- JQuery -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/jquery.min.js"></script>
	
<?php if ($_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'choose'): ?>
	<!-- JQueryUI -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/jquery-ui/js/jquery-ui-1.9.2.custom.min.js"></script>
	
	<!-- JQueryUI Touch Punch -->
	<!-- small hack that enables the use of touch events on sites using the jQuery UI user interface library -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
	
<?php endif; ?>	
	<!-- Modernizr -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/modernizr.js"></script>
	
	<!-- Bootstrap -->
	<script src="<tag{PAGES_THEME}>/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- SlimScroll Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/jquery-slimScroll/jquery.slimscroll.min.js"></script>
	
	<!-- Common Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/common.js?<?php echo time(0); ?>"></script>
	
	<!-- Holder Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/holder/holder.js"></script>
	
	<!-- Uniform Forms Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/pixelmatrix-uniform/jquery.uniform.min.js"></script>
	
	<!-- Jquery Mask Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/jquery-mask/jquery.mask.js"></script>
	
	<!-- DateTimePicker Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

<?php if ($_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'choose'): ?>
	<!-- Global -->
	<script>
	var basePath = '<tag{PAGES_THEME}>/';
	</script>
	
	<!-- Bootstrap Extended -->
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-select/bootstrap-select.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/jasny-bootstrap/js/jasny-bootstrap.min.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/jasny-bootstrap/js/bootstrap-fileupload.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootbox.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-wysihtml5/js/wysihtml5-0.3.0_rc2.min.js"></script>
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/bootstrap-wysihtml5/js/bootstrap-wysihtml5-0.0.2.js"></script>
	
	<!-- Google Code Prettify -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/google-code-prettify/prettify.js"></script>
	
	<!-- Gritter Notifications Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/notifications/Gritter/js/jquery.gritter.min.js"></script>
	
	<!-- Notyfy Notifications Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/notifications/notyfy/jquery.notyfy.js"></script>
	
	<!-- MiniColors Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/color/jquery-miniColors/jquery.miniColors.js"></script>

	<!-- Cookie Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/system/jquery.cookie.js"></script>
	
	<!-- Colors -->
	<script>
	var primaryColor = '<?php echo primaryColor; ?>',
		dangerColor = '<?php echo dangerColor; ?>',
		successColor = '<?php echo successColor; ?>',
		warningColor = '<?php echo warningColor; ?>',
		inverseColor = '<?php echo inverseColor; ?>';
	</script>
	
	<!-- Themer -->
	<script>
	var themerPrimaryColor = primaryColor;
	</script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/themer.js"></script>
	
	<!-- Easy-pie Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/easy-pie/jquery.easy-pie-chart.js"></script>
	
	<!-- Sparkline Charts Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/sparkline/jquery.sparkline.min.js"></script>
	
	<!-- Ba-Resize Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/jquery.ba-resize.js"></script>
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'choose'): ?>
	<!-- Choose Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/choose.js?<?php echo time(0); ?>"></script>
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'index'): ?>
	<!-- Dashboard Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/index.js?<?php echo time(0); ?>"></script>
	
<?php endif; ?>
<?php if (GUIDED_TOUR && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'documentation' && $_SESSION["PAGE"] != 'tour' && $_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'choose'): ?>	
	<!-- Pageguide Plugin -->
	<!--[if gt IE 8]><!--><script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/pageguide/js/pageguide.js"></script><!--<![endif]-->
	
	<!-- Guided Tour Demo Script -->
	<!--[if gt IE 8]><!--><script src="<tag{PAGES_THEME}>/theme/scripts/demo/guidedtour.js"></script><!--<![endif]-->
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'tour'): ?>	
	<!-- Pageguide Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/pageguide/js/pageguide.js"></script>
	
	<!-- Tour Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/tour_demo.js"></script>
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'widgets'): ?>
	<!-- Widgets Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/widgets.js?<?php echo time(0); ?>"></script>

<?php endif; ?>	
<?php if ($_SESSION["PAGE"] == 'form_validator'): ?>
	<!-- jQuery Validate Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/jquery-validation/dist/jquery.validate.min.js"></script>
	
	<!-- Form Validator Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/form_validator.js"></script>

<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'form_elements'): ?>
	<!-- ColorPicker -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/color/farbtastic/farbtastic.js"></script>
	
	<!-- Select2 Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/forms/select2/select2.js"></script>
	
	<!-- Form Elements Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/form_elements.js"></script>

<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'index' || $_SESSION["PAGE"] == 'finances' || $_SESSION["PAGE"] == 'charts'): ?>
	<!--  Flot Charts Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.pie.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.tooltip.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.selection.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.resize.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/charts/flot/jquery.flot.orderBars.js"></script>
	
	<!-- Charts Helper Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/charts.helper.js?<?php echo time(0); ?>"></script>
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'charts'): ?>
	<!-- Charts Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/charts.js?<?php echo time(0); ?>"></script>
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'finances'): ?>
	<!-- Finances Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/finances.js?<?php echo time(0); ?>"></script>
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'home' || $_SESSION["PAGE"] == ''): ?>
	<!-- Calendar Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/calendars/fullcalendar/fullcalendar/fullcalendar.js"></script>
	
	<!-- Calendar Page Demo Script -->
	<script type="text/javascript" src="<tag{PAGES_TPL}>/js/calendar.js"></script>

<?php endif; ?>	
<?php if ($_SESSION["PAGE"] == 'tables'): ?>	
	<!-- DataTables Tables Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/tables/DataTables/media/js/jquery.dataTables.min.js"></script>
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/tables/DataTables/media/js/DT_bootstrap.js"></script>
	
	<!-- Tables Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/tables.js"></script>

<?php endif; ?>
<?php if (MENU_RESIZABLE && $_SESSION["PAGE"] != 'blank' && $_SESSION["PAGE"] != 'error' && $_SESSION["PAGE"] != 'login' && $_SESSION["PAGE"] != 'signup' && $_SESSION["PAGE"] != 'choose'): ?>
	<!-- Optional Resizable Sidebars -->
	<!--[if gt IE 8]><!--><script src="<tag{PAGES_THEME}>/theme/scripts/demo/resizable.js?<?php echo time(0); ?>"></script><!--<![endif]-->
	
<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'form_wizards'): ?>
	<!-- Bootstrap Form Wizard Plugin -->
	<script src="<tag{PAGES_THEME}>/bootstrap/extend/twitter-bootstrap-wizard/jquery.bootstrap.wizard.js"></script>
	
	<!-- Form Wizards Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/form_wizards.js"></script>

<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'modals'): ?>
	<!-- Modals Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/modals.js"></script>

<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'notifications'): ?>
	<!-- Notifications Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/notifications.js"></script>

<?php endif; ?>
<?php if ($_SESSION["PAGE"] == 'sliders'): ?>
	<!-- jQuery Mousewheel Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/other/jquery-mousewheel/jquery.mousewheel.min.js"></script>

	<!-- jQRangeSlider Plugin -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/plugins/sliders/jQRangeSlider/jQAllRangeSliders-withRuler-min.js"></script>
	
	<!-- Sliders Page Demo Script -->
	<script src="<tag{PAGES_THEME}>/theme/scripts/demo/sliders.js"></script>

<?php endif; ?>

	<!-- My Scripts-->
	<script type="text/javascript" src="<tag{PAGES_TPL}>/js/script.js"></script>
</body>
</html>
