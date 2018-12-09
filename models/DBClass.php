<?php
class DB {
	private $table;
	private $db;
	private $where;
	private $data;
	public function __construct($table)
	{
		try {
			define('DB_DATABESE', 'mvc_lessons');
			define('DB_USERNAME', 'root');
			define('DB_PASSWORD', 'Framgia@123');
			define('PDO_DSN', 'mysql:dbhost=localhost;dbname=' . DB_DATABESE);
			$this->db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->table = $table;
			Data::$db =& $this->db;
			Data::$table =& $this->table;
		} catch(PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
	public function findAll()
	{
		$stmt = $this->db->prepare("select * from {$this->table}");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, "Data");
		return $data;
	}
	public function findId($id)
	{	
		$stmt = $this->db->prepare("select * from {$this->table} where id = :id");
		$stmt->execute([':id' => $id]);
		$data = $stmt->fetchAll(PDO::FETCH_CLASS, "Data")[0]; // Should I use foreach?
		$data->where(['id' => $id]);
		return $data;
	}
	public function create($data)
	{	
		list ($clmns,$vals) = $this->setParams($data);
		$stmt = $this->db->prepare("insert into {$this->table} ({$clmns}) values ({$vals})");
		$stmt->execute();
	}
	public function setParams($ary)
	{
		$keys = array_keys($ary); // extract keys of array.
		$mx = count($keys);
		$clmns = "";
		$vals = "";
		$i = 0;
		foreach($keys as $key) {
			$i++;
			$clmns .= ($i > $mx-1) ? "$key" : "$key, ";
			if(gettype($ary[$key]) === 'integer'){
				$vals .= ($i > $mx-1) ? "$ary[$key]" : "$ary[$key], ";
			}else{
				$vals .= ($i > $mx-1) ? "'$ary[$key]'" : "'$ary[$key]', ";
			}
		}
		return array($clmns, $vals);
	}
}

class Data {
	public static $db;
	public static $table;
	public static $where;
	public function sayname()
	{
		echo $this->name;
	}
	public function save()
	{	
		$table = self::$table;
		$params = $this->setParams($this);
		echo $params;
		$condition = self::$where;
		$stmt = self::$db->prepare("update {$table} set {$params} where {$condition}");
		$stmt->execute();
	}
	public function delete()
	{
		$table = self::$table;
		$condition = self::$where;
		$stmt = self::$db->prepare("delete from {$table} where {$condition}");
		$stmt->execute();
	}
	public function setParams($obj)
	{
		$keys = array_keys(get_object_vars($obj)); // extract keys of object.
		$mx = count($keys);
		$params = "";
		$i = 0;
		foreach($keys as $key) {
			$i++;
			if(gettype($this->$key) === "integer"){
				$params .= ($i > $mx-1) ? "$key= {$this->$key}" : "$key= {$this->$key},";
			}else{
				$params .= ($i > $mx-1) ? "$key= '{$this->$key}'" : "$key= '{$this->$key}',";
			}
		}
		$i = 0;
		return $params;
	}
	public function where($ary)
	{
		$keys = array_keys($ary); // extract keys of array.
		foreach($keys as $key) {
			$condition = "$key = '$ary[$key]'";
		}
		self::$where = $condition;
	}
}
?>