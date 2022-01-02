<?php
namespace Models;

use \PDO;

class News 
{
	private $listItems;
	private $listItemsRow;
	private $entriesAmount;
	private $tableName;
	private $detail;

	public function __construct() {}

	public function selectList($start, $amount, $tableName) 
	{
		$this->tableName = $tableName;
		$db = \Classes\Db::connection();
		$this->listItems = $db->prepare("SELECT * FROM $this->tableName ORDER BY idate DESC LIMIT :start, :amount ");
		$this->listItems->bindValue(':start', $start, PDO::PARAM_INT);
		$this->listItems->bindValue(':amount', $amount, PDO::PARAM_INT);
		$this->listItems->execute();
		return $this->listItems->fetchAll(PDO::FETCH_ASSOC);
	}

	public function count($tableName) 
	{
		$this->tableName = $tableName;
		$db = \Classes\Db::connection();
		return $db->query("SELECT COUNT(*) FROM $this->tableName");
	}

	public function selectDetail($id, $tableName) 
	{
		$this->tableName = $tableName;
		$db = \Classes\Db::connection();
		$this->detail = $db->prepare("SELECT title, content FROM $this->tableName WHERE id = ? ");
		$this->detail->execute([$id]);
		return $this->detail->fetch(PDO::FETCH_LAZY); 
	}
}
