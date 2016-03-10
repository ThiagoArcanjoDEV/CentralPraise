<?php
/**
* class Acesso
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Acesso extends ID{
	/**
	* `acesso_login` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $login;
	/**
	* `acesso_senha` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $senha;
	/**
	* `acesso_igreja` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_igreja;
	/**
	* `acesso_area` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_area;
	/**
	* `acesso_membro` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_membro;
	/**
	* `acesso_equipe` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_equipe;
	/**
	* `acesso_musica` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_musica;
	/**
	* `acesso_escala` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso_escala;
	/**
	* `acesso_acesso` ENUM('read','write') NOT NULL DEFAULT 'read' 
	* @access private
	* @var string
	*/
	private $acesso;
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
			if(isset($objeto["acesso"]) && !empty($objeto["acesso"])) $this->setID($objeto["acesso"]);
			elseif(!empty($objeto["acesso_id"])) $this->setID($objeto["acesso_id"]);
			if(!empty($objeto["acesso_login"])) $this->setLogin($objeto["acesso_login"]);
			if(!empty($objeto["acesso_senha"])) $this->setSenha($objeto["acesso_senha"]);
			if(!empty($objeto["acesso_igreja"])) $this->setAcessoIgreja($objeto["acesso_igreja"]);
			if(!empty($objeto["acesso_area"])) $this->setAcessoArea($objeto["acesso_area"]);
			if(!empty($objeto["acesso_membro"])) $this->setAcessoMembro($objeto["acesso_membro"]);
			if(!empty($objeto["acesso_equipe"])) $this->setAcessoEquipe($objeto["acesso_equipe"]);
			if(!empty($objeto["acesso_musica"])) $this->setAcessoMusica($objeto["acesso_musica"]);
			if(!empty($objeto["acesso_escala"])) $this->setAcessoEscala($objeto["acesso_escala"]);
			if(!empty($objeto["acesso_acesso"])) $this->setAcessoAcesso($objeto["acesso_acesso"]);
		}
		
                $Membro = new Membro($objeto);
                $this->setMembro($Membro);
	}
	
	/**
	* @param string $login
	* @return none
	*/
	public function setLogin($login){
		$this->login = $login;
	}
	/**
	* @param none
	* @return string
	*/
	public function getLogin(){
		return $this->login;
	}
	
	/**
	* @param string $senha
	* @return none
	*/
	public function setSenha($senha){
		$this->senha = $senha;
	}
	/**
	* @param none
	* @return string
	*/
	public function getSenha(){
		if(empty($this->senha)) return AcessoDAO::getPassword($this);
		else return $this->senha;
	}
	
	/**
	* @param string $acesso_igreja
	* @return none
	*/
	public function setAcessoIgreja($acesso_igreja){
		$this->acesso_igreja = $this->checkPermissao($acesso_igreja);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoIgreja(){
		return $this->acesso_igreja;
	}
	
	/**
	* @param string $acesso_area
	* @return none
	*/
	public function setAcessoArea($acesso_area){
		$this->acesso_area = $this->checkPermissao($acesso_area);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoArea(){
		return $this->acesso_area;
	}
	
	/**
	* @param string $acesso_membro
	* @return none
	*/
	public function setAcessoMembro($acesso_membro){
		$this->acesso_membro = $this->checkPermissao($acesso_membro);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoMembro(){
		return $this->acesso_membro;
	}
	
	/**
	* @param string $acesso_equipe
	* @return none
	*/
	public function setAcessoEquipe($acesso_equipe){
		$this->acesso_equipe = $this->checkPermissao($acesso_equipe);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoEquipe(){
		return $this->acesso_equipe;
	}
	
	/**
	* @param string $acesso_musica
	* @return none
	*/
	public function setAcessoMusica($acesso_musica){
		$this->acesso_musica = $this->checkPermissao($acesso_musica);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoMusica(){
		return $this->acesso_musica;
	}
	
	/**
	* @param string $acesso_escala
	* @return none
	*/
	public function setAcessoEscala($acesso_escala){
		$this->acesso_escala = $this->checkPermissao($acesso_escala);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoEscala(){
		return $this->acesso_escala;
	}
	
	/**
	* @param string $acesso
	* @return none
	*/
	public function setAcessoAcesso($acesso){
		$this->acesso = $this->checkPermissao($acesso);
	}
	/**
	* @param none
	* @return string
	*/
	public function getAcessoAcesso(){
		return $this->acesso;
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
	* Verifica o valor passado
	* 
	* @param string $tipo
	* @return string
	*/
	private function checkPermissao($tipo){
		if($tipo=='read' || $tipo=='write') return $tipo;
		else return 'read';
	}
}
?>
