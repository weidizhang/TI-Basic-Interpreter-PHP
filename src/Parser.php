<?php
namespace weidizhang\TIBasic;

class Parser
{	
	private $memory;
	
	public function __construct() {
		$this->memory = new Memory();
	}
	
	public function runFile($file) {
		$getFile = file_get_contents($file);		
		$lines = explode("\n", $getFile);
		
		foreach ($lines as $line) {
			$this->runLine($line);
		}
	}
	
	private function runLine($line) {
		$line = trim($line);
		$args = explode(" ", $line);
		
		$cmd = $args[0];
		$cmdArg = ltrim(substr($line, strlen($cmd)));
		
		$altStorageSymbols = array("→" => "-->");
		$line = strtr($line, $altStorageSymbols);
		
		if (strpos($line, "-->") !== false) {
			Syntax\Store::store($line, $this->memory);
		}
		else {
			$cmdClass = "weidizhang\\TIBasic\\Commands\\" . $cmd;
			if (class_exists($cmdClass)) {
				$cmdClass::run($cmdArg, $this->memory);
			}
			else {
				echo $cmdClass . " not found\n";
			}
		}
	}
}
?>