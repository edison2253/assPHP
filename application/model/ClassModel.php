<?php
namespace model;
use system\core\model;
class ClassModel extends model{

	/**
	 * 查找
	 * @param  array or string $where 查询条件
	 * @param  string $field 查询列
	 * @return $result
	 */
	public function getClassList($where = false, $field = '*') {
		if ($where) {
			return $this->db->select($field)->from('class')->where($where)->result();
		} else {
			return $this->db->select('*')->from('class')->result();
		}
	}

	/**
	 * 插入行
	 * @param array $add 插入内容
	 */
	public function addClass($add) {
		return $this->db->table('class')->insert($add);
	}

	/**
	 * 更新行
	 * @param  array  $update 更新内容
	 * @param  array $where  更新条件
	 */
	public function updateClass($update, $where = false) {
		if ($where) {
			return $this->db->table('class')->where($where)->update($update);
		} else {
			return $this->db->table('class')->update($update);
		}
	}

	/**
	 * 删除行
	 * @param  array $where 删除条件
	 */
	public function deleteClass($where) {
		return $this->db->table('class')->where($where)->delete();
	}
}