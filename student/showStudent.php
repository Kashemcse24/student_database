<?php

$hostname='localhost';
$username='root';
$password='';
$dbName='student_info';

$pdo = new PDO("mysql:host=$hostname;dbname=$dbName",$username,$password);

$result = $pdo->query("SELECT st.first_name, st.last_name, st.seip_id, st.dob, st.created_by, st.created_date, st.status, cif.title
FROM students as st, courses_info as cif, student_course_map as scm 
WHERE st.seip_id = scm.sid AND cif.cid = scm.cid AND st.status = 1 ");

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
        <div style="margin-top: 40px;" class="col-lg-offset-1 col-md-10">
            <h2 style="text-align: center;">Student History</h2>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>SEIP ID</th>
                    <th>Date of Birth</th>
                    <th>Added BY</th>
                    <th>Added Time</th>
                    <th>Status</th>
                    <th>Courses</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php
                foreach ($students as $student){
                ?>

                <tr>
                    <td><?php echo $student['first_name'].' '.$student['last_name']?></td>
                    <td><?php echo $student['seip_id']?></td>
                    <td><?php echo $student['dob']?></td>
                    <td><?php echo $student['created_by']?></td>
                    <td><?php echo $student['created_date']?></td>
                    <td><?php
                        if($student['status']==1){
                            echo "Present";
                        }else{
                            echo "Absent";
                        }
                        ?>
                    </td>
                    <td><?php echo $student['title']?></td>
                    <td>
                        <a href="singleViewStudent.php?id=<?=$student['id']?>" class="btn btn-success">View</a>
                        <a href="studentEdit.php?id=<?=$student['id']?>" class="btn btn-primary">Edit</a>
                        <a href="softDeleteStudent.php?id=<?=$student['id']?>" class="btn btn-danger">Delete</a>
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