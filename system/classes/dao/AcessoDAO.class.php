<?php
/**
* class AcessoDAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
* @see		DAO
*/
abstract class AcessoDAO implements DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param Array
	* @return Array
	**/
	public static function search($objeto = ""){
		$Acesso = self::mount($objeto);
		
		$SQL = new SQL;
		$where = null;

		if($Acesso->getID()) $where = "acesso_id=".$Acesso->getID();
		
		if($Acesso->getLogin())
		{
                        if(!empty($where)) $where .= ' AND ';
                        $where .= '(acesso_login LIKE "'.$Acesso->getLogin().'")';
		}	

		if(!empty($where)) $where = " WHERE ".$where;
		$query = 'SELECT * FROM view_Acessos '.$where;
		
		if($SQL->query($query)){
			if($SQL->numRows()>0){
				while($row = $SQL->fetchArray()){
					$Aux = new Acesso($row);
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
	* Retorna a senha do acesso solicitado
	* 
	* @param object Acesso
	* @return String
	**/
	public static function getPassword(Acesso $Acesso)
	{
		if($Acesso)
		{
			$SQL = new SQL;
			$where = '';

			if($Acesso->getID()) $where = "acesso_id=".$Acesso->getID();
			
			if($Acesso->getLogin())
			{
	                        if(!empty($where)) $where .= ' AND ';
                        	$where .= '(acesso_login LIKE "'.$Acesso->getLogin().'")';
			}

			if(!empty($where)) $where = " WHERE ".$where;
			$query = 'SELECT acesso_senha FROM acesso '.$where;
		
			if($SQL->query($query)){
				if($SQL->numRows()>0){
					$aux = $SQL->fetchArray();
					return $aux["acesso_senha"];
				}
				else return false;
			}
			else return false;
		}
		else return false;
	}
	
	/**
	* Adiciona um objeto no BD
	* 
	* @param object
	* @return boolean
	**/
	public static function add($objeto){
		$Acesso = self::mount($objeto);
		
		$SQL = new SQL;
		return $Acesso;
	}
	
	/**
	* Modifica um objeto no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function update($objeto){
		$Acesso = self::mount($objeto);
		
		$SQL = new SQL;
		if($Acesso->getID())
		{
			$where = "WHERE acesso_id=".$Acesso->getID().";";

			if($Acesso->getLogin()) $coluns[] = 'acesso_login="'.$Acesso->getLogin().'"';
			if($Acesso->getSenha()) $coluns[] = 'acesso_senha="'.$Acesso->getSenha().'"';
			if($Acesso->getAcessoIgreja()) $coluns[] = 'acesso_igreja="'.$Acesso->getAcessoIgreja().'"';
			if($Acesso->getAcessoArea()) $coluns[] = 'acesso_area="'.$Acesso->getAcessoArea().'"';
			if($Acesso->getAcessoMembro()) $coluns[] = 'acesso_membro="'.$Acesso->getAcessoMembro().'"';
			if($Acesso->getAcessoEquipe()) $coluns[] = 'acesso_equipe="'.$Acesso->getAcessoEquipe().'"';
			if($Acesso->getAcessoMusica()) $coluns[] = 'acesso_musica="'.$Acesso->getAcessoMusica().'"';
			if($Acesso->getAcessoEscala()) $coluns[] = 'acesso_escala="'.$Acesso->getAcessoEscala().'"';
			if($Acesso->getAcessoAcesso()) $coluns[] = 'acesso_acesso="'.$Acesso->getAcessoAcesso().'"';
			
			$query = '';
			foreach($coluns as $colun)
			{
				if($query!='') $query .= ',';
				$query .= $colun;
			}

			$query = 'UPDATE acesso SET '.$query.' '.$where;
			
			if($SQL->query($query))
			{
				$Acesso = self::search($objeto);
				return $Acesso[0];
			}
			else return false;
		}
		else return false;
	}
	
	/**
	* Remove um objeto do BD
	* 
	* @param object
	* @return Boolean
	**/
	public static function delete($objeto){
		$Acesso = self::mount($objeto);
		
		$SQL = new SQL;
		return $Acesso;
	}
	
	/**
	* Monta o objeto relacionado
	* 
	* @param object
	* @return object
	**/
	public static function mount($objeto){
		$Acesso = new Acesso($objeto);
		return $Acesso;
	}
}
?>
