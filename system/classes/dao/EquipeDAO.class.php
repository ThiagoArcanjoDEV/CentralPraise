<?php
/**
* class EquipeDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class EquipeDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Equipe = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;
		
		if($Equipe->getID()) $where = "equipe_id=".$Equipe->getID();
		
                $Igreja = $Equipe->getIgreja();
                if($Igreja->getNome())
                {
                        if(!empty($where)) $where .= ' OR ';
                        $where .= '(equipe_nome LIKE "%'.$Equipe->getNome().'%")';
                }
		
                if($Igreja->getID())
                {
                        if(!empty($where)) $where = '('.$where.') AND ';
                        $where .= '(igreja = '.$Igreja->getID().')';
                }
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT * FROM view_Equipes '.$where.';';
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Equipe($row);
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
		$Equipe = self::mount($objeto);
		
		$SQL = new SQL;
		return $Equipe;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Equipe = self::mount($objeto);
		
		$SQL = new SQL;
		return $Equipe;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Equipe = self::mount($objeto);
		
		$SQL = new SQL;
		return $Equipe;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Equipe = new Equipe($objeto);
		return $Equipe;
	}
}
?>
