<?php
abstract class actionCifra{
	public static function search($search = ""){
		$Cifra = CifraDAO::search($search);
		return $Cifra;
	}
}
?>
