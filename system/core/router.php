<?php
namespace system\core;
/**
 * 这里处理框架路由
 */
class router {
	private $_PATHINFO;

	public function __construct() {
		$this->_PATHINFO = $_SERVER['PATH_INFO'];
	}

	//获取路径定位
	public function getNameArr() {
		return explode('/', $this->_PATHINFO);
	}
}