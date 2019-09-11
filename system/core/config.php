<?php
namespace system\core;
/**
 * 可加载的配置文件
 */
class config{

	//核心公共函数文件路径
	const HELPER_PATH = ASS_PATH . SYSTEM_NAME . '/' . HELPER_NAME . '/';

	//支持自动加载的公共函数
	private $_autoload_func_conf = [
		'url' => 'url.function.php',
	];

	public function __construct() {}

	/**
	 * 自动加载公共函数
	 * @return [type] [description]
	 */
	public function auto_func_run($autoload_func) {
		foreach ( $autoload_func as $v ) {
			if ( isset($this->_autoload_func_conf[$v]) ) {
				require_once self::HELPER_PATH . $this->_autoload_func_conf[$v];
			}
		}
	}
}