<?php
namespace model;
use system\core\model;
class DemoModel extends model{

	/**
	 * 查找
	 * @param  array or string $where 查询条件
	 * @param  string $field 查询列
	 * @return $result
	 */
	public function getDemoList($where = false, $field = '*') {
		if ($where) {
			return $this->db->select($field)->from('demo')->where($where)->result();
		} else {
			return $this->db->select('*')->from('demo')->result();
		}
	}

	/**
	 * 插入行
	 * @param array $add 插入内容
	 */
	public function addDemo($add) {
		return $this->db->table('demo')->insert($add);
	}

	/**
	 * 更新行
	 * @param  array  $update 更新内容
	 * @param  array $where  更新条件
	 */
	public function updateDemo($update, $where = false) {
		if ($where) {
			return $this->db->table('demo')->where($where)->update($update);
		} else {
			return $this->db->table('demo')->update($update);
		}
	}

	/**
	 * 删除行
	 * @param  array $where 删除条件
	 */
	public function deleteDemo($where) {
		return $this->db->table('demo')->where($where)->delete();
	}
}