<?php
namespace weidizhang\TIBasic\Commands;

use weidizhang\TIBasic\Evaluator;
use weidizhang\TIBasic\Type;

class Disp extends BaseCommand
{
	public static function run($arg, $mem) {
		if (Type::isString($arg)) {
			echo Type::getString($arg) . "\n";
		}
		else {
			echo Evaluator::eval($arg, $mem) . "\n";
		}
	}
}
?>