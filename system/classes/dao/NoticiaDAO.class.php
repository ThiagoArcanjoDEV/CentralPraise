<?php
/**
* class NoticiaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class NoticiaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = "",$period = ""){
		$Noticia = self::mount($objeto);

		$SQL = new SQL;
		$where = null;
		
		if($Noticia->getID()) $where = "noticia_id=".$Noticia->getID();

		if(!empty($period) && !empty($where)) $where .= " AND ";
                switch($period)
                {
                        case 'last':
                                $where = "(noticia_data BETWEEN '".date("Y-m-d")."' AND '".date("Y-m-d",strtotime("+ 30 days"))."')";
                                break;
                }
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT * FROM view_Noticias'.$where." ORDER BY noticia_data DESC";
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Noticia($row);
					$Results[] = $Aux;
				}
			}
			else return false;
		}
		else return false;
		
		if(count(array_filter($Results))==0) return false;
		else return $Results;
	}
	
	/**
	* Adiciona um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function add($objeto){
		$Noticia = self::mount($objeto);
		
		$SQL = new SQL;
		return $Noticia;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Noticia = self::mount($objeto);
		
		$SQL = new SQL;
		return $Noticia;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Noticia = self::mount($objeto);
		
		$SQL = new SQL;
		return $Noticia;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Noticia = new Noticia($objeto);
		return $Noticia;
	}
}
?>
