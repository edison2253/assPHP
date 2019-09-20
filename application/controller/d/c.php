<?php
namespace controller\d;
use \system\core\controller;

class c extends controller{

	public function d() {
		// $result = $this->model()->select('*')->from('test')->where(array('id' => ':id', "name" => ":name"))->bind(array('id' => 1, 'name' => '施文杰'))->result();
		// var_dump($result);
		$result = $this->db->table('test')->where(array('id' => 2, 'content' => 222))->delete();
		var_dump($result);
	}

	public function test() {

		$this->db->start();
		$result = $this->db->select('*')->from('test')->result();
		$result = $this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		$this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		
		$this->db->commit();
	}
}