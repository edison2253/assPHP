<?php
namespace controller;
use \system\core\controller;

class index extends controller{

	public function index() {
		$this->show('test.html', ['username' => '陈']);
		$this->show('test2.html');
	}
	
	public function test() {
		var_dump($this->post('password'));
	}
}