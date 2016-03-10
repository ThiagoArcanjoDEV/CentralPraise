<?php
abstract class actionAArea{
	public static function search($search = ""){
		$AArea = AAreaDAO::search($search);
		return $AArea;
	}
}
?>
