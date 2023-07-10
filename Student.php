<?php
require_once("Person.php");

class Student extends Person{
	public string $subject;
	public int $fee;


	public function __construct($name, $height, $weight, $dob, $subject, $fee) {
		parent::__construct($name, $height, $weight, $dob);
		$this->subject = $subject;
		$this->fee = $fee;
	}

	public function save(Database $db) {
		$db->add("students", [
			"name" => $this->name,
			"height" => $this->height,
			"weight" => $this->weight,
			"dob" => date('Y-m-d',strtotime($this->dob)),
			"subject" => $this->subject,
			"fee" => $this->fee,
		]);
	}

    public function update(Database $db) {
        $db->update("students", [
            "name" => $this->name,
            "height" => $this->height,
            "weight" => $this->weight,
            "dob" => date('Y-m-d',strtotime($this->dob)),
            "subject" => $this->subject,
            "fee" => $this->fee,
        ], 'id=' . $_POST['id']);
    }

	public function select() {

	}

    public static function find(Database $db, $id) {
        $table = strtolower(Student::class). 's';

        return $db->find($table, $id);
    }

    public static function delete(Database $db, $id) {
        $table = strtolower(Student::class). 's';

        return $db->delete($table, $id);
    }
	
	public static function all(Database $db){
		$table = strtolower(Student::class). 's';
		return $db->select($table);
	}



	public function edit() {
		
	}

	// public static function all(Database $db){
	// 	$table = strtolower(Student::class). 's';
	// 	return $db->edit($table,$id);
	// }
	
}