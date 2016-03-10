<?php
/**
* class Noticia
* 
* @author 	Thiago Arcanjo
*
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Noticia extends ID{
	/**
	* `noticia_data` DATETIME NOT NULL
	* @access private
	* @var string
	*/
	private $noticia_data;
	/**
	* `noticia_desc` VARCHAR(150) NOT NULL
	* @access private
	* @var string
	*/
	private $desc;
	/**
	* `noticia_texto` TEXT NULL
	* @access private
	* @var string
	*/
	private $texto;
	/**
	* class Membro
	*
	* @access private
	* @var object Membro
	*/
	private $Membro;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto)){
			if(!empty($objeto["noticia_id"])) $this->setID($objeto["noticia_id"]);
			if(!empty($objeto["noticia_data"])) $this->setData($objeto["noticia_data"]);
			if(!empty($objeto["noticia_desc"])) $this->setDesc($objeto["noticia_desc"]);
			if(!empty($objeto["noticia_texto"])) $this->setTexto($objeto["noticia_texto"]);
		}
		
		$Membro = new Membro($objeto);
                $this->setMembro($Membro);
	}
	
	/**
	* @param string $data
	* @return none
	*/
	public function setData($noticia_data){
		$this->noticia_data = $noticia_data;
	}
	/**
	* @param none
	* @return string
	*/
	public function getData($format = "",$id = ""){
		if($format){
			if(is_array($this->noticia_data)) return dataFormat::format($this->noticia_data[$id],$format);
			else return dataFormat::format($this->noticia_data,$format);
		}
		else return $this->noticia_data;
	}
	
	/**
	* @param string $desc
	* @return none
	*/
	public function setDesc($desc){
		$this->desc = $desc;
	}
	/**
	* @param none
	* @return string
	*/
	public function getDesc(){
		return $this->desc;
	}
	
	/**
	* @param string $texto
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
	* @param object $Membro
	* @return none
	*/
	public function setMembro(Membro $Membro){
		$this->Membro = $Membro;
	}
	/**
	* @param none
	* @return object Membro
	*/
	public function getMembro(){
		return $this->Membro;
	}
}
?>
