<?php
namespace weidizhang\TIBasic\Commands;

abstract class BaseCommand
{
	public static function getInput() {
		$getLine = fgets(STDIN);
		return trim($getLine);
	}
	
	public abstract static function run($arg, $mem);
}
?>