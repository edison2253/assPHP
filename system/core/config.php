<?php
namespace system\core;
use \system\database\model;

/**
 * 可加载的配置文件
 */
class config{

	//核心公共函数文件路径
	const HELPER_PATH = ASS_PATH . SYSTEM_NAME . '/' . HELPER_NAME . '/';

	//自动载入的内容
	public $autoload;

	//支持自动加载的公共函数
	private $_autoload_func_conf = [
		'url' => 'url.function.php',
	];

	public function __construct() {
		require ASS_PATH . APP_NAME . '/' . CONF_NAME . '/config.php';
		$this->autoload = $autoload;
	}

	//获取orm对象
	public function auto_database($database = false) {
		
		//手动连接数据库
		if ( is_array($database) ) {
			return new \system\database\model($database['localhost'], $database['username'], $database['password'], $database['database']);
		}

		//自动连接数据库
		if ( !is_array($database) && $this->autoload['database']['is_autoload'] === true ) {

			return new \system\database\model($this->autoload['database']['localhost'], $this->autoload['database']['username'], $this->autoload['database']['password'], $this->autoload['database']['database']);
		}

		return false;
	}

	/**
	 * 自动加载公共函数
	 * @return [type] [description]
	 */
	public function auto_func_run() {
		foreach ( $this->autoload['function'] as $v ) {
			if ( isset($this->_autoload_func_conf[$v]) ) {
				require_once self::HELPER_PATH . $this->_autoload_func_conf[$v];
			}
		}
	}
}