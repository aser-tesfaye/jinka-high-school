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
             <title>Home - Jinka High-school</title>
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="stylesheet" href="../css/style.css">
             <link rel="icon" href="../logo.png">
         </head>

         <body>

             <!-- <div class="d-flex justify-content-center align-items-center vh-100">
             <div class="shadow w-450 p-3 text-center bg-light">
                 <small>Role:
                     <b>
                         <?php
                            if ($_SESSION['role'] == 'Admin') {
                                echo "Admin";
                            } else if ($_SESSION['role'] == 'Teacher') {
                                echo "Teacher";
                            } else {
                                echo "Student";
                            }
                            ?>
                     </b><br>
                     <h3 class="display-4"><?= $_SESSION['fname'] ?></h3>
                     <a href="../logout.php" class="btn btn-warning">Logout</a>
                 </small>
             </div>
         </div> -->
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="homeNav">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#"><img src="../logo2.png" alt="LOGO" width="40"></a>
                     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                             <li class="nav-item">
                                 <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#about">Teachers</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#contact">Students</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#contact">Class</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#contact">Couse</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="#contact">Students</a>
                             </li>
                         </ul>
                         <ul class="navbar-nav me-right mb-2 mb-lg-0">
                             <li class="nav-item">
                                 <a class="nav-link active" aria-current="page" href="../logout.php">Logout</a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </nav>

             <script src="js/bootstrap.min.js"></script>
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