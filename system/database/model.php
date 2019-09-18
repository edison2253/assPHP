<?php
namespace system\database;

class model {

	//数据库连接
	protected $db;
	//预处理对象
	protected $smt;

	//查询条件
	private $where;
	//sql语句
	private $sql;

	//参数绑定传值
	private $_isbind = false;

	public function __construct($localhost, $username, $password, $database) {
		try {
			$this->db = new \PDO("mysql:host=localhost;dbname=$database", $username, $password);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	//输出结果
	public function result() {
		if ( is_array($this->where) ) {
			$i = 0;
			foreach ($this->where as $k => $v) {
				$i ++;
				if ($i == 1) {
					//参数绑定时，参数值不能是字符串
					$this->_isbind ? 
					$this->sql .= $k . ' = ' . $v : 
					$this->sql .= $k . ' = ' . "'" . $v . "'";
				} else {
					$this->_isbind ?
					$this->sql .= ' AND ' . $k . ' = ' . $v : 
					$this->sql .= ' AND ' . $k . ' = ' . "'" . $v . "'";
				}
			}
		}

		$this->smt = $this->db->prepare($this->sql);

		if ( $this->_isbind ) {
			foreach ($this->_isbind as $k => $v) {
				$this->smt->bindValue(":" . $k, $v);
			}
		}

		$this->smt->execute();
		//如果存在错误
		$error = $this->smt->errorInfo();
		if ($error[1]) {
			die($error[2]);
		}
		return $this->smt->fetchAll();
	}

	//参数绑定
	public function bind($bind) {
		$this->_isbind = $bind;
		return $this;
	}

	//where拼接
	public function where($where) {
		$this->sql .= ' WHERE ';

		if ( is_array($where) ) {
			$this->where = $where;
			return $this;
		}

		if ( is_string($where) ) {
			$this->sql .= $where;
		}

		return $this;
	}

	//添加
	public function insert(string $table, array $insert){
		echo $table;
	}

	//删除
	public function delete(){}

	//更新
	public function update(){}

	//查询列
	public function select($field) {
		$this->sql = "SELECT " . $field;
		return $this;
	}

	//查询表
	public function from($table) {
		$this->sql .= ' FROM ' . $table;
		return $this;
	}
}