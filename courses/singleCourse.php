<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$result = $pdo->query("SELECT * FROM courses_info WHERE cid=".$_GET['id']);

$courses=$result->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Management</title>

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
        <div style="margin-top: 40px;" class="col-lg-offset-4 col-md-4">
            <h2 style="text-align: center;">Single Course View</h2>
            <table class="table table-bordered table-hover table-striped">
                <tbody>

                <?php
                foreach ($courses as $course){
                    ?>

                    <tr>
                        <th>Course Title</th>
                        <td><?php echo $course['title']?></td>
                    </tr>
                    <tr>
                        <th>Course Code</th>
                        <td><?php echo $course['code']?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="../src/jquery.min.js"></script>
<script src="../src/bootstrap.js"></script>
</body>
</html>