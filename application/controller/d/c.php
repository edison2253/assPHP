<?php
namespace controller\d;
use \system\core\controller;
use \model\UserModel;

class c extends controller{

	public function d() {

		var_dump($this->salt('123'));
	}

	public function test() {

		$this->db->start();
		$result = $this->db->select('*')->from('test')->result();
		$result = $this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		$this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		$this->db->commit();
	}
}