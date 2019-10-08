<?php
namespace controller\d;
use \system\core\controller;
use \model\UserModel;

class c extends controller{

	public function d() {
		// $result = $this->model()->select('*')->from('test')->where(array('id' => ':id', "name" => ":name"))->bind(array('id' => 1, 'name' => '施文杰'))->result();
		// var_dump($result);
		// $result = $this->db->table('test')->where(array('id' => 3, 'content' => 222))->update(array('name' => 'test3'));
		// var_dump($result);
		
		// $result = $this->db->select('*')->from('user')->groupby('username')->result();
		// var_dump($result);
		
		// $user = new \model\UserModel();
		// $result = $user->getUserList();
		// var_dump($result);
		
		// //选择
		// $arr = [56,456,74,345,74,234,65, 1, 123412];
		// for ($i = 0; $i < count($arr); $i ++) {
		// 	for ($y = $i + 1; $y < count($arr); $y ++) {
		// 		if ($arr[$i] < $arr[$y]) {
		// 			$n = $arr[$i];
		// 			$arr[$i] = $arr[$y];
		// 			$arr[$y] = $n;
		// 		}
		// 	}
		// }
		
		// //冒泡
		// $arr = [123,54,543,23,54,2143];
		// for ($i = 0; $i < count($arr) - 1; $i ++) {
		// 	for ($y = 0; $y < count($arr) - 1 - $i; $y ++) {
		// 		if ($arr[$y] < $arr[$y + 1]) {
		// 			$n = $arr[$y];
		// 			$arr[$y] = $arr[$y + 1];
		// 			$arr[$y + 1] = $n;
		// 		}
		// 	}
		// }

		// var_dump($arr);
	}

	public function test() {

		$this->db->start();
		$result = $this->db->select('*')->from('test')->result();
		$result = $this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		$this->db->insert('test', array('name' => 'ttt1', 'content' => '222', 'datime' => '333'));
		$this->db->commit();
	}
}