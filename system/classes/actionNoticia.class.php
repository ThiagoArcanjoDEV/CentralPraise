<?php
abstract class actionNoticia{
	public static function search($search = ""){
		$Noticia = NoticiaDAO::search($search);
		return $Noticia;
	}
	
	/**
	* Monta Listagem das Equipes
	* @return string
	*/
	public static function listaNoticias(){
		global $FileText;

		$Noticias = NoticiaDAO::search('','last');
		
		$return = "";
		if($Noticias)
		{
			for($a=0;$a<count($Noticias);$a++){
				$Membro = $Noticias[$a]->getMembro();
				$return .= '<li class="double">';
					$return .= '<span class="ellipsis">';
						$return .= ''.$Noticias[$a]->getDesc().'';
						$return .= ' - '.$Noticias[$a]->getTexto().'';
						$return .= '<span class="meta glyphicons calendar single"><i></i>&nbsp;'.$Noticias[$a]->getData('d/m/Y').'&nbsp;';
						$return .= '<span>-&nbsp;'.$Membro->getNome().'&nbsp;</span></span>';
					$return .= '</span>';
				$return .= '</li>';
			}
		}
		else $return = '<li><span>'.$FileText->get('noticias','no_rows').'</span></li>';
		
		return $return;
	}
}
?>
