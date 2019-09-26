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
		if ( substr($this->_PATHINFO, -1) != '/' ) {
			$this->_PATHINFO .= '/';
		}
		return explode('/', $this->_PATHINFO);
	}
}