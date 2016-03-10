<?php
/**
* class Membro
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Membro extends ID{
	/**
	* `membro_nome` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* `membro_tag` VARCHAR(3) NOT NULL
	* @access private
	* @var string
	*/
	private $tag;
	/**
	* `membro_tel` VARCHAR(14) NULL
	* @access private
	* @var string
	*/
	private $tel;
	/**
	* `membro_cel` VARCHAR(14) NULL
	* @access private
	* @var string
	*/
	private $cel;
	/**
	* `membro_email` VARCHAR(100) NOT NULL
	* @access private
	* @var string
	*/
	private $email;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
			if(isset($objeto["membro"]) && !empty($objeto["membro"])) $this->setID($objeto["membro"]);
			elseif(!empty($objeto["membro_id"])) $this->setID($objeto["membro_id"]);
			if(!empty($objeto["membro_nome"])) $this->setNome($objeto["membro_nome"]);
			if(!empty($objeto["membro_tag"])) $this->setTag($objeto["membro_tag"]);
			if(!empty($objeto["membro_tel"])) $this->setTel($objeto["membro_tel"]);
			if(!empty($objeto["membro_cel"])) $this->setCel($objeto["membro_cel"]);
			if(!empty($objeto["membro_email"])) $this->setEmail($objeto["membro_email"]);
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
	* @param string $tag
	* @return none
	*/
	public function setTag($tag){
		$this->tag = $tag;
	}
	/**
	* @param none
	* @return string
	*/
	public function getTag(){
		return $this->tag;
	}
	
	/**
	* @param string $tel
	* @return none
	*/
	public function setTel($tel){
		$this->tel = $tel;
	}
	/**
	* @param none
	* @return string
	*/
	public function getTel(){
		return $this->tel;
	}
	
	/**
	* @param string $cel
	* @return none
	*/
	public function setCel($cel){
		$this->cel = $cel;
	}
	/**
	* @param none
	* @return string
	*/
	public function getCel(){
		return $this->cel;
	}
	
	/**
	* @param string $email
	* @return none
	*/
	public function setEmail($email){
		$this->email = $email;
	}
	/**
	* @param none
	* @return string
	*/
	public function getEmail(){
		return $this->email;
	}
}
?>
