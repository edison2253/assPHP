<?php
//模型层继承的模型基类
namespace system\core;
use \system\core\config;

class model {
	//配置类
	public $config;

	//orm操作对象
	public $db = false;

	public function __construct() {
		$this->config = new \system\core\config();

		//获取db操作对象
		$this->db = $this->config->auto_database();
	}
}