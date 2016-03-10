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
class ID{
	/**
	* `id` INT(X) NOT NULL AUTO_INCREMENT ,
	* @access private
	* @var integer
	*/
	private $id;
	
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
}
?>