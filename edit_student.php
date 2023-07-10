<?php

require_once("Person.php");
require_once("Student.php");
require_once("config.php");
require_once("Mysql.php");
require_once("Json.php");
$errors = array();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST["name"];
        $height = $_POST["height"];
        $weight = $_POST["weight"];
        $dob = $_POST["dob"];
        $subject = $_POST["subject"];
        $fee = $_POST["fee"];

        // if (empty($name) || empty($height) || empty($weight) || empty($dob) || empty($subject) || empty($fee)) {
        if (empty($name)) {
            $errors[] = "Name is required.";
        }

        if (empty($height)) {
            $errors[] = "Height is required.";
        }

        if (empty($weight)) {
            $errors[] = "Weight is required.";
        }

        if (empty($dob)) {
            $errors[] = "Date of Birth is required.";
        }

        if (empty($subject)) {
            $errors[] = "Subject is required.";
        }

        if (empty($fee)) {
            $errors[] = "Fee is required.";
        }


        if (count($errors) > 0) {
            // Display validation errors as a div element
            echo '<div class="alert alert-warning alert-dismissible text-center" role="alert">';
            foreach ($errors as $error) {
                echo $error . '<br>';
            }
            echo '</div>';


            die(var_export("Please go back and fill all the fileds"));
        } else {
            $student = new Student($name, $height, $weight,  $dob, $subject, $fee);
            $db = new $config['database'];
            $id = $student->update($db);
            header('location:/OOP_crud2/index_student.php');
            die("Student Updated Successfully!");
        }
    }
} catch (Throwable $e) {
    /**
     * Catch Exception and show in the browser
     */
    die(var_export($e->getMessage()));
}
