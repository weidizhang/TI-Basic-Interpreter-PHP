<?php
namespace weidizhang\TIBasic;

class Evaluator
{
	public static function eval($expr, $mem) {
		$expr = self::assignVariables($expr, $mem);
		$expr = self::fixParentheses($expr);
		$expr = self::fixExponents($expr);
		eval("\$result = " . $expr . ";");
		return $result;
	}
	
	private static function assignVariables($expr, $mem) {
		foreach ($mem->variables as $var => $val) {
			$expr = str_replace($var, "(" . $val . ")", $expr);
		}
		
		return $expr;
	}
	
	private static function fixParentheses($expr) {
		$expr = str_replace(" ", "", $expr);
		$expr = str_replace(")(", ")*(", $expr);
		
		$strChars = str_split($expr);
		for ($i = 1; $i < count($strChars) - 1; $i++) {
			$char = $strChars[$i];
			
			if ($char == "(" || $char == ")") {
				$sideIndex = $i - 1;
				if ($char == ")") {
					$sideIndex = $i + 1;
				}
				
				$charOnSide = $strChars[$sideIndex];
				
				if (ctype_digit($charOnSide)) {					
					$multiplyIndex = $sideIndex;
					if ($char == "(") {
						$multiplyIndex++;
					}
					array_splice($strChars, $multiplyIndex, 0, array("*"));
					
					$i++;
				}
			}
		}
		
		return implode("", $strChars);
	}
	
	private static function fixExponents($expr) {
		return str_replace("^", "**", $expr);
	}
}
?>