<?php
abstract class actionIgreja{
	public static function search($search = ""){
		$Igreja = IgrejaDAO::search($search);
		return $Igreja;
	}

	public static function mountSelectIgreja()
	{
		if(!isset($_SESSION['IGREJAS']))
		{
			if($_SESSION['ACESSO']['IGREJA']=='write')
			{
				$Igrejas = self::search();
				$_SESSION['IGREJAS']['SELECTED'] = '1';
			}
			else
			{
				$membro['membro'] = $_SESSION['ACESSO']['MEMBRO_ID'];
				$Membros = actionMembroAtuacao::search($membro);
				foreach($Membros as $MembroAtuacao)
				{
					$Equipe = $MembroAtuacao->getEquipe();
					$Igreja = $Equipe->getIgreja();
					if(!$Igreja->getID())
					{
						$search['equipe'] = $Equipe->getID();
						$Equipe = actionEquipe::search($search);
						$Equipe = $Equipe[0];
						$Igreja = $Equipe->getIgreja();
					}
					$Igrejas[$Igreja->getID()] = $Igreja;
					$_SESSION['IGREJAS']['SELECTED'] = $Igreja->getID();
				}
			}
			
			if($Igrejas)
			{
				foreach($Igrejas as $Igreja)
				{
					$_SESSION['IGREJAS']['IDS'][] = $Igreja->getID();
					$_SESSION['IGREJAS']['NOMES'][] = $Igreja->getNome();
				}
			}
			else return false;
		}

		$return = '';
		for($a=0;$a<count($_SESSION['IGREJAS']['IDS']);$a++)
		{
			if(!empty($_SESSION['IGREJAS']['SELECTED']) && $_SESSION['IGREJAS']['SELECTED']==$_SESSION['IGREJAS']['IDS'][$a]) $selected = 'selected';
			else $selected = '';
			$return .= '<option value="'.$_SESSION['IGREJAS']['IDS'][$a].'" '.$selected.'>'.$_SESSION['IGREJAS']['NOMES'][$a].'</option>';
		}
		return $return;
	}
}
?>
