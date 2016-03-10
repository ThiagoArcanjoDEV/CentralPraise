<?php
abstract class actionMembro{
	public static function search($search = "")
	{
		$Membro = MembroDAO::search($search);
		return $Membro;
	}
	
	/**
	* Prepara um array para alterar dados no BD
	* 
	* @param Array
	* @return boolean
	**/
	public static function update($post)
	{
		if(isset($post['member_id']))
		{
			$update['membro_id'] = (testSearch::test($post['member_id']))? $post['member_id'] : false;
			$update['membro_nome'] = (testSearch::test($post['member_name']))? $post['member_name'] : false;
			$update['membro_tag'] = (testSearch::test($post['member_tag']))? $post['member_tag'] : false;
			$update['membro_tel'] = (testSearch::test($post['member_tel']))? $post['member_tel'] : false;
			$update['membro_cel'] = (testSearch::test($post['member_cel']))? $post['member_cel'] : false;
			$update['membro_email'] = (testSearch::test($post['member_email']))? $post['member_email'] : false;
		}
		
		return MembroDAO::update($update);
	}
}
?>
