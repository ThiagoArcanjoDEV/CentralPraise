<?php
/**
* class Escala
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Escala extends ID implements JsonSerializable{
	/**
	* `escala_obs` TEXT NULL
	* @access private
	* @var string
	*/
	private $obs;
	/**
	* class Equipe
	*
	* @access private
	* @var object Equipe
	*/
	private $Equipe;
	/**
	* class Agenda
	*
	* @access private
	* @var object Agenda
	*/
	private $Agenda;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = "")
	{
		if(is_array($objeto) && !empty($objeto))
		{
			if(isset($objeto["escala"]) && !empty($objeto["escala"])) $this->setID($objeto["escala"]);
			elseif(!empty($objeto["escala_id"])) $this->setID($objeto["escala_id"]);
			if(!empty($objeto["escala_obs"])) $this->setObs($objeto["escala_obs"]);
		}
		
                $Equipe = new Equipe($objeto);
                $this->setEquipe($Equipe);
		
                $Agenda = new Agenda($objeto);
                $this->setAgenda($Agenda);
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
	
	/**
	* @param object $Equipe
	* @return none
	*/
	public function setEquipe(Equipe $Equipe){
		$this->Equipe = $Equipe;
	}
	/**
	* @param none
	* @return object Equipe
	*/
	public function getEquipe(){
		return $this->Equipe;
	}
	
	/**
	* @param object $Agenda
	* @return none
	*/
	public function setAgenda(Agenda $Agenda){
		$this->Agenda = $Agenda;
	}
	/**
	* @param none
	* @return object Agenda
	*/
	public function getAgenda(){
		return $this->Agenda;
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
