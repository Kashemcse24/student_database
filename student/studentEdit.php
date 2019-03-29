<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$result = $pdo->query("SELECT * FROM students WHERE id = ".$_GET['id']);

$student=$result->fetch(PDO::FETCH_ASSOC);;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Form</title>

    <link href="../src/bootstrap.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top ">
    <div style="text-align: center; margin-top: 8px;" class="container">
        <a href="../index.php" class="btn btn-default">Dash Board</a>

        <a href="adminShowStudent.php" class="btn btn-default">Admin View</a>
        <a href="createStudent.php" class="btn btn-default">Create Student</a>
        <a href="showStudent.php" class="btn btn-default">Show Student</a>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div style="margin-top: 40px;" class="col-lg-offset-4 col-md-4">
            <h2 style="text-align: center;">Edit Student</h2>

            <form action="editStudentStore.php" method="post">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" id="firstName" name="firstName" value="<?=$student['first_name']?>" placeholder="Enter Your First Name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" id="lastName" name="lastName" value="<?=$student['last_name']?>" placeholder="Enter Your Last Name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="seipId">SEIP ID</label>
                    <input type="text" id="seipId" name="seipId" value="<?=$student['seip_id']?>" placeholder="Enter Your SEIP ID" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob" value="<?=$student['dob']?>" class="form-control">
                </div>

                <input type="hidden" name="id" value="<?=$student['id']?>">
                <button type="submit" class="btn btn-success">Edit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </form>
        </div>
    </div>
</div>

<script src="../src/jquery.min.js"></script>
<script src="../src/bootstrap.js"></script>
</body>
</html>