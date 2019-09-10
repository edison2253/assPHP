<?php

//检测版本号
switch (version_compare(PHP_VERSION, '7.2')) {
	case '-1':
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'PHP版本不能低于7.2';
		exit(1); // EXIT_ERROR
	break;
}


/**************路径************/
//根目录路径
define('ASS_PATH', $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']);
/*****************************/

//引入初始化文件
require_once ASS_PATH . 'system/ass.php';



// spl_autoload_register(function ($classname) {

// 	$vendor_map = [
// 		'core' => 

// 	];
	
// });


// $obj = new \core\init();