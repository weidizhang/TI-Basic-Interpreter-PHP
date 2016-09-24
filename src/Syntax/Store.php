<?php
namespace weidizhang\TIBasic\Syntax;

class Store
{
	public static function store($line, $mem) {		
		$line = explode("-->", $line);
			
		if (count($line) == 2) {
			$var = trim($line[1]);
			$val = trim($line[0]);
			
			if (\weidizhang\TIBasic\Type::isString($val)) {
				$val = \weidizhang\TIBasic\Type::getString($val);
			}
			else {
				$val = \weidizhang\TIBasic\Evaluator::eval($val, $mem);
			}
			
			$mem->variables[$var] = $val;
		}
	}
}
?>