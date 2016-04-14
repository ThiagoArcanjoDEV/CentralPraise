<?php
/**
* class ID
* 
* Classe com o metodo comum a todas as demais classes, getID() and setID().
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
*/
class ID implements JsonSerializable{
	/**
	* `id` INT(X) NOT NULL AUTO_INCREMENT ,
	* @access protected
	* @var integer
	*/
	protected $id;
	
	/**
	* @param integer $id
	* @return none
	*/
	public function setID($id){
		$this->id = (int)$id;
	}
	/**
	* @param none
	* @return integer
	*/
	public function getID(){
		return $this->id;
	}
	
	public function jsonSerialize()
	{
		foreach(get_object_vars($this) AS $var => $value)
		{
			$return[$var] = $value;
		}
		
		return $return;
	}
}
?>
