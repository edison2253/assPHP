<?php

//自动载入的公共函数
$autoload['function'] = ['url'];

//数据库配置
$autoload['database'] = [
	'is_autoload' => true, //自动连接
	'localhost' => '127.0.0.1', //数据库地址
	'username' => 'root', //用户名
	'password' => 'root', //密码
	'database' => 'test', //数据库
];

$autoload['session'] = [
	'is_autoload' => true,
];