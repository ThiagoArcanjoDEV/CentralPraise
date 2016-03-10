<?php
abstract class testSearch
{
        public static function test($text,$not_null = true)
	{
		if(!empty($text))
		{
			$words = explode(" ", strtoupper($text));
			$searchWords = array('SELECT','DELETE','UPDATE','INSERT','DROP','DATABASE','ALTER','CREATE','EXECUTE','REFERENCES','TRIGGER','GRANT','LOCK');
			
			for($x = 0,$l = count($words); $x < $l;) {
		        	if(in_array($words[$x++], $searchWords)) return false;
			}
			
			return true;
		}
		elseif($not_null) return true;
		else return false;
	}
}
?>
