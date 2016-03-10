<?php
abstract class actionMusica{
	private static $tabs_keys = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",'#');
 
	public static function search($search = ""){
		$Musica = MusicaDAO::search($search);
		return $Musica;
	}

	public static function mountMusicasTabs()
	{
		global $FileText;

		$tabs = self::createTabsArray();
		$Cifras = self::search();
		
		$keys = array_fill_keys(self::$tabs_keys,0);
		$return = '';
		if($Cifras)
		{
			foreach($Cifras AS $Cifra)
			{
				$Musica = $Cifra->getMusica();
				$first_string = substr(trim($Musica->getNome()),0,1);
				$tabs[$first_string] .= '<li class="louvorOpen"><span class="row-fluid"><span class="span5">'.trim($Musica->getNome()).'</span><span class="span6">'.trim($Musica->getNome()).'</span><span class="span1 musica_id hidden">'.$Musica->getID().'</span></span></li>';
				$keys[$first_string]++;
			}
		}

		foreach($tabs AS $key => $value)
                {
                	if($keys[$key]==0) $value .= '<li><span class="row-fluid"><span class="span12">'.$FileText->get('musicas','no_rows').'</span></span></li>';
                        $tabs[$key] = $value.'</ul></div></div>';
                        $return .= $tabs[$key];
               	}

                return $return;
	}
	
	public static function listaLouvorOpen($id = false)
	{
		if($id)
		{
			$search['escala'] = $id;
			$Escala = actionEscala::search($search);
		}
		else $Escala = actionEscala::search('next');

		if($Escala)
		{
	                $search['escala'] = $Escala[0]->getID();
        	        $Musicas = EscalaDAO::EscalaMusicas($search);
	                $inicios[] = 'Inicia assim....';
		
			return self::mountMusicaPopupTab($Musicas,$inicios,true);
		}
		else return array('',''); 
	}
	
	/**
	* Monta o select para selecionar as musicas
	* @return string
	*/
	public static function mountSelectMusicas()
	{
		global $FileText;
		
		$Cifras = MusicaDAO::search();
		
		$return = '';
		foreach($Cifras AS $Cifra)
		{
			$Musica = $Cifra->getMusica();
			
			$return .= '<span class="row-fluid">';
			$return .= '<span class="span1">&nbsp;</span>';
			$return .= '<label>';
				$return .= '<span class="span1"><input type="checkbox" name="musicas[]" value="'.$Musica->getID().'" ></span>';
				$return .= '<span class="span10">'.$Musica->getNome().' (<b>'.$Cifra->getTom().'</b>)</span>';
			$return .= '</label>';
			$return .= '</span>';
		}
		
		return $return;
	}
	
	public static function musicaOpen($id = '')
	{
		if(!isset($_SESSION['id'])) $_SESSION['id'] = $id;
		else
		{
			$ids = explode(',',$_SESSION['id']);
			if(!in_array($id,$ids)) $_SESSION['id'] .= ','.$id;
		}
		$ids = explode(',',$_SESSION['id']);
		$focus = array_search($id,$ids);

		$Musicas = $inicios = '';
		
				foreach($ids as $id)
		{
			$search['musica_id'] = $id;
			$search['with_cifras'] = '';
			if($Cifras = self::search($search))
			{
				foreach($Cifras AS $Cifra)
				{
					$Musicas[] = $Cifra;
							$inicios[] = 'Inicia assim....';
				}
			}
		}
			
		return self::mountMusicaPopupTab($Musicas,$inicios,$focus,false);
	}

	private static function mountMusicaPopupTab($Cifras,$inicios,$focus = 0,$show_order = true)
	{
                $lista = '';
                $musicasDivs = '';
                for($a=0;$a<count($Cifras);$a++)
                {
			$Musica = $Cifras[$a]->getMusica();
                        if($a==$focus) $active = "active";
                        else $active = "";

                        $lista .= '<li class="'.$active.'">';
                        $lista .= '<a href="#tab'.$a.'" data-toggle="tab">';
                        $lista .= '<p class="margin-none"><strong> ';
			if($show_order) $lista .= ($a+1).' - ';
			$lista .= $Musica->getNome().'</strong><br>';
			$lista .= "TOM: ".$Cifras[$a]->getTom().'</strong><br>';
                        $lista .= '<small>'.$inicios[$a].'</small></p>';
                        $lista .= '</a></li>';
                        $musicasDivs .= actionMusica::mountMusica($Cifras[$a],$active,$a);
                }
		
		return array($lista,$musicasDivs);
	}

	
	private static function mountMusica($Cifra,$active,$id){
		$Musica = $Cifra->getMusica();

		$div = '';
		$div .= '<div class="tab-pane '.$active.'" id="tab'.$id.'">';
		$div .= '<h3>'.$Musica->getNome().'</h3>';
		$div .= '<h3>'.$Musica->getAutor().'</h3>';
		$div .= '<p><b>TOM: </b>'.$Cifra->getTom().'</p>';
		$div .= '<div class="innerLR innerT">';
		$div .= self::readXMLCifras($Cifra);
		$div .= '</div>';
		$div .= '</div>';
		
		return $div;
	}

	private static function createTabsArray()
	{
		$tabs = array_fill_keys(self::$tabs_keys,'');
		
		for($a=0;$a<count($tabs);$a++)
		{
			if($a==0) $active = "active";
			else $active = '';

			$tabs[self::$tabs_keys[$a]] .= '<div id="tab'.self::$tabs_keys[$a].'" class="tab-pane '.$active.'">';
			$tabs[self::$tabs_keys[$a]] .= '<div class="slim-scroll" data-scroll-height="250px">';
			$tabs[self::$tabs_keys[$a]] .= '<ul class="list">';
		}

		return $tabs;
	}

	private static function readXMLCifras($Cifra)
	{
		$xml = simplexml_load_string(utf8_encode($Cifra->getTexto()));
		
		$return = '';
		$quant_line = count($xml->line);
		$coluns = 0;
		$row = 0;
		foreach($xml->line as $line)
		{
			if($row==0)
			{
				$return .= '<div class="span6">';
				$coluns++;
			}
			elseif(($row>=($quant_line/2))&& $coluns==1)
			{
				$return .= '</div><div class="span6">';
				$coluns++;
			}
			
			$return .= '<p>';
			if(isset($line->chords) || isset($line->letter))
			{
				if(isset($line->chords) && !empty($line->chords)) $return .= '<b>'.$line->chords.'</b>';
				if(isset($line->letter) && !empty($line->letter))
				{
					if(!empty($line->chords)) $return .= '<br>'.$line->letter;
					else $return .= $line->letter;
				}
			}
			elseif(isset($line->intro) && !empty($line->intro)) $return .= '<b>INTRO:&nbsp;'.$line->intro.'</b>';

			$return .= '</p>';
			
			$row++;
		}
		$return .= '</div>';

		return $return;
	}
}
