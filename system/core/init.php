<?php
namespace system\core;
use system\core\router;
/**
 * 这里主要是让路由跑起来
 *
 */
class init {

	private $router;


	private $_nameArr;

	public function __construct() {
		$this->router = new router();
		$this->_nameArr = $this->_getControllerAndMethod();
	}

	//运行
	public function run() {
		$method = $this->_getMethod();
		$controller = $this->_getController();

		$c = new $controller();
		$c->$method();
	}

	//获取控制器名称
	private function _getController() {
		array_pop($this->_nameArr);
		$_nameArr =  implode( '\\', $this->_nameArr );

		if ( empty( $_nameArr ) ) {
			$_nameArr = '\\' . DEFAULT_CONTROLLER;
		}

		return strtolower('\\' . APP_CONTROLLER_NAME . $_nameArr );
	}

	//获取方法名称
	private function _getMethod() {
		$_nameArr = end($this->_nameArr);

		if ( empty( $_nameArr) ) {
			$_nameArr = DEFAULT_METHOD;
		}

		return strtolower( $_nameArr );
	}

	//取控制器路径和方法名
	private function _getControllerAndMethod() {
		return $this->router->getNameArr();
	}
}