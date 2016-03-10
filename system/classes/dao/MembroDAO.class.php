<?php
/**
* class MembroDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class MembroDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Membro = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;
		
		if($Membro->getID()) $where = "membro_id=".$Membro->getID();
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT membro.* FROM membro'.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Membro($row);
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
	* @param Array
	* @return boolean
	**/
	public static function add($objeto){
		$Membro = self::mount($objeto);
		
		$SQL = new SQL;
		return $Membro;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function update($objeto){
		$Membro = self::mount($objeto);
		
		$SQL = new SQL;
		if($Membro->getID())
		{
			$where = "WHERE membro_id=".$Membro->getID().";";

			if($Membro->getNome()) $coluns[] = 'membro_nome="'.$Membro->getNome().'"';
			if($Membro->getTag()) $coluns[] = 'membro_tag="'.$Membro->getTag().'"';
			if($Membro->getTel()) $coluns[] = 'membro_tel="'.$Membro->getTel().'"';
			if($Membro->getCel()) $coluns[] = 'membro_cel="'.$Membro->getCel().'"';
			if($Membro->getEmail()) $coluns[] = 'membro_email="'.$Membro->getEmail().'"';
			
			$query = '';
			foreach($coluns as $colun)
			{
				if($query!='') $query .= ',';
				$query .= $colun;
			}

			$query = 'UPDATE membro SET '.$query.' '.$where;

			if($SQL->query($query)) return true;
			else return false;
		}
		else return false;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param Array
	* @return Boolean
	**/
	public static function delete($objeto){
		$Membro = self::mount($objeto);
		
		$SQL = new SQL;
		return $Membro;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param Array
	* @return object
	**/
	public static function mount($objeto){
		$Membro = new Membro($objeto);
		return $Membro;
	}
}
?>
