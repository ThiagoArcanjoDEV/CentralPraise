<?php
function __autoload($className){
	$prefix = '';
	if(file_exists('system/classes/'.$prefix.$className.'.class.php'))
		require_once 'system/classes/'.$prefix.$className.'.class.php';
	elseif(file_exists('system/classes/bo/'.$prefix.$className.'.class.php'))
		require_once 'system/classes/bo/'.$prefix.$className.'.class.php';
	elseif(file_exists('system/classes/dao/'.$prefix.$className.'.class.php'))
		require_once 'system/classes/dao/'.$prefix.$className.'.class.php';
	elseif(file_exists('system/classes/apoio/'.$prefix.$className.'.class.php'))
		require_once 'system/classes/apoio/'.$prefix.$className.'.class.php';
	else
		exit('O arquivo '.$prefix.$className.' não foi encontrado');
}
?>