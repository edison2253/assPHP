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
//项目名称
define('ASS_NAME', 'AssPHP');

//控制器名称
define('APP_CONTROLLER_NAME', 'controller');

//项目文件目录名称
define('APP_NAME', 'application');

//核心文件目录名称
define('SYSTEM_NAME', 'system');

//默认控制器名称
define('DEFAULT_CONTROLLER', 'index');

//默认方法名称
define('DEFAULT_METHOD', 'index');

//根目录路径
define('ASS_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . ASS_NAME . '/');
/*****************************/

//引入初始化文件
require_once ASS_PATH . SYSTEM_NAME . '/ass.php';