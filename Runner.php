<?php
foreach (array_merge(glob("src/*.php"), glob("src/Commands/*.php"), glob("src/Syntax/*.php")) as $srcFile) {
	require $srcFile;
}

use weidizhang\TIBasic\Parser;

if (isset($argv[1])) {
	$parser = new Parser();
	$parser->runFile($argv[1]);
}
else {
	echo "Usage: php Runner.php file_name.tibasic\n";
}
?>