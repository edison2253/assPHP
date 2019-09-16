<?php
namespace system\core;
use \system\database\model;
use \system\core\config;

class controller {

	//视图文件后缀
	const VIEW_SUFFIX = '.html';

	//公共函数文件后缀
	const FUNC_SUFFIX = '.function.php';

	//获取表单信息
	private $post;

	/**
	 * 实例化模型层
	 * @return string 模型名称
	 */
	public function model($model_name = false) {
		if ( !$model_name ) {
			$config = new \system\core\config();
			$model = new \system\database\model($config->autoload['database']['localhost'], $config->autoload['database']['username'], $config->autoload['database']['password'], $config->autoload['database']['database']);
			return $model;
		}
	}

	public function post($key = false) {
		$post = $this->_encode($_POST);

		if ( $key ) {
			return $post[$key];
		} else {
			return $post;
		}
	}

	public function get($key = false) {
		$get = $this->_encode($_GET);

		if ( $key ) {
			return $get[$key];
		} else {
			return $get;
		}
	}

	/**
	 * 重定向
	 * @param  string $redirectPath 重定向地址
	 */
	public function redirect($redirectPath) {
		strpos($redirectPath, 'http://') ? 
		$url = $redirectPath : 
		$url = APP_HOST . $redirectPath;
		header("Location:{$url}");
	}

	//加载公共函数
	public function helper($funcName) {
		if ( !strpos($funcName, self::FUNC_SUFFIX) ) {
			$funcName .= self::FUNC_SUFFIX;
		}

		$appPath =  ASS_PATH . APP_NAME . '/' . HELPER_NAME . '/' . $funcName;
		$systemPath = ASS_PATH . SYSTEM_NAME . '/' . HELPER_NAME . '/' . $funcName;

		if ( file_exists($appPath) ) {
			require_once $appPath;
			return;
		}

		if ( file_exists($systemPath) ) {
			require_once $systemPath;
			return;
		}
	}

	//加载视图
	public function show($pageName, $var = false) {
		$viewPath =  ASS_PATH . APP_NAME . '/' . APP_VIEWS_NAME . '/';

		strpos($pageName, self::VIEW_SUFFIX) ? 
		$viewPath .= $pageName : 
		$viewPath .= $pageName . self::VIEW_SUFFIX;

		ob_start();

		if ( is_array($var) ) {
			extract($var);
		}

		require_once $viewPath;
		$content = ob_get_clean();
		echo $content;
	}

	//XSS过滤
	private function _encode($param) {
		foreach ($param as &$val) {
			$var = htmlspecialchars($val, ENT_QUOTES);
		}

		return $param;
	}
}