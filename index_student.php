<?php require_once("Person.php");
require_once("Student.php");
require_once("config.php");
require_once("Mysql.php");
require_once("Json.php");?>
<?php 

$db = new $config['database'];
$students = Student::all($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Crud</title>


</head>
<body>
    <div class="container my-5">
        <h2>List of Students</h2>
        <a class="btn btn-primary" href="/OOP_crud2/creat_student.php" role="button">New Student</a>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Date of Birth</th>
                <th>Subject</th>
                <th>Fee</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                <!-- connecting this page with database -->
                <?php
                foreach($students as $student)
                {
                    echo "
                    <tr>
                <td>$student[id]</th>
                <td>$student[name]</td>
                <td>$student[height]</td>
                <td>$student[weight]</td>
                <td>$student[dob]</td>
                <td>$student[subject]</td>
                <td>$student[fee]</td>
                <td>
                <a class='btn btn-primary btn-sm' href='/OOP_crud2/update_student.php?id=$student[id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/OOP_crud2/delete_student.php?id=$student[id]'>Delete</a>
                </td>
            </tr>
                    ";
                }
                ?>
            
            </tbody>
        </table>

    </div>
</body>
</html>