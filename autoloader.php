<?php
function autoloader($class) {
	$class = str_replace("\\", "/", $class);
	$file = __DIR__."/{$class}.php";
	// echo $file . "<br>";
	if (file_exists($file)) {
		require_once $file;
	}
}

spl_autoload_register('autoloader');