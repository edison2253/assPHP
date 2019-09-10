<?php
spl_autoload_register(function($class) {

	$vendor = ASS_PATH . str_replace('\\', '/', $class . '.php');

	if ( file_exists($vendor) ) {
		require_once($vendor);
	}
});


$class = new \system\core\init();