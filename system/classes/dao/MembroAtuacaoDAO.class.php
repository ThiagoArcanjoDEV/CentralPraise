<?php
/**
* class MembroAtuacaoDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class MembroAtuacaoDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = ""){
		$MembroAtuacao = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;
		
		if($MembroAtuacao->getID()) $where = 'membro_atuacao_id='.$MembroAtuacao->getID();

                $Equipe = $MembroAtuacao->getEquipe();
                if($Equipe->getID())
                {
                        if(!empty($where)) $where .= ' AND ';
                        $where .= 'equipe='.$Equipe->getID().'';
                }
		
                $Membro = $MembroAtuacao->getMembro();
                if($Membro->getID())
                {
                        if(!empty($where)) $where .= ' AND ';
                        $where .= 'membro='.$Membro->getID().'';
                }
		
                $AArea = $MembroAtuacao->getAArea();
                if($AArea->getID())
                {
                        if(!empty($where)) $where .= ' AND ';
                        $where .= 'area='.$AArea->getID().'';
                }
		
		if($MembroAtuacao->getAtuacaoOK()){
			if(!empty($where)) $where .= ' AND ';
			$where .= 'membro_atuacao_ok LIKE "'.$MembroAtuacao->getAtuacaoOK().'"';
		}
		
		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT * FROM view_MembroAtuacao '.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new MembroAtuacao($row);
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
		$MembroAtuacao = self::mount($objeto);
		
		$SQL = new SQL;
		return $MembroAtuacao;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function update($objeto){
		$MembroAtuacao = self::mount($objeto);
		
		$SQL = new SQL;
		return $MembroAtuacao;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$MembroAtuacao = self::mount($objeto);
		
		$SQL = new SQL;
		return $MembroAtuacao;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$MembroAtuacao = new MembroAtuacao($objeto);
		return $MembroAtuacao;
	}
}
?>
