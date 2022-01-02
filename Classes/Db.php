<?php
namespace Classes;

class Db 
{
	private static $db;

	public static function connection() 
	{
		$dbConfig = include_once('./dbConfig.php');
			if (is_null(self::$db)) {
				self::$db = new \PDO('mysql:host=' .$dbConfig['host'] .';dbname=' .$dbConfig['dbName'] . ';charset=UTF8', $dbConfig['user'], $dbConfig['password']);
			}
			return self::$db;			
	}
}
