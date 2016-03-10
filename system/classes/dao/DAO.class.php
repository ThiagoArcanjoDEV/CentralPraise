<?php
/**
* interface DAO
* 
* Interface com metodos comuns a todas as demais classes DAO
* 
* @author 	Thiago Arcanjo
* 
* @package	Class
* @subpackage	Object
* @access 	public
*/
interface DAO{
	/**
	* Procura por dados conforme solicitado no BD
	* 
	* @param object
	* @return Array
	**/
	public static function search($objeto = "");
	
	/**
	* Adiciona um objeto no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function add($objeto);
	
	/**
	* Modifica um objeto no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function update($objeto);
	
	/**
	* Remove um objeto do BD
	* 
	* @param Array
	* @return Boolean
	**/
	public static function delete($objeto);
	
	/**
	* Monta o objeto relacionado
	* 
	* @param Array
	* @return object
	**/
	public static function mount($objeto);
}
?>
