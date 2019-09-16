<?php
namespace controller\d;
use \system\core\controller;

class c extends controller{

	public function d() {
		$result = $this->model()->select('*')->from('test')->where(array('id' => ':id', "name" => ":name"))->bind(array('id' => 1, 'name' => '施文杰'))->result();

		var_dump($result);
	}
}