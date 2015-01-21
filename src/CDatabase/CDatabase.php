<?php
/**
* 
*/
class CDatabase
{
	private $_db;
	function __construct()
	{
		try{
			$this->_db = new PDO('mysql:host=localhost;dbname=books;', 'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
		}
		catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	// Function to select querys
	public function select($query, $param=array()){
		$stmt = $this->_db->prepare($query);
		$stmt->execute($param);
		$result = $stmt->fetchALL(PDO::FETCH_OBJ);
		if ($stmt->rowCount() > 0){
			return $result;
		}
	}

	// Function to update,delete and add querys
	public function change($query, $param=array()){
		$stmt = $this->_db->prepare($query);
		$stmt->execute($param);
		if ($stmt->rowCount() > 0){
			return true;
		}
	}

}