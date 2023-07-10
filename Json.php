<?php

require_once("Database.php");

class Json extends Database {

	public function __construct() {
		$this->db = "json_data.json";
	}

	public function add($table, $item) {
		$data = json_decode(file_get_contents($this->db), 1);
		$data[$table][] = $item;
		file_put_contents($this->db, json_encode($data));
	}
	public function select($table) {
		$data = json_decode(file_get_contents($this->db), 1);
		return $data;
	}
	public function edit($table, $id) {
		$data = json_decode(file_get_contents($this->db), true);
		$data[$table][$id] = $data; // update the record
		file_put_contents($this->db, json_encode($data));
	  }

	public function delete($table, $id) {
		$data = json_decode(file_get_contents($this->db), 1);
		unset($data[$table][$id]);
		file_put_contents($this->db, json_encode($data));
	}
}