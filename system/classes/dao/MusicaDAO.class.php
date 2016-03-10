<?php
/**
* class MusicaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class MusicaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Musica = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;
		
		if($Musica->getID()) $where = "musica_id=".$Musica->getID();

		if(!isset($objeto['with_cifras']))
		{
			if(!empty($where)) $where .= ' AND ';
			$where .= ' (cifra_padrao IS NULL)';
		}
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT * FROM view_Musicas'.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Cifra($row);
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
		$Musica = self::mount($objeto);
		
		$SQL = new SQL;
		return $Musica;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Musica = self::mount($objeto);
		
		$SQL = new SQL;
		return $Musica;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Musica = self::mount($objeto);
		
		$SQL = new SQL;
		return $Musica;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Musica = new Musica($objeto);
		return $Musica;
	}
}
?>
