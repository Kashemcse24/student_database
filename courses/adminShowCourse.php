<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$result = $pdo->query("SELECT * FROM courses_info ");

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
        <div style="margin-top: 40px;" class="col-lg-offset-3 col-md-6">
            <h2 style="text-align: center;">Course History for Admin</h2>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Course Title</th>
                    <th>Course Code</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($courses as $course){
                ?>

                <tr>
                    <td><?php echo $course['title']?></td>
                    <td><?php echo $course['code']?></td>
                    <td><?php
                        if($course['status']==1){
                            echo "Running";
                        }else{
                            echo "Baned";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="singleCourse.php?id=<?=$course['cid']?>" class="btn btn-success">View</a>
                        <a href="courseEdit.php?id=<?=$course['cid']?>" class="btn btn-primary">Edit</a>
                        <a href="parmanentDeleteCourse.php?id=<?=$course['cid']?>" class="btn btn-danger">Delete</a>
                    </td>
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