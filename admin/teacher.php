 <?php
    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            include "../db_connection.php";
            include "data/teacher.php";
            // include "data/subject.php";
            $teachers = getAllTeachers($conn);
            // $subjects = getAllSubjects($conn);

    ?>
         <!DOCTYPE html>
         <html lang="en">

         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Admin - Teachers</title>
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="icon" href="../logo.png">
             <script src="../js/jquery-3.6.0.js"></script>
             <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
         </head>

         <body>
             <?php
                include "inc/navbar.php";
                if ($teachers != 0) {
                    # code...

                ?>

                 <div class="container mt-5">
                     <a href="teacher-add.php" class="btn btn-dark">
                         Add New Teacher
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
                                   foreach ($teachers as $teachers) {
                                    $i++
                                    ?>
                                     <tr>
                                         <th scope="row"><?=$i?></th>
                                         <td><?= $teachers['teacher_id'] ?></td>
                                         <td><?= $teachers['fname'] ?></td>
                                         <td><?= $teachers['lname'] ?></td>
                                         <td><?= $teachers['username'] ?></td>
                                         <td><?= $teachers['subjects'] ?></td>
                                         <td><?= $teachers['grades'] ?></td>
                                         <td>
                                             <a href="teacher-edit.php?teacher_id=<?= $teachers['teacher_id'] ?>" class="btn btn-warning">Edit</a>
                                             <a href="teacher-del.php?teacher_id=<?= $teachers['teacher_id'] ?>" class="btn btn-danger">Delete</a>
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
                         $("#navLinks li:nth-child(2) a").addClass('active');
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