<?php
/**
* class Agenda
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Agenda extends ID{
	/**
	* `agenda_data` DATETIME NOT NULL
	* @access private
	* @var string
	*/
	private $data;
	/**
	* `agenda_nome` VARCHAR(100) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* `agenda_obs` TEXT NULL
	* @access private
	* @var string
	*/
	private $obs;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = "")
	{
		if(is_array($objeto) && !empty($objeto))
		{
			if(isset($objeto["agenda"]) && !empty($objeto["agenda"])) $this->setID($objeto["agenda"]);
			elseif(!empty($objeto["agenda_id"])) $this->setID($objeto["agenda_id"]);
			if(!empty($objeto["agenda_data"])) $this->setData($objeto["agenda_data"]);
			if(!empty($objeto["agenda_nome"])) $this->setNome($objeto["agenda_nome"]);
			if(!empty($objeto["agenda_obs"])) $this->setObs($objeto["agenda_obs"]);
		}
	}
	
	/**
	* @param string $autor
	* @return none
	*/
	public function setData($data){
		$this->data = $data;
	}
	/**
	* @param none
	* @return string
	*/
	public function getData($format = ''){
		return dataFormat::format($this->data,$format);
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
	* @param string $obs
	* @return none
	*/
	public function setObs($obs){
		$this->obs = $obs;
	}
	/**
	* @param none
	* @return string
	*/
	public function getObs(){
		return $this->obs;
	}
}
?>
