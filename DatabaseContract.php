<?php

interface DatabaseContract {
	public function add($table, $item);
	//public function update($table, $item);
	public function select($table);
    // public function edit table
	public function edit($table,$id);
	//public function update($table, $item);
	public function delete($table, $id);
	//public function get($table, $id);
}
?>