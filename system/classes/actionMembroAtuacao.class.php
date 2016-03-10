<?php
abstract class actionMembroAtuacao{
	public static function search($search = ""){
		$MembroAtuacao = MembroAtuacaoDAO::search($search);
		return $MembroAtuacao;
	}
	
	public static function listaMembrosAtuacao($search = "")
	{
		global $FileText;
		$MembrosAtuacao = false;
		
		if(isset($search['membro_atuacao_id']) && is_array($search['membro_atuacao_id']))
		{
			$MembrosAtuacao = array();
			foreach($search['membro_atuacao_id'] as $id)
			{
				$tmp['membro_atuacao_id'] = $id;
				$return = MembroAtuacaoDAO::search($tmp);
				$MembrosAtuacao[] = $return[0];
			}
		}
		elseif(is_array($search)) $MembrosAtuacao = MembroAtuacaoDAO::search($search);
		
		$return = "";
		if($MembrosAtuacao){
			for($a=0;$a<count($MembrosAtuacao);$a++){
				$AArea = $MembrosAtuacao[$a]->getAArea();
				$Membro = $MembrosAtuacao[$a]->getMembro();

				if($MembrosAtuacao[$a]->getAtuacaoOK()=='nao') $atuacao = '<span class="atuacao_nao" data-toggle="tooltip" data-original-title="'.$FileText->get('membro_atuacao','atuacao_nao').'" data-placement="left" title="'.$FileText->get('membro_atuacao','atuacao_nao').'">';
				else $atuacao = '';

				$return .= '<tr>';
				$return .= '<td class="center span4"><a class="areas '.$AArea->getIcon().' areas_small" data-toggle="tooltip" data-original-title="'.$AArea->getNome().'" data-placement="left" title="'.$AArea->getNome().'"></a></td>';

				if($atuacao) $return .= '<td class="span8">'.$atuacao.$Membro->getNome().'</span></td>';
				else $return .= '<td class="span8">'.$Membro->getNome().'</td>';

				$return .= '</tr>';
			}
		}
		else{
			$return .= '<tr>';
				$return .= '<td colspan=2><center>'.$FileText->get('membro_atuacao','no_rows').'</center></td>';
			$return .= '</tr>';
		}
		return $return;
	}
	
	/**
	* Monta o select para selecionar os membros escalados
	* @return string
	*/
	public static function mountSelectMembros($equipe = false)
	{
		global $FileText;
		
		$search['membro_atuacao_ok'] = 'sim';
		
		$Membros = MembroAtuacaoDAO::search($search);
		
		$return = '';
		$areas = array();
		foreach($Membros AS $MembroAtuacao)
		{
			$Area = $MembroAtuacao->getAArea();
			$Membro = $MembroAtuacao->getMembro();
			$Equipe = $MembroAtuacao->getEquipe();
			$Igreja = $Equipe->getIgreja();
			
			if($Igreja->getID() == $_SESSION['IGREJAS']['SELECTED'])
			{			
				if(!isset($areas[$Area->getID()]['texto'])) $areas[$Area->getID()]['texto'] = '';
				
				if($equipe == $Equipe->getID()) $checked = 'checked';
				else $checked = '';
				
				$areas[$Area->getID()]['nome'] = $Area->getNome();
				$areas[$Area->getID()]['icon'] = $Area->getIcon();
				$areas[$Area->getID()]['texto'] .= '<span class="row-fluid">';
				$areas[$Area->getID()]['texto'] .= '<span class="span1">&nbsp;</span>';
				$areas[$Area->getID()]['texto'] .= '<label>';
					$areas[$Area->getID()]['texto'] .= '<span class="span1"><input type="checkbox" name="membros[]" value="'.$MembroAtuacao->getID().'" '.$checked.'></span>';
					$areas[$Area->getID()]['texto'] .= '<span class="span10">'.$Membro->getNome().' (<b>'.$Membro->getTag().'</b>)</span>';
				$areas[$Area->getID()]['texto'] .= '</label>';
				$areas[$Area->getID()]['texto'] .= '</span>';
			}
		}
		
		foreach($areas AS $area)
		{
				$return .= '<div class="box-generic">';
					$return .= '<span class="areas '.$area['icon'].' areas_small"><i></i>&nbsp;<span>'.$area['nome'].'</span></span>';
					$return .= '<div class="slim-scroll" style="width: auto;height: auto;max-height:200px;overflow:auto" data-scroll-height="200px">';
						$return .= $area['texto'];
					$return .= '</div>';
				$return .= '</div>';
				$return .= '<div class="separator"></div>';
		}
		
		return $return;
	}
}
?>
