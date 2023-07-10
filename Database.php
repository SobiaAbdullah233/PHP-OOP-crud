<?php

require_once("DatabaseContract.php");

abstract class Database implements DatabaseContract {
	// protected $db;
	protected $db;

	public function getDb() {
		return $this->db;
	}
}
?>