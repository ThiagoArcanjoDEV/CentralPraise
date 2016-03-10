<?php
/**
* class EscalaDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class EscalaDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$Escala = new Escala();
		if(!empty($objeto)){
			if(is_array($objeto)) $Escala = self::mount($objeto);
			elseif($objeto=='next') $date = '>= "'.date('Y-m-d 00:00:00').'"';
			elseif($objeto=='before') $date = '<= "'.date('Y-m-d 00:00:00').'"';
			elseif($objeto=='today') $date = 'LIKE "'.date('Y-m-d 00:00:00').'"';
		}
		
		$SQL = new SQL;
		$where = null;
		
		if($Escala->getID()) $where = "escala_id=".$Escala->getID();
		else
		{
			if($Escala->getObs())
			{
				if(!empty($where)) $where .= ' OR ';
				$where .= '(escala_obs LIKE "%'.$Escala->getObs().'%")';
			}
	
			$Equipe = $Escala->getEquipe();
			if($Equipe->getNome())
			{
				if(!empty($where)) $where .= ' OR ';
				$where .= '(equipe_nome LIKE "%'.$Equipe->getNome().'%")';
			}
	
			$Igreja = $Equipe->getIgreja();
			if($Igreja->getNome())
			{
				if(!empty($where)) $where .= ' OR ';
				$where .= '(igreja_nome LIKE "%'.$Igreja->getNome().'%")';
			}
	
			if($Agenda = $Escala->getAgenda())
			{
				if($Agenda->getNome())
				{
					if(!empty($where)) $where .= ' OR ';
					$where .= '(agenda_nome LIKE "%'.$Agenda->getNome().'%")';
				}
				if($Agenda->getObs())
				{
					if(!empty($where)) $where .= ' OR ';
					$where .= '(agenda_obs LIKE "%'.$Agenda->getObs().'%")';
				}
				
				if($Agenda->getData())
				{
					if(!empty($where)) $where .= ' OR ';
					$date = $Agenda->getData('Y-m-d');
					$date = explode(' ',$date);
					$date = $date[0];
					$where .= '(agenda_data BETWEEN "'.$date.' 00:00:00" AND "'.$date.' 23:59:59")';
					unset($date);
				}
			}
			
			if($Igreja->getID())
			{
				if(!empty($where)) $where = '('.$where.') AND ';
				$where .= '(igreja = '.$Igreja->getID().')';
			}
			
			if(isset($date)){
				if(!empty($where)) $where .= ' AND ';
				$where .= '(agenda_data '.$date.')';
			}
		}
		
		if(!empty($where)) $where = ' WHERE '.$where.' ';
		$query = 'SELECT * FROM view_Escalas '.$where.';';
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Escala($row);
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
	* Procura por Membros escalados
	* 
	* @param object
	* @return Array
	**/
	public static function EscalaMembroAtuacao($search = ""){
		$SQL = new SQL;
		$where = " WHERE escala=".$search['escala'];
		$query = 'SELECT ema.* FROM escala_membro_atuacao as ema'.$where.'';
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Results['membro_atuacao_id'][] = $row['membro_atuacao'];
				}
			}
			else return false;
		}
		else return false;
		
		if(count(array_filter($Results))==0) return false;
		else return $Results;
	}
	
	/**
	* Procura por Musicas da escala
	* 
	* @param object
	* @return Array
	**/
	public static function EscalaMusicas($search = ""){
		$SQL = new SQL;
		$where = " WHERE escala_id=".$search['escala'];
		$query = 'SELECT * FROM view_EscalaMusicas'.$where.'';
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Cifra = new Cifra($row);
					$Results[] = $Cifra;
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
		$Escala = self::mount($objeto);
		
		$SQL = new SQL;
		return $Escala;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$Escala = self::mount($objeto);
		
		$SQL = new SQL;
		return $Escala;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Escala = self::mount($objeto);
		
		$SQL = new SQL;
		return $Escala;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Escala = new Escala($objeto);
		return $Escala;
	}
}
?>
