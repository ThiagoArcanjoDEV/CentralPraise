<?php
abstract class dataFormat{
	public static function format($data,$format = ""){
		switch($format){
			case 'Y-m-d':
				$pos = strpos($data, '-');
				if ($pos === false) {
					$aux = explode(' ',$data);
					$aux[0] = explode('/',$aux[0]);
					if(!empty($aux[1])) $aux[1] = ' '.$aux[1];
					
					if(!isset($aux[1])) $aux[1] = '';
					return $aux[0][2].'-'.$aux[0][1].'-'.$aux[0][0].''.$aux[1];
				}
				else return $data;
				break;
			case 'd/m/Y':
				$pos = strpos($data, '/');
				if ($pos === false) {
					$aux = explode(' ',$data);
					$aux[0] = explode('-',$aux[0]);
					if($aux[1]){
						$aux[1] = explode(':',$aux[1]);
						$aux[1] = ' '.$aux[1][0].':'.$aux[1][1];
					}
					else $aux[1] = '';
					if(isset($aux[0][2])) return $aux[0][2].'/'.$aux[0][1].'/'.$aux[0][0].''.$aux[1];
					else return '';
				}
				else return substr($data,0,16);
				break;
			case 'HH:ii':
				$aux = explode(' ',$data);
                                if($aux[1])
				{
                                	$aux[1] = explode(':',$aux[1]);
                                        $aux[1] = $aux[1][0].':'.$aux[1][1];
                               	}
				
				return $aux[1];
				break;
			default:
				return $data;
				break;
		}
	}
	
	public static function stringToNumber($data){
		switch($data){
			case 'Jan':
				return 1;
				break;
			case 'Feb':
				return 2;
				break;
			case 'Mar':
				return 3;
				break;
			case 'Apr':
				return 4;
				break;
			case 'May':
				return 5;
				break;
			case 'Jun':
				return 6;
				break;
			case 'Jul':
				return 7;
				break;
			case 'Aug':
				return 8;
				break;
			case 'Sep':
				return 9;
				break;
			case 'Oct':
				return 10;
				break;
			case 'Nov':
				return 11;
				break;
			case 'Dec':
				return 12;
				break;
		}
	}
}
?>
