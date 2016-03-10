<?php
/**
* class CifraDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class CifraDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Cifra = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;

		if($Cifra->getID()) $where = "cifra_id=".$Cifra->getID();
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT cifra.* FROM cifra'.$where;
		
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
		$Cifra = self::mount($objeto);
		
		$SQL = new SQL;
		return $Cifra;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Cifra = self::mount($objeto);
		
		$SQL = new SQL;
		return $Cifra;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Cifra = self::mount($objeto);
		
		$SQL = new SQL;
		return $Cifra;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Cifra = new Cifra($objeto);
		return $Cifra;
	}
}
?>
