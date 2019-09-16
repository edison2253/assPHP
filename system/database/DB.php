<?php
namespace system\database;
use system\core\config;

class DB {

	//数据库连接信息
	private $database;

	public function __construct() {
		$config = new \system\core\config;
		$this->database = $config->autoload['database'];
	}
}