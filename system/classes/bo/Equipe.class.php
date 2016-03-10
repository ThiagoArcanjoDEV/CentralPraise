<?php
/**
* class Equipe
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Equipe extends ID{
	/**
	* `equipe_nome` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* class Igreja
	*
	* @access private
	* @var object Igreja
	*/
	private $Igreja;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
			if(isset($objeto["equipe"]) && !empty($objeto["equipe"])) $this->setID($objeto["equipe"]);
			elseif(!empty($objeto["equipe_id"])) $this->setID($objeto["equipe_id"]);
			if(!empty($objeto["equipe_nome"])) $this->setNome($objeto["equipe_nome"]);
		}
		
		$Igreja = new Igreja($objeto);
		$this->setIgreja($Igreja);
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
	* @param object $Igreja
	* @return none
	*/
	public function setIgreja(Igreja $Igreja){
		$this->Igreja = $Igreja;
	}
	/**
	* @param none
	* @return object Igreja
	*/
	public function getIgreja(){
		return $this->Igreja;
	}
}
?>
