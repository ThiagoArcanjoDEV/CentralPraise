<?php
class SQL{
	public $link = null;
	public $selectDB = null;
	public $query = null;
	
	public function startConnection(){
		$this->link = mysql_connect(HOST,USER,PASS);
		if($this->link){
			$this->selectDB = mysql_select_db(DATABASE,$this->link);
		}
	}
	
	public function closeConnection(){
		mysql_close($this->link);
	}
	
	public function query($cmd){
		$this->startConnection();
		$this->query = mysql_query($cmd) or die(mysql_error());
		if($this->query){
			return $this->query;
		}
		else{
			return false;
		}
		$this->closeConnetion();

		return true;
	}
	public function numRows(){
		return mysql_num_rows($this->query);
	}
	public function fetchArray(){
		return mysql_fetch_array($this->query);
	}
	public function fetchRow(){
		return mysql_fetch_row($this->query);
	}
	public function fetchAssoc(){
		return mysql_fetch_assoc($this->query);
	}
	public function getLastID(){
		return mysql_insert_id();
	}
}
?>