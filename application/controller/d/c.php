<?php
namespace controller\d;
use \system\core\controller;

class c extends controller{

	public function d() {
		$result = $this->model()->select('*')->from('test')->where(array('id' => ':id', "name" => ":name"))->bind(array('id' => 1, 'name' => '施文杰'))->result();
		var_dump($result);
	}

	public function test() {
		$data = [];
		$data['name'] = 'test1';
		$data['content'] = 'content1';
		$data['datime'] = time();
		$this->db->insert('test', $data);
		
	}
}