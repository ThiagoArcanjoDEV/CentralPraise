<?php
/**
* class AgendaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class AgendaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Agenda = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;

		if($Agenda->getID()) $where = "agenda_id=".$Agenda->getID();
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT agenda.* FROM agenda'.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Agenda($row);
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
		$Agenda = self::mount($objeto);
		
		$SQL = new SQL;
		return $Agenda;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Agenda = self::mount($objeto);
		
		$SQL = new SQL;
		return $Agenda;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Agenda = self::mount($objeto);
		
		$SQL = new SQL;
		return $Agenda;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Agenda = new Agenda($objeto);
		return $Agenda;
	}
}
?>
