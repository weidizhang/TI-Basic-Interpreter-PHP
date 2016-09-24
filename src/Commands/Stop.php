<?php
namespace weidizhang\TIBasic\Commands;

class Stop extends BaseCommand
{
	public static function run($arg, $mem) {
		die();
	}
}
?>