<?php
/**
* class Igreja
* 
* @author 	Thiago Arcanjo
*
* @package	Class
* @subpackage	Object
* @access 	public
* @see		ID
*/
class Igreja extends ID{
	/**
	* `igreja_nome` VARCHAR(50) NOT NULL
	* @access private
	* @var string
	*/
	private $nome;
	/**
	* `igreja_endereco` VARCHAR(300) NOT NULL
	* @access private
	* @var string
	*/
	private $endereco;
	
	/**
	* @param string $objeto
	* @return none
	*/
	public function __construct($objeto = ""){
		if(empty($objeto) && isset($_SESSION['IGREJAS']) && !empty($_SESSION['IGREJAS']['SELECTED']))
		{
			$this->setID($_SESSION['IGREJAS']['SELECTED']);
			$this->setNome($_SESSION['IGREJAS']['NOMES'][array_search($_SESSION['IGREJAS']['SELECTED'],$_SESSION['IGREJAS']['IDS'])]);
		}
		elseif(is_array($objeto) && !empty($objeto)){
			if(isset($objeto["igreja"]) && !empty($objeto["igreja"])) $this->setID($objeto["igreja"]);
			elseif(!empty($objeto["igreja_id"])) $this->setID($objeto["igreja_id"]);
			if(!empty($objeto["igreja_nome"])) $this->setNome($objeto["igreja_nome"]);
			if(!empty($objeto["igreja_endereco"])) $this->setEndereco($objeto["igreja_endereco"]);
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
	* @param string $endereco
	* @return none
	*/
	public function setEndereco($endereco){
		$this->endereco = $endereco;
	}
	/**
	* @param none
	* @return string
	*/
	public function getEndereco(){
		return $this->endereco;
	}
}
?>
