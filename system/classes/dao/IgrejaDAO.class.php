<?php
/**
* class IgrejaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class IgrejaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Igreja = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;
		
		if($Igreja->getID()) $where = "igreja_id=".$Igreja->getID();
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT igreja.* FROM igreja'.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Igreja($row);
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
		$Igreja = self::mount($objeto);
		
		$SQL = new SQL;
		return $Igreja;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Igreja = self::mount($objeto);
		
		$SQL = new SQL;
		return $Igreja;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Igreja = self::mount($objeto);
		
		$SQL = new SQL;
		return $Igreja;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Igreja = new Igreja($objeto);
		return $Igreja;
	}
}
?>
