<?php
/**
* Class Ajax - Recebe chamadas do cliente e retorno informações do BD
* 
* @author 	Thiago Arcanjo
* 
* @package		Class
* @access		public
*/
class Ajax{
	public function Load($post){
		global $FileText;
		
		switch($_GET['ajax']){
			case 'igreja':
				if(isset($_GET["select"]))
				{
					$_SESSION['IGREJAS']['SELECTED'] = $post['id'];
					echo '1';
				}
				break;
			case 'login':
				if(isset($_GET["mount"]))
				{
					echo actionAcesso::mountLogin();
				}
				elseif((isset($post['login']) && testSearch::test($post['login'],false))&&(isset($post['senha']) && !empty($post['senha'])))
				{
					$login = $post['login'];
					$senha = $post['senha'];
					
					if($return = actionAcesso::doLogin($post['login'],$post['senha']))
					{
						echo '1|'.$FileText->get('login','ok');
					}
					else echo '0|'.$FileText->get('login','error');
				}
				else echo '0|'.$FileText->get('login','form_info');
				break;
			case 'lista':
				switch($post['lista']){
					case 'equipe':
						$search['equipe'] = $post['listaID'];
						echo actionMembroAtuacao::listaMembrosAtuacao($search);
						break;
					case 'escala':
						$escala['escala_id'] = $search = $post['listaID'];
						$Escala = actionEscala::search($escala);
						$Agenda = $Escala[0]->getAgenda();
						echo actionEscala::listaEscalados($search);
						echo "||";
						echo actionEscala::listaMusicasEscala($search);
						echo "||";
						echo '<i></i>'.$Agenda->getData('d/m/Y').' - '.$Agenda->getNome().' ('.$Escala[0]->getObs().')<span class="span1 escala_id hidden">'.$Agenda->getID().'</span>';
						if($_SESSION['ACESSO']['ESCALA']) echo '||'.'<a href="?escalas&change='.$escala['escala_id'].'" class="glyphicons pencil right_link" title="'.$FileText->get('geral','change').'"><i></i></a>';
						break;
				}
				break;
			case 'calendar':
				// List of events
				$Agenda = actionAgenda::mountCalendar();
				// sending the encoded result to success page
 				echo json_encode($Agenda);
				break;
			case 'escalas':
				if(isset($_GET['filtro']))
				{
					//filtra lista de escalas
					$texto = $post['search'];
					if(testSearch::test($texto))
					{
						if(($time = strtotime($texto)) !== false) $search['agenda_data'] = $texto;
						$search['escala_obs'] = $texto;
						$search['agenda_nome'] = $texto;
						$search['agenda_obs'] = $texto;
						$search['equipe_nome'] = $texto;
						$search['igreja_nome'] = $texto;
						echo actionEscala::listaEscalas($search);
					}
				}
				elseif(isset($_GET['mountSelectMembros']))
				{
					echo actionMembroAtuacao::mountSelectMembros($post['equipe']);
				}
				elseif(isset($_GET['add']))
				{
					$_SESSION['FORM']["THIS"] = "formAddEscala";
					$retorno = actionEscala::add($post);
					echo json_encode($retorno);
				}
				elseif(isset($_GET['change']))
				{
					switch($post['type'])
					{
						case 'get':
							$Escalas = actionEscala::search($post);
							$Escala = $Escalas[0];
							echo json_encode($Escala);
							//print_r( $Escala->jsonSerialize());
							//echo "<pre>".print_r($Escala)."</pre>";
							break;
					}
				}
				break;
			case 'membros':
				if(isset($_GET['change']))
				{
					//checkLogin
					$search['acesso_login'] = $post['login_text'];
					$retorno = array();
					$retorno[2] = false;
					if($Acesso = actionAcesso::search($search))
					{
						$Membro = $Acesso[0]->getMembro();
						if($Membro->getID() != $post['member_id'])
						{
							$retorno[0] = 'notyfy_error';
							$retorno[1] = 'login_text_already';
						}
					}
					else
					{
						unset($search);
						$search['acesso'] = $post['member_id'];
						$Acesso = actionAcesso::search($search);
						$Membro = $Acesso[0]->getMembro();
					}
					
					if(!isset($retorno[0]))
					{
						if(!(actionAcesso::validateHash($post['login_senha'],$Acesso[0])))
						{
							$retorno[0] = 'notyfy_error';
							$retorno[1] = 'login_senha_wrong';
						}
						else
						{
							$post['member_id'] = $Membro->getID();
							$post['acesso_id'] = $Acesso[0]->getID();
							
							if(!(actionMembro::update($post)) || !(actionAcesso::update($post)))
							{
								$retorno[0] = 'notyfy_error';
								$retorno[1] = 'data_changed_error';
							}
							else
							{
								$retorno[0] = 'notyfy_success';
								$retorno[1] = 'data_changed_ok';
								$retorno[2] = true;
							}
						}
					}
					
					echo json_encode($retorno);
				}
				break;
			case 'createHash':
				echo actionAcesso::createHash('evandro');
				break;
			case 'getMessages':
				$msg = $post['msg'];
				$retorno;
				foreach($msg as $message)
				{
					$retorno[] = $FileText->get('alert',$message);
				}
				echo json_encode($retorno);
				break;
			default:
				echo '0';
				break;
		}
	}
}
?>
