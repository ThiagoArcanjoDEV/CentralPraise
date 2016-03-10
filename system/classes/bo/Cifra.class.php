<?php
/**
* class Cifra
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Cifra extends ID{
	/**
	* VARCHAR(4) NOT NULL
	* @access private
	* @var string
	*/
	private $tom;
	/**
	* TINYINT(1)  NOT NULL DEFAULT false
	* @access private
	* @var boolean
	*/
	private $padrao;
	/**
	* `cifra_texto` TEXT NOT NULL
	* @access private
	* @var string
	*/
	private $texto;
	/**
	* class Musica
	*
	* @access private
	* @var object Musica
	*/
	private $Musica;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
                        if(isset($objeto["cifra"]) && !empty($objeto["cifra"])) $this->setID($objeto["cifra"]);
                        elseif(!empty($objeto["cifra_id"])) $this->setID($objeto["cifra_id"]);
			if(!empty($objeto["cifra_tom"])) $this->setTom($objeto["cifra_tom"]);
			if(!empty($objeto["cifra_padrao"])) $this->setPadrao($objeto["cifra_padrao"]);
			if(!empty($objeto["cifra_texto"])) $this->setTexto($objeto["cifra_texto"]);
		}

		$Musica = new Musica($objeto);
                $this->setMusica($Musica);
	}
	
	/**
	* @param string $tom
	* @return none
	*/
	public function setTom($tom){
		$this->tom = $tom;
	}
	/**
	* @param none
	* @return string
	*/
	public function getTom(){
		return $this->tom;
	}
	
	/**
	* @param boolean $padrao
	* @return none
	*/
	public function setPadrao($padrao){
		$this->padrao = $padrao;
	}
	/**
	* @param none
	* @return boolean
	*/
	public function getPadrao(){
		return $this->padrao;
	}
	
	/**
	* @param string $cifra
	* @return none
	*/
	public function setTexto($texto){
		$this->texto = $texto;
	}
	/**
	* @param none
	* @return string
	*/
	public function getTexto(){
		return $this->texto;
	}
	
	/**
	* @param object $Musica
	* @return none
	*/
	public function setMusica(Musica $Musica){
		$this->Musica = $Musica;
	}
	/**
	* @param none
	* @return object Musica
	*/
	public function getMusica(){
		return $this->Musica;
	}
}
?>
