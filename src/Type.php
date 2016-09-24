<?php
namespace weidizhang\TIBasic;

class Type
{	
	public static function isString($var) {
		return substr($var, 0, 1) == '"';
	}
	
	public static function getString($var) {
		$str = substr($var, 1);
		if (substr($str, -1) == '"') {
			$str = substr($str, 0, -1);
		}
		
		return $str;
	}
}
?>