<?php
/**
* class AAreaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class AAreaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$AArea = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;

		if($AArea->getID()) $where = "area_id=".$AArea->getID();
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT area.* FROM area'.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new AArea($row);
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
		$AArea = self::mount($objeto);
		
		$SQL = new SQL;
		return $AArea;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$AArea = self::mount($objeto);
		
		$SQL = new SQL;
		return $AArea;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$AArea = self::mount($objeto);
		
		$SQL = new SQL;
		return $AArea;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$AArea = new AArea($objeto);
		return $AArea;
	}
}
?>
