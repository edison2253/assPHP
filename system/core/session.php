<?php
namespace system\core;
/**
 * 会话控制
 */
class session {

	private $_isStart = false;

	/**
	 * 手动开启session
	 */
	public function start() {
		$this->_isStart = true;
		session_start();
		return $this;
	}

	/**
	 * 获取session
	 */
	public function __get($name) {
		if ( $this->_isStart ) {
			return $this->$name;
		} else {
			return false;
		}
	}

	/**
	 * 存储session
	 */
	public function __set($name, $value) {
		if ( $this->_isStart ) {
			$_SESSION[$name] = $value;
			$this->$name = $value;
			return $this->$name;	
		}

		return false;
	}

	/**
	 * 销毁session
	 */
	public function destory_session() {
		destory_session();
		return true;
	}

}