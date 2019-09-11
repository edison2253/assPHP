<?php

//自动载入
spl_autoload_register(function($class) {

	explode('\\', $class)[0] == SYSTEM_NAME ? 
	$vendor = ASS_PATH . str_replace('\\', '/', $class . '.php') : 
	$vendor = ASS_PATH . APP_NAME . '/' . str_replace('\\', '/', $class . '.php');

	if ( file_exists( $vendor ) ) {
		require_once($vendor);
	}
});

//让一切跑起来
$r = new \system\core\init();
$r->run();