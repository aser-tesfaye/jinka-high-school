 <?php

    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            # code...
    ?>
         <!DOCTYPE html>
         <html lang="en">

         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Admin - Home</title>
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="stylesheet" href="../css/style.css">
             <link rel="icon" href="../logo.png">
             <script src="../js/jquery-3.6.0.js"></script>
             <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
         </head>

         <body>
             <?php
                include "inc/navbar.php";
                ?>
             <div class="container mt-5">
                 <div class="container text-center">
                     <div class="row row-cols-1">
                         <a href="teacher.php" class="col btn btn-dark m-3 py-3">
                             <!-- <i class="fa fa-user-md" aria-hidden="true"></i><br> -->
                             Teachers
                         </a>
                         <a href="student.php" class="col btn btn-dark m-3 py-3">
                             <!-- <i class="fa fa-user-md" aria-hidden="true"></i><br> -->
                             Students
                         </a>
                         <!-- <a href="registrar-office.php" class="col btn btn-dark m-3 py-3">
                             <i class="fa fa-user-md" aria-hidden="true"></i><br>
                             Registrar-office
                         </a>
                         <a href="class.php" class="col btn btn-dark m-3 py-3">
                             <i class="fa fa-user-md" aria-hidden="true"></i><br>
                             Class
                         </a>
                         <a href="course.php" class="col btn btn-dark m-3 py-3">
                             <i class="fa fa-user-md" aria-hidden="true"></i><br>
                             Course
                         </a>
                         <a href="section.php" class="col btn btn-dark m-3 py-3">
                             <i class="fa fa-user-md" aria-hidden="true"></i><br>
                             Section
                         </a>
                         <a href="setting.php" class="col btn btn-primary m-3 py-3 ">
                             <i class="fa fa-user-md" aria-hidden="true"></i><br>
                             Setting
                         </a> -->
                         <a href="../logout.php" class="col btn btn-warning m-3 py-3 ">
                             <!-- <i class="fa fa-user-md" aria-hidden="true"></i><br> -->
                             Logout
                         </a>

                     </div>
                 </div>
             </div>
             <script src="js/bootstrap.min.js"></script>
             <script>
                 $(document).ready(function() {
                     $("#navLinks li:nth-child(1) a").addClass('active');
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