<?php
namespace system\core;
use system\core\router;
use system\core\config;
/**
 * 这里主要处理框架运行前的一些事务
 */
class init {
	//路由对象
	private $router;

	//对应路径
	private $_nameArr;

	public function __construct() {
		$this->router = new router();
		$this->_nameArr = $this->_getControllerAndMethod();
	}

	//运行
	public function run() {
		//自动加载公共函数
		$this->conf_func();

		//加载控制器
		$method = $this->_getMethod();
		$controller = $this->_getController();
		$c = new $controller();
		$c->$method();
	}

	//加载公共函数配置项
	public function conf_func() {
		$config = new \system\core\config();
		$config->auto_func_run();
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

		if ( empty( $_nameArr ) ) {
			$_nameArr = DEFAULT_METHOD;
		}

		return strtolower( $_nameArr );
	}

	//取控制器路径和方法名
	private function _getControllerAndMethod() {
		return $this->router->getNameArr();
	}
}