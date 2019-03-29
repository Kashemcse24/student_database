<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$createdBy="razu";

$message="";

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$status = $pdo->query("DELETE FROM courses_info WHERE cid = ".$_GET['id']);

if ($status){
    $message= "Course has been deleted successfully";
}else{
    $message= "Course delete failed try again later";
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

        <a href="adminShowCourse.php" class="btn btn-default">Admin Course View</a>
        <a href="createCourse.html" class="btn btn-default">Create Course</a>
        <a href="showCourse.php" class="btn btn-default">Course View</a>
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
