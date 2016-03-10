<?php
/**
* class AArea
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class AArea extends ID{
	/**
	* `area_nome` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* `area_icon` VARCHAR(50) NULL DEFAULT 'none'
	* @access private
	* @var string
	*/
	private $icon;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
			if(isset($objeto["area"]) && !empty($objeto["area"])) $this->setID($objeto["area"]);
			elseif(!empty($objeto["area_id"])) $this->setID($objeto["area_id"]);
			if(!empty($objeto["area_nome"])) $this->setNome($objeto["area_nome"]);
			if(!empty($objeto["area_icon"])) $this->setIcon($objeto["area_icon"]);
		}
	}
	
	/**
	* @param string $nome
	* @return none
	*/
	public function setNome($nome){
		$this->nome = $nome;
	}
	/**
	* @param none
	* @return string
	*/
	public function getNome(){
		return $this->nome;
	}
	
	/**
	* @param string $icon
	* @return none
	*/
	public function setIcon($icon){
		$this->icon = $icon;
	}
	/**
	* @param none
	* @return string
	*/
	public function getIcon(){
		return $this->icon;
	}
}
?>
