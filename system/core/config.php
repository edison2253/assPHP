<?php
namespace system\core;
use \system\database\model;
use \system\core\session;

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
		'url' => 'url.function.php'
	];

	public function __construct() {
		require ASS_PATH . APP_NAME . '/' . CONF_NAME . '/autoload.php';
		$this->autoload = $autoload;

		require ASS_PATH . APP_NAME . '/' . CONF_NAME . '/config.php';
		$this->config = $config;
	}

	//获取session对象
	public function auto_session() {
		$session = new \system\core\session();
		//如果开启了自动加载
		if ( $this->autoload['session']['is_autoload'] == true) {
			
			return $session->start();
		} else {
			return $session;
		}
	}

	//获取orm对象
	public function auto_database($database = false) {
		//如果没有手动连接参数
		if ( !is_array($database) ) {
			//如果已开启自动连接
			if ( $this->config['database']['is_autoload'] === true ) {
				$database = $this->config['database'];
			} else {
				return false;
			}
		}

		return $this->_getInstance($database);
	}

	/**
	 * 自动加载公共函数
	 * @return [type] [description]
	 */
	public function auto_func_run() {
		foreach ( $this->autoload['function'] as $v ) {
			if ( isset($this->_autoload_func_conf[$v]) ) {
				require_once self::HELPER_PATH . $this->_autoload_func_conf[$v];
			} else {
				require_once ASS_PATH . APP_NAME . '/' . HELPER_NAME . '/' . $v . '.function.php';
			}
		}
	}

	//连接数据库
	public function _getInstance(array $database) {
		return new \system\database\model($database['localhost'], $database['username'], $database['password'], $database['database']);
	}
}