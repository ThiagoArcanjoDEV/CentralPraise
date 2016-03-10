<?php
abstract class actionEscala{
	public static function search($search = ""){
		$Escala = EscalaDAO::search($search);
		return $Escala;
	}
	
	/**
	* Monta Listagem das Escalas
	* @return string
	*/
	public static function listaEscalas($search = false){
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
	* @return string
	*/
	public static function listaEscalados($escala_id){
		global $FileText;
		
		$search['escala'] = $escala_id;
		$membro_atuacao = EscalaDAO::EscalaMembroAtuacao($search);
		
		return actionMembroAtuacao::listaMembrosAtuacao($membro_atuacao);
	/*	
		$return = "";
		if($MembrosAtuacao){
			for($a=0;$a<count($MembrosAtuacao);$a++){
				$AArea = $MembrosAtuacao[$a]->getAArea();
				$Membro = $MembrosAtuacao[$a]->getMembro();
				if($MembrosAtuacao[$a]->getAtuacaoOK()=='nao') $atuacao = ' class="atuacao_nao"';
				else $atuacao = '';
				$return .= '<tr'.$atuacao.'>';
					$return .= '<td class="center span4"><a class="areas '.$AArea->getIcon().' areas_small" data-toggle="tooltip" data-original-title="'.$AArea->getNome().'" data-placement="left" title="'.$AArea->getNome().'"></a></td>';
					$return .= '<td class="span8">'.$Membro->getNome().'</td>';
				$return .= '</tr>';
			}
		}
		else{
			$return .= '<tr>';
				$return .= '<td colspan=2><center>'.$FileText->get('equipes','no_rows').'</center></td>';
			$return .= '</tr>';
		}
		return $return;*/
	}
	
	/**
	* Monta Listagem dos Escalados
	* @return string
	*/
	public static function listaMusicasEscala($escala_id){
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
}
?>
