<?php
abstract class actionEquipe{
	public static function search($search = ""){
		$Equipe = EquipeDAO::search($search);
		return $Equipe;
	}
	
	/**
	* Monta Listagem das Equipes
	* @return string
	*/
	public static function listaEquipes(){
		global $FileText;
		$Equipes = EquipeDAO::search();
		
		$return = "";
		if($Equipes)
		{
			for($a=0;$a<count($Equipes);$a++){
				$Igreja = $Equipes[$a]->getIgreja();
				$return .= '<li class="listaL equipe|'.$Equipes[$a]->getID().'">';
					$return .= '<span class="row-fluid">';
						$return .= '<span class="span8">'.$Equipes[$a]->getNome().'</span>';
						$return .= '<span class="span2">'.$Igreja->getNome().'</span>';
						$return .= '<span class="span1">';
							$return .= '<div class="glyphicons glyphicon-small glyphicon-top eye_open" style="top:6px"><i></i></div>';
						$return .= '</span>';
					$return .= '</span>';
				$return .= '</li>';
			}
		}
		else
		{
                        $return .= '<li>';
                                $return .= '<span class="span12"><center>'.$FileText->get('equipes','no_rows').'</center></span>';
                        $return .= '</li>';
		}
		
		return $return;
	}
	
	/**
	* Monta o select para selecionar as equipes
	* @return string
	*/
	public static function mountSelectEquipes()
	{
		global $FileText;
		
		if(isset($_SESSION['ACESSO']['ESCALA']) && $_SESSION['ACESSO']['ESCALA']=='write') $Equipes = EquipeDAO::search();
		else
		{
			$search['igreja'] = $_SESSION['IGREJAS']['SELECTED'];
			$Equipes = EquipeDAO::search($search);
		}
		
		$return = '<option value="">'.$FileText->get('geral','select_one').'</option>';
		foreach($Equipes AS $Equipe)
		{
			$return .= '<option value="'.$Equipe->getID().'">'.$Equipe->getNome().'</option>';
		}
		
		return $return;
	}
}
?>
