<?php 
error_reporting(-1);
require_once 'autoloader.php';

// news/576 - id
if (preg_match('{/news/([0-9]+)}', $_SERVER['REQUEST_URI'], $match) == 1) {
	$controller = new Controllers\News();
	return $controller->actionView($match[1]);
} 

// news/ or / - root
if (preg_match('{^/news/$}', $_SERVER['REQUEST_URI'], $match) == 1 ||
	preg_match('{^/$}', $_SERVER['REQUEST_URI'], $match) == 1) { 		
	$controller = new Controllers\News();
	return $controller->actionList(1);
}

// news/page-2
if (preg_match('{/news/page-([0-9]+)/}', $_SERVER['REQUEST_URI'], $match) == 1) {
	$controller = new Controllers\News();
	return $controller->actionList($match[1]);
}
