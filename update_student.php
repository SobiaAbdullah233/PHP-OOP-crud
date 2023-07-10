<?php require_once("Person.php");
require_once("Student.php");
require_once("config.php");
require_once("Mysql.php");
require_once("Json.php");?>
<?php

$db = new $config['database'];
$id = $_GET['id'];
try {
    $student = Student::find($db, $id);
} catch (Throwable $e) {
    die(var_export($e->getMessage()));
}

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>My Crud</title>
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h2>Edit Student</h2>
        <div class="row">
            <div class="col-md-6 ">
                <form method="post" action="edit_student.php">
                    <div class="mb-3 mt-3">
                        <label for="name" class="form-label text-white">Name:</label>
                        <input type="hidden" class="form-control bg-light"  name="id" value="<?= $student['id']?>">
                        <input type="name" class="form-control bg-light" id="name" placeholder="Enter Name" name="name" value="<?= $student['name']?>">
                    </div>

                    <div class="mb-3">
                        <label for="height" class="form-label  text-white">Height:</label>
                        <input type="text" class="form-control bg-light" id="height" placeholder="Enter Height" name="height" value="<?= $student['height']?>">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label  text-white">Weight:</label>
                        <input type="text" class="form-control bg-light" id="weight" placeholder="Enter Weight" name="weight" value="<?= $student['weight']?>" >
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label  text-white">Date Of Birth:</label>
                        <input type="dateTime" class="form-control bg-light" id="dob" placeholder="Enter Date of Birth" name="dob" value="<?= $student['dob']?>">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label  text-white">Subject:</label>
                        <input type="text" class="form-control bg-light" id="subject" placeholder="Enter Studying Course" name="subject" value="<?= $student['subject']?>">
                    </div>
                    <div class="mb-3">
                        <label for="fee" class="form-label  text-white">Fee:</label>
                        <input type="number" class="form-control bg-light" id="fee" placeholder="Enter Monthly Fee" name="fee" value="<?= $student['fee']?>">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-outline-primary  text-white bg-info" role="button"><a href="/OOP_crud2/creat_student.php">Cancle</a></button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>