<?php

require_once("Database.php");

class Mysql extends Database {

	public function __construct() {
		$this->db = mysqli_connect("127.0.0.1", "root", "", "oop_crud");
//		$this->db = mysqli_connect("172.17.0.1", "root", "NodeSol786", "oop_curd");
	}

	// public function add($table, $item) {
	// 	$fields = implode(", ", array_keys($item));
	// 	$values = implode(", ", $item);
	// 	return $this->db->query("INSERT INTO {$table} ({$fields}) VALUES ({$values})");
	
	function add($table, $data)
	{
	  $query = "INSERT INTO {$table} ";
	  $data = $this->computeFieldsValues($data);
	  $fields = implode(",", $data['fields']);
	  $values = implode(",", $data['values']);
	  $query .= " ({$fields}) VALUES {$values}";
	  $this->db->query($query);
	  return $this->db->insert_id;
	}

function computeFieldsValues($data)
  {
    $fields = [];
    $values = [];
    if (isset($data[0]) && is_array($data[0])) {
      $fields = array_keys($data[0]);
      foreach ($data as $row) {
        $values[] = "('" . implode("', '", array_values($data)) . "')";
      }
    }
	 else {
      $fields = array_keys($data);
      $values[] = "('" . implode("', '", array_values($data)) . "')";
    }
    return ["fields" => $fields, "values" => $values];
  }

  public function select($table)  
  {  
	   $array = array();  
	   $query = "SELECT * FROM {$table}";  
	   $result = mysqli_query($this->db, $query);  
	   while($row = mysqli_fetch_assoc($result))  
	   {  
			$array[] = $row;  
	   }  
	   return $array;  
  }
  public function  edit($table, $id)
  {
      // TODO: Implement edit() method.
  }

    public function find($table, $id) {
        $query = "SELECT * FROM {$table} where id = {$id}";
        $result = mysqli_query($this->db, $query);
        return mysqli_fetch_assoc($result);

    }

	function update($table, $data, $condition)
		{
		$query = "UPDATE {$table} SET ";
//		$data = $this->computeFieldsValues($data);
		$sets = [];
//        die(var_export($data));
		foreach($data as $index => $field) {
			$sets[] = "{$index} = '{$field}'";
		}
		$query .= implode(", ", $sets);
		$query .= " WHERE {$condition}";
//        die(var_export($query));
		$this->db->query($query);
		return $this->db->affected_rows;
		}

	public function delete($table, $id) {
		return $this->db->query("DELETE FROM {$table} WHERE id='".$id."'");
	}
}
