<?php
namespace weidizhang\TIBasic\Commands;

class Prompt extends BaseCommand
{
	public static function run($arg, $mem) {
		$eachPrompt = explode(",", $arg);
		
		foreach ($eachPrompt as $varName) {
			$varName = trim($varName);
			
			$varValue = "";			
			while (empty($varValue)) {
				echo $varName . "=?";
				$varValue = trim(self::getInput());
			}
			
			$mem->variables[$varName] = $varValue;
		}
	}
}
?>