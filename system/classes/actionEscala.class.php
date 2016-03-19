<?php
/**
* Class actionEscala - Ações relacionadas a escalas
* 
* @author 	Thiago Arcanjo
* 
* @package		Class
* @access		public
*/
abstract class actionEscala{
	/**
	* Busca dados no BD
	* 
	* @param array $search
	* @return Escala
	*/
	public static function search($search = "")
	{
		$Escala = EscalaDAO::search($search);
		return $Escala;
	}
	
	/**
	* Monta Listagem das Escalas
	* 
	* @param array $search
	* @return string
	*/
	public static function listaEscalas($search = false)
	{
		global $FileText;

		if($search) $Escalas = EscalaDAO::search($search);
		else $Escalas = EscalaDAO::search('next');
		
		$return = "";
		if($Escalas){
			for($a=0;$a<count($Escalas);$a++){
				$Equipe = $Escalas[$a]->getEquipe();
				$Agenda = $Escalas[$a]->getAgenda();
				$return .= '<li class="listaL escala|'.$Escalas[$a]->getID().'">';
					$return .= '<span class="row-fluid">';
						$return .= '<span class="span3">'.$Agenda->getData('d/m/Y').'</span>';
						$return .= '<span class="span4">'.$Agenda->getNome().'</span>';
						$return .= '<span class="span3">'.$Equipe->getNome().'</span>';
						$return .= '<span class="span2">';
							$return .= '<div class="glyphicons glyphicon-small glyphicon-top eye_open" style="top:6px"><i></i></div>';
						$return .= '</span>';
					$return .= '</span>';
				$return .= '</li>';
			}
		}
		else $return = '<li><span>'.$FileText->get('escalas','no_rows').'</span></li>';
				
		return $return;
	}
	
	/**
	* Monta Listagem dos Escalados
	* 
	* @param integer $escala_id
	* @return string
	*/
	public static function listaEscalados($escala_id)
	{
		global $FileText;
		
		$search['escala'] = $escala_id;
		$membro_atuacao = EscalaDAO::EscalaMembroAtuacao($search);
		
		return actionMembroAtuacao::listaMembrosAtuacao($membro_atuacao);
	}
	
	/**
	* Monta Listagem dos Escalados
	* 
	* @param integer $escala_id
	* @return string
	*/
	public static function listaMusicasEscala($escala_id)
	{
		global $FileText;

		$search['escala'] = $escala_id;
		$Cifras = EscalaDAO::EscalaMusicas($search);
		$return = "";
		if($Cifras){
			$return .= '<tr class="bold">';
				$return .= '<td class="center span2">ORDEM</td>';
				$return .= '<td class="span8">M&Uacute;SICA</bold></td>';
				$return .= '<td class="center span2">TOM</td>';
			$return .= '</tr>';
			
			for($a=0;$a<count($Cifras);$a++){
				$Musica = $Cifras[$a]->getMusica();
				
				$return .= '<tr>';
					$return .= '<td class="center">'.($a+1).'</td>';
					$return .= '<td>'.$Musica->getNome().'</td>';
					$return .= '<td class="center">'.$Cifras[$a]->getTom().'</td>';
				$return .= '</tr>';
			}
		}
		else{
			$return .= '<tr>';
				$return .= '<td colspan=2><center>'.$FileText->get('musicas','no_rows').'</center></td>';
			$return .= '</tr>';
		}
		return $return;
	}
	
	/**
	* Adiciona uma nova escala
	* 
	* @param array $escala
	* @return string
	*/
	public static function add($escala = false)
	{
		if($_SESSION['FORM']["LAST"] != $_SESSION['FORM']["THIS"])
		{
			$retorno = array();
			$retorno[0][0] = 'notyfy_error';
			$retorno[1][0] = 'escala_add_error';
				
			foreach($escala as $key => $string)
			{
				if(!empty($string) && !is_array($string) && !(testSearch::test($string))) $escala[$key] = '';
			}
			
			$escala['agenda_nome'] = $escala['escalas_nome'];
			$escala['agenda_data'] = $escala['escalas_data'];
			$escala['equipe'] = $escala['escalas_equipes'];
			
			unset($escala['escalas_nome'],$escala['escalas_data'],$escala['escalas_equipes']);
		
			if($Agenda = actionAgenda::add($escala))
			{
				$_SESSION['FORM']["LAST"] = "formAddEscala";
				$escala['agenda'] = $Agenda->getID();
				
				if($Escala = EscalaDAO::add($escala))
				{
					$retorno[0][0] = 'notyfy_success';
					$retorno[1][0] = 'escala_add_ok';
					$retorno[2] = true;
								
					if(isset($escala['musicas']) && !empty($escala['musicas']))
					{
						$escala_cifra = array();
						foreach($escala['musicas'] AS $cifra)
						{
							$escala_cifra[] = array('escala' => $Escala->getID(),'cifra' => $cifra);
						}
						
						if(self::addEscalaCifra($escala_cifra))
						{
							$retorno[0][] = 'notyfy_success';
							$retorno[1][] = 'escala_cifra_add_ok';
						}
						else
						{
							$retorno[0][] = 'notyfy_warning';
							$retorno[1][] = 'escala_cifra_add_error';
						}
					}
					
					if(isset($escala['membros']) && !empty($escala['membros']))
					{
						$escala_membros = array();
						foreach($escala['membros'] AS $membro_atuacao)
						{
							$escala_membros[] = array('escala' => $Escala->getID(),'membro_atuacao' => $membro_atuacao);
						}
						
						if(self::addEscalaMembroAtuacao($escala_membros))
						{
							$retorno[0][] = 'notyfy_success';
							$retorno[1][] = 'escala_membro_add_ok';
						}
						else
						{
							$retorno[0][] = 'notyfy_warning';
							$retorno[1][] = 'escala_membro_add_error';
						}
					}
					
				}
			}
		}
		else
		{
			$retorno[0][0] = 'notyfy_information';
			$retorno[1][0] = 'form_already_sended';
		}
		
		return $retorno;
	}
	
	/**
	* Adiciona as musicas selecionadas para esta escala
	* 
	* @param array $escala_cifra
	* @return boolean
	*/
	public function addEscalaCifra(Array $escala_cifra)
	{
		return EscalaDAO::addEscalaCifra($escala_cifra);
	}
	
	/**
	* Adiciona os membros escalados
	* 
	* @param array $escala_membros
	* @return boolean
	*/
	public function addEscalaMembroAtuacao(Array $escala_membros)
	{
		return EscalaDAO::addEscalaMembroAtuacao($escala_membros);
	}
}
?>
