<?php require_once("Person.php");
require_once("Student.php");
require_once("config.php");
require_once("Mysql.php");
require_once("Json.php");?>
<?php

$db = new $config['database'];
$id = $_GET['id'];
try {
    $student = Student::delete($db, $id);
    header('location:/OOP_crud2/index_student.php');

} catch (Throwable $e) {
    die(var_export($e->getMessage()));
}
?>
