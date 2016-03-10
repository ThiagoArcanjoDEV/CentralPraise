<?php
// Passwrod Hash Class for PHP 5.4 or below
require_once(PAGES_APOIO.'/phpPasswordHashingLib/passwordLib.php');

abstract class actionAcesso{
	public static function search($search = ""){
		$Acesso = AcessoDAO::search($search);
		return $Acesso;
	}

	public static function mountTopnavUser()
	{
		global $FileText;
		
		// HTML para dekstop
		$pc_return = '';
		$pc_content = '';
		$pc_mountSpan = '';

		// HTML para mobile
		$mob_return = '';
		
		if(isset($_SESSION['ACESSO']['ID']))
		{
			$pc_mountSpan = 'mountPopover" data-placement="bottom" data-contet="" data-title="'.$FileText->get('paineluser','title').'" data-toggle="popover';
			$pc_content .= '<span class="'.ICON_USER.'" title="'.$FileText->get('geral','member').'"><i></i></span>';
			$pc_content .= '<span class="txt">'.$_SESSION['ACESSO']['NOME'].' ('.$_SESSION['ACESSO']['TAG'].')</span>';
			
			$mob_return .= '<span class="'.ICON_USER.'"><i></i>'.$_SESSION['ACESSO']['NOME'].' ('.$_SESSION['ACESSO']['TAG'].')</span></li>';
			$mob_return .= '<li><a href="?paineluser=change" class="'.ICON_CHANGE.'"><i></i> '.$FileText->get('paineluser','change').'</a>';
			$mob_return .= '<li><a href="?logout" class="'.ICON_LOGOUT.' logout"><i></i> '.$FileText->get('geral','exit').'</a>';
		}
		else
		{
			$pc_mountSpan = 'mountPopover" data-placement="bottom" data-content="" data-title="'.$FileText->get('login','subtitle').'" data-toggle="popover';
			$pc_content .= '<span class="'.ICON_SENHA.'"><i></i></span>';
			$pc_content .= '<span class="txt">'.$FileText->get('geral','enter').'</span>';
			$pc_content .= '<div class="clearfix"></div>';
			
			$mob_return .= '<a href="?login" class="'.ICON_SENHA.'"><i></i> '.$FileText->get('geral','enter').'</a>';
		}

		$pc_return  = '<span class="widget-stats '.$pc_mountSpan.'" style="cursor:pointer;">';
		$pc_return .= $pc_content;
		$pc_return .= '</span>';
		
		return array($pc_return,$mob_return);
	}
	
	public static function mountLogin()
	{
		global $FileText;
		
		if(isset($_SESSION['ACESSO']['ID']))
		{
			$content = '';
			$content .= '<a href="?paineluser=change" class="single btn-icon '.ICON_CHANGE.'" title="'.$FileText->get('paineluser','change').'">'.$FileText->get('paineluser','change').'<i></i><a><br>';
			$content .= '<a href="?logout" class="single btn-icon '.ICON_LOGOUT.' logout" title="'.$FileText->get('geral','exit').'">'.$FileText->get('geral','exit').'<i></i><a>';
			return $content;
		}
		else
		{
			global $Tpl;
			
			$tempTPL = $Tpl;
			$tempTPL = $FileText->makeTPL($tempTPL,'login');
			
			return $tempTPL->readContent('login[HOME]');
		}
	}

	public static function doLogin($login,$senha)
	{
		self::unregisterLogin();
		$search["acesso_login"] = $login;
		
		if($Acesso = self::search($search))
		{
			if(self::validateHash($senha,$Acesso[0]))
			{
				return self::registerLogin($Acesso[0]);
			}
			else return false;
		}
		else return false;
	}

	public static function doLogout()
	{
		self::unregisterLogin();
	}
	
	private static function registerLogin(Acesso $Acesso)
	{
		$Membro = $Acesso->getMembro();
		
		$_SESSION['ACESSO']['ID'] = $Acesso->getID();
		$_SESSION['ACESSO']['MEMBRO_ID'] = $Membro->getID();
		$_SESSION['ACESSO']['NOME'] = $Membro->getNome();
		$_SESSION['ACESSO']['TAG'] = $Membro->getTag();
		$_SESSION['ACESSO']['IGREJA'] = $Acesso->getAcessoIgreja();
		$_SESSION['ACESSO']['AREA'] = $Acesso->getAcessoArea();
		$_SESSION['ACESSO']['MEMBRO'] = $Acesso->getAcessoMembro();
		$_SESSION['ACESSO']['EQUIPE'] = $Acesso->getAcessoEquipe();
		$_SESSION['ACESSO']['MUSICA'] = $Acesso->getAcessoMusica();
		$_SESSION['ACESSO']['ESCALA'] = $Acesso->getAcessoEscala();
		$_SESSION['ACESSO']['ACESSO'] = $Acesso->getAcessoAcesso();
		
		return true;
	}
	
	private static function unregisterLogin()
	{
		session_unset();
	}
	
	public static function createHash($senha)
	{
		// hash salt
		$salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);
		$salt=str_replace("+",".",$salt);
		
		// Time for better cost
		$timeTarget = 0.05; // 50 milliseconds 
		$cost = 8;
		$return = '';
		
		do
		{
			$cost++;
			$start = microtime(true);
			$param='$'.implode('$',array("2y",str_pad($cost,2,"0",STR_PAD_LEFT),$salt));
			$return = password_hash($senha, PASSWORD_BCRYPT, array("cost" => $cost,"salt" => $param));
			$end = microtime(true);
		} while (($end - $start) < $timeTarget);
		
		return $return;                                        
	}

	public static function validateHash($senha,Acesso $Acesso)
	{
		return password_verify($senha,$Acesso->getSenha());
	}
	
	/**
	* Prepara um array para alterar dados no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function update($post)
	{
		if(isset($post['login_text']))
		{
			$update['acesso_id'] = (testSearch::test($post['acesso_id'],false))? $post['acesso_id'] : false;
			$update['acesso_login'] = (testSearch::test($post['login_text'],false))? $post['login_text'] : false;
			if(!empty($post['login_senha_conf']) && $post['login_senha_conf']==$post['login_senha']) $update['acesso_senha'] = (testSearch::test($post['login_senha'],false))? self::createHash($post['login_senha']) : false;
		}
		
		if($Acesso = AcessoDAO::update($update))
		{
			return self::registerLogin($Acesso);
		}
		else return false;
	}
}
?>
