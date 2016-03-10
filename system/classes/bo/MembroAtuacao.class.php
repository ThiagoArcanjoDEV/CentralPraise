<?php
/**
* class MembroAtuacao
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class MembroAtuacao extends ID{
	/**
	* class Membro
	*
	* @access private
	* @var object Membro
	*/
	private $Membro;
	/**
	* class Equipe
	*
	* @access private
	* @var object Equipe
	*/
	private $Equipe;
	/**
	* class AArea
	*
	* @access private
	* @var object AArea
	*/
	private $AArea;
	/**
	* `membro_atuacao_ok` TINYINT(1)  NOT NULL DEFAULT true
	* @access private
	* @var boolean
	*/
	private $atuacao_ok;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(is_array($objeto) && !empty($objeto))
		{
			if(isset($objeto["membro_atuacao"]) && !empty($objeto["membro_atuacao"])) $this->setID($objeto["membro_atuacao"]);
			elseif(!empty($objeto["membro_atuacao_id"])) $this->setID($objeto["membro_atuacao_id"]);
			if(!empty($objeto["membro_atuacao_ok"])) $this->setAtuacaoOK($objeto["membro_atuacao_ok"]);
		}
		
		$Membro = new Membro($objeto);
		$this->setMembro($Membro);

		$Equipe = new Equipe($objeto);
		$this->setEquipe($Equipe);

		$AArea = new AArea($objeto);
		$this->setAArea($AArea);
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
	* @param object $AArea
	* @return none
	*/
	public function setAArea(AArea $AArea){
		$this->AArea = $AArea;
	}
	/**
	* @param none
	* @return object AArea
	*/
	public function getAArea(){
		return $this->AArea;
	}
	
	/**
	* @param boolean $atuacao_ok
	* @return none
	*/
	public function setAtuacaoOK($atuacao_ok){
		$this->atuacao_ok = $atuacao_ok;
	}
	/**
	* @param none
	* @return boolean
	*/
	public function getAtuacaoOK(){
		return $this->atuacao_ok;
	}
}
?>
