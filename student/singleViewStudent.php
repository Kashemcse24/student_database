<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$result = $pdo->query("SELECT * FROM students WHERE id = ".$_GET['id']);

$students=$result->fetchAll(PDO::FETCH_ASSOC);

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

        <a href="adminShowStudent.php" class="btn btn-default">Admin Student View</a>
        <a href="createStudent.php" class="btn btn-default">Create Student</a>
        <a href="showStudent.php" class="btn btn-default">Show Student</a>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div style="margin-top: 40px;" class="col-lg-offset-4 col-md-4">
            <h2 style="text-align: center;">Single Student View</h2>
            <table class="table table-bordered table-hover table-striped">
                <tbody>

                <?php
                foreach ($students as $student){
                    ?>

                    <tr>
                        <th>Student Name</th>
                        <td><?php echo $student['first_name'].' '.$student['last_name']?></td>
                    </tr>
                    <tr>
                        <th>SEIP ID</th>
                        <td><?php echo $student['seip_id']?></td>
                    </tr>
                    <tr>
                        <th>Date of Birth</th>
                        <td><?php echo $student['dob']?></td>
                    </tr>
                    <tr>
                        <th>Added BY</th>
                        <td><?php echo $student['first_name'].' '.$student['last_name']?></td>
                    </tr>
                    <tr>
                        <th>Added Time</th>
                        <td><?php echo $student['created_date']?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td><?php
                            if($student['status']==1){
                                echo "Present";
                            }else{
                                echo "Absent";
                            }
                            ?>
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