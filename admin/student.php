 <?php
    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            include "../db_connection.php";
            include "data/student.php";
            $students = getAllStudents($conn);

    ?>
         <!DOCTYPE html>
         <html lang="en">

         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Admin - Students</title>
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="icon" href="../logo.png">
             <script src="../js/jquery-3.6.0.js"></script>
         </head>

         <body>
             <?php
                include "inc/navbar.php";
                if ($students != 0) {

                ?>

                 <div class="container mt-5">
                     <a href="student-add.php" class="btn btn-dark">
                         Add New Student
                     </a>
                     <?php
                        if (isset($_GET['error'])) { ?>
                         <div class="alert alert-danger mt-5 n-table" role="alert">
                             <?= $_GET['error'] ?>
                         </div>
                     <?php
                        }
                        ?>
                     <?php
                        if (isset($_GET['success'])) { ?>
                         <div class="alert alert-success mt-5 n-table" role="alert">
                             <?= $_GET['success'] ?>
                         </div>
                     <?php
                        }
                        ?>
                     <div class="table-responsive">
                         <table class="table table-bordered mt-3 n-table">
                             <thead>
                                 <tr>
                                     <th scope="col">#</th>
                                     <th scope="col">ID</th>
                                     <th scope="col">First Name</th>
                                     <th scope="col">Last Name</th>
                                     <th scope="col">Username</th>
                                     <th scope="col">Subject</th>
                                     <th scope="col">Grade</th>
                                     <th scope="col">Action</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <?php
                                    $i = 0;
                                    foreach ($students as $students) {
                                        $i++
                                    ?>
                                     <tr>
                                         <th scope="row"><?= $i ?></th>
                                         <td><?= $students['student_id'] ?></td>
                                         <td><?= $students['fname'] ?></td>
                                         <td><?= $students['lname'] ?></td>
                                         <td><?= $students['username'] ?></td>
                                         <td><?= $students['subjects'] ?></td>
                                         <td><?= $students['grades'] ?></td>
                                         <td>
                                             <a href="student-edit.php?student_id=<?= $students['student_id'] ?>" class="btn btn-warning">Edit</a>
                                             <a href="student-del.php?student_id=<?= $students['student_id'] ?>" class="btn btn-danger">Delete</a>
                                         </td>
                                     </tr>
                                 <?php } ?>
                             </tbody>
                         </table>
                     </div>
                 <?php } else { ?>

                     <div class="alert alert-info w-450 m-5" role="alert">
                         Empty!
                     </div>

                 <?php
                } ?>
                 </div>

                 <script src="js/bootstrap.min.js"></script>
                 <script>
                     $(document).ready(function() {
                         $("#navLinks li:nth-child(3) a").addClass('active');
                     });
                 </script>
         </body>

         </html>
 <?php
        } else {
            header("Location: ../login.php");
            exit;
        }
    } else {
        header("Location: ../login.php");
        exit;
    }
    ?>