<?php
/**
* class Musica
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Musica extends ID{
	/**
	* `musica_autor` VARCHAR(50) NULL
	* @access private
	* @var string
	*/
	private $autor;
	/**
	* `musica_nome` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* `musica_letra` TEXT NOT NULL
	* @access private
	* @var string
	*/
	private $letra;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
                        if(isset($objeto["musica"]) && !empty($objeto["musica"])) $this->setID($objeto["musica"]);
                        elseif(!empty($objeto["musica_id"])) $this->setID($objeto["musica_id"]);
			if(!empty($objeto["musica_autor"])) $this->setAutor($objeto["musica_autor"]);
			if(!empty($objeto["musica_nome"])) $this->setNome($objeto["musica_nome"]);
			if(!empty($objeto["musica_letra"])) $this->setLetra($objeto["musica_letra"]);
		}
	}
	
	/**
	* @param string $autor
	* @return none
	*/
	public function setAutor($autor){
		$this->autor = $autor;
	}
	/**
	* @param none
	* @return string
	*/
	public function getAutor(){
		return $this->autor;
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
	* @param string $letra
	* @return none
	*/
	public function setLetra($letra){
		$this->letra = $letra;
	}
	/**
	* @param none
	* @return string
	*/
	public function getLetra(){
		return $this->letra;
	}
}
?>
