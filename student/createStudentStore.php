<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$createdBy="razu";

$message="";

$seip=$_POST['seipId'];

$stCourses=$_POST['courses'];

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$status = $pdo->query("INSERT INTO students (first_name, last_name, seip_id, dob, created_by, created_date) 
VALUES ('".$_POST['firstName']."', '".$_POST['lastName']."', '".$_POST['seipId']."', '".$_POST['dob']."', '".$createdBy."', CURRENT_TIMESTAMP())");

$statusCourse ="";
if ($status){
    foreach ($stCourses as $course){
        $statusCourse = $pdo->query("INSERT INTO student_course_map (sid, cid, insert_by, insert_date)
        VALUES ('".$seip."', '".$course."', '".$createdBy."', CURRENT_TIMESTAMP())");
    }
if ($statusCourse) {
    $message = "Student has been saved successfully";
}else{
    $message= "Student saved failed try again later";
}
}else{
    $message= "Student saved failed try again later";
}
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

        <a href="adminShowStudent.php" class="btn btn-default">Admin Student View</a>
        <a href="createStudent.php" class="btn btn-default">Create Student</a>
        <a href="showStudent.php" class="btn btn-default">Show Student</a>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div style="margin-top: 40px;" class="col-lg-offset-2 col-md-8">
            <h2 style="text-align: center;"><?php echo $message?></h2>
        </div>
    </div>
</div>

<script src="../src/jquery.min.js"></script>
<script src="../src/bootstrap.js"></script>
</body>
</html>
