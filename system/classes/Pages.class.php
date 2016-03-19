<?php
class Pages{
	private $pagesTPL;
	public $FileText;
	private $PagesOfSystem = array('home','musicas','escalas','equipes','admin','paineluser','louvoropen','login','logout');
	private $PagesNames =  array();

	public function __construct()
	{
		$this->makeGlobal();
		
		foreach($this->PagesOfSystem as $page)
		{
			$this->PagesNames[$page] = $this->FileText->get($page,'title');
		}
	}
	
	public function makeGlobal(){
		global $Tpl;
		global $FileText;
		
		$this->pagesTPL = $Tpl;
		$this->FileText = $FileText;
		$this->pagesTPL->setTag('MENU','');
	}
	
	private function inPagesOfSystem($page){
		return in_array($page,$this->PagesOfSystem);
	}
	
	/**
	  * Carrega os menus
	**/
	public function Load($page){
		$this->pagesTPL->setTag(strtoupper($page).'_ATIVO','ativo');
		$this->pagesTPL->setTag('MENU',$this->PagesNames[$page]);
		
		if($page!='login' && $page!='logout')
		{
			// Menu QUANT.
			$this->pagesTPL->setTag('MUSICA_QUANT',count(array_filter((actionMusica::search())? actionMusica::search() : array())));
			$this->pagesTPL->setTag('ESCALA_QUANT',count(array_filter((actionEscala::search())? actionEscala::search() : array())));
			$this->pagesTPL->setTag('EQUIPE_QUANT',count(array_filter((actionEquipe::search())? actionEquipe::search() : array())));

			// IGREJA SELECT
			$this->pagesTPL->setTag('SELECT_IGREJA',actionIgreja::mountSelectIgreja());

			// USER TOPNAV
			$user_topnav = actionAcesso::mountTopnavUser();
			$this->pagesTPL->setTag('USER_TOPNAV',$user_topnav[0]);
			$this->pagesTPL->setTag('USER_TOPNAV_MOB',$user_topnav[1]);

			//TOPNAV
			$topnav = $this->pagesTPL->readContent('topnav');
			$this->pagesTPL->setTag('TOPNAV',$topnav);
		}
		
		// CALL PAGE METHOD
		if($this->inPagesOfSystem($page)){
			$this->pagesTPL = $this->FileText->makeTPL($this->pagesTPL,$page);
			$pageMethod = $page.'Page';
			if(!empty($_GET[$page])) $this->$pageMethod($_GET[$page]);
			else $this->$pageMethod();
		}
		else $this->homePage();
	}
	
	/** HOME **/
	public function homePage(){
		$this->pagesTPL->setTag('NEWS',actionNoticia::listaNoticias());
		$nextEscala = actionEscala::search('next');
		if($nextEscala){
			$Agenda = $nextEscala[0]->getAgenda();
			$this->pagesTPL->setTag('NEXT_ESCALA','<span>Pr&oacute;xima Escala - '.$Agenda->getData('d/m/Y').' - '.$Agenda->getNome().' ('.$nextEscala[0]->getObs().')</span><span class="span1 escala_id hidden">'.$nextEscala[0]->getID().'</span>');
			$this->pagesTPL->setTag('NEXT_ESCALADOS',actionEscala::listaEscalados($nextEscala[0]->getID()));
			$this->pagesTPL->setTag('NEXT_MUSICAS',actionEscala::listaMusicasEscala($nextEscala[0]->getID()));
		}
		else{
			$this->pagesTPL->setTag('NEXT_ESCALA','<span>Pr&oacute;xima Escala</span>');
			$this->pagesTPL->setTag('NEXT_ESCALADOS','');
			$this->pagesTPL->setTag('NEXT_MUSICAS','');
		}
		$this->pagesTPL->open('home');
	}
	
	/** MUSICAS **/
	public function musicasPage(){
		$this->pagesTPL->setTag('LISTA_MUSICAS_TABS',actionMusica::mountMusicasTabs());
		$this->pagesTPL->open('musicas[LIST]');
	}
	
	/** ESCALAS **/
	public function escalasPage(){
		$_SESSION['FORM']["LAST"] = '';
		if(isset($_SESSION['ACESSO']['ID']) && $_SESSION['ACESSO']['ESCALA'] == 'write')
		{
			$this->pagesTPL->setTag('SELECT_EQUIPES',actionEquipe::mountSelectEquipes());
			$this->pagesTPL->setTag('SELECT_MUSICAS',actionMusica::mountSelectMusicas());
			$list = $this->pagesTPL->readContent('escalas_menu');
		}
		else $list = $this->pagesTPL->readContent('escalas_simple');
		$this->pagesTPL->setTag('DIV_ESCALAS',$list);
		
		$this->pagesTPL->setTag('LISTA_ESCALAS',actionEscala::listaEscalas());
		$this->pagesTPL->open('escalas[LIST]');
	}
	
	/** EQUIPES **/
	public function equipesPage(){
		$this->pagesTPL->setTag('LISTA_EQUIPES',actionEquipe::listaEquipes());
		$this->pagesTPL->open('equipes[LIST]');
	}
	
	/** ADMIN **/
	public function adminPage(){
		$this->pagesTPL->open('admin');
	}
	
	/** PAINELUSER **/
	public function paineluserPage($option = false){
		if($option)
		{
			$search["acesso"] = $_SESSION['ACESSO']['ID'];
			$Acesso = actionAcesso::search($search);
			
			$Membro = $Acesso[0]->getMembro();
			$this->pagesTPL->setTag('MEMBER_ID',$Membro->getID());
			$this->pagesTPL->setTag('MEMBER_NAME',$Membro->getNome());
			$this->pagesTPL->setTag('MEMBER_TAG',$Membro->getTag());
			$this->pagesTPL->setTag('MEMBER_TEL',$Membro->getTel());
			$this->pagesTPL->setTag('MEMBER_CEL',$Membro->getCel());
			$this->pagesTPL->setTag('MEMBER_EMAIL',$Membro->getEmail());
			$this->pagesTPL->setTag('MEMBER_LOGIN',$Acesso[0]->getLogin());
			
			$option = strtoupper($option);
			$this->pagesTPL->open('paineluser['.$option.']');
		}
		else header("Refresh:0; url=?home");
	}
	
	/** louvorhoje **/
	public function louvoropenPage($id = false){
		if(isset($_GET['music'])&&!empty($_GET['music'])) $listaMusicas = actionMusica::musicaOpen((int)$_GET['music']);
		elseif($id) $listaMusicas = actionMusica::listaLouvorOpen((int)$id);
		else $listaMusicas = actionMusica::listaLouvorOpen();
		
		$this->pagesTPL->setTag('LOUVOR_HOJE_LISTA',$listaMusicas[0]);
		$this->pagesTPL->setTag('LOUVOR_HOJE_MUSICAS',$listaMusicas[1]);
		
		$topnav = $this->pagesTPL->readContent('louvor[LISTA]');
		$this->pagesTPL->setTag('TOPNAV',$topnav);
		
		$this->pagesTPL->open('louvor[ONLINE]');
	}
	
	/** LOGIN **/
	public function loginPage(){
		$this->pagesTPL->open('login');
	}
	
	/** LOGOUT **/
	public function logoutPage(){
		actionAcesso::doLogout();
		header("Refresh:0; url=?login");
	}
}
?>
