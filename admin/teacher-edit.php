 <?php
    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role']) &&
        isset($_GET['teacher_id'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            include "../db_connection.php";
            include "data/teacher.php";
            include "data/subject.php";

            $teacher_id = $_GET['teacher_id'];
            
            $teachers = getTeachersById($teacher_id, $conn);

            $grades = explode(",", $teachers['grades']);
            $subjects = explode(",", $teachers['subjects']);

            if ($teacher_id == 0) {
                header("Location: teacher.php");
                exit;
            }


    ?>
         <!DOCTYPE html>
         <html lang="en">

         <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Admin - Edit Teachers</title>
             <link rel="stylesheet" href="../css/style.css">
             <link rel="stylesheet" href="../css/bootstrap.min.css">
             <link rel="icon" href="../logo.png">
             <script src="../js/jquery-3.6.0.js"></script>
             <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
         </head>

         <body>
             <?php
                include "inc/navbar.php";
                ?>

             <div class="container mt-5">
                 <a href="teacher.php" class="btn btn-dark">Go Back</a>
                 <br><br>

                 <form class="shadow p-3 mt-5 form-w" method="post" action="req/teacher-edit.php">
                     <h3>Edit Teacher</h3>
                     <hr>
                     <?php
                        if (isset($_GET['error'])) { ?>
                         <div class="alert alert-danger" role="alert">
                             <?= $_GET['error'] ?>
                         </div>
                     <?php
                        }
                        ?>
                     <?php
                        if (isset($_GET['success'])) { ?>
                         <div class="alert alert-success " role="alert">
                             <?= $_GET['success'] ?>
                         </div>
                     <?php
                        }
                        ?>


                     <div class="mb-3">
                         <label class="form-label">First Name</label>
                         <input type="text" name="fname" class="form-control" value="<?= $teachers['fname'] ?>">
                     </div>
                     <div class="mb-3">
                         <label class="form-label">Last Name</label>
                         <input type="text" name="lname" class="form-control" value=" <?= $teachers['lname'] ?>">
                     </div>
                     <div class="mb-3">
                         <label class="form-label">Username</label>
                         <input type="text" name="username" class="form-control" value=" <?= $teachers['username'] ?>">
                     </div>
                     <div>
                         <input type="text" value=" <?= $teachers['teacher_id'] ?>" name="teacher_id" hidden>
                     </div>

                     <div class="mb-3">
                         <label class="form-label">Subject</label>
                         <div class="row">
                             <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                 <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" name="subject[]" value="English" <?php
                                                                                                                                                if (in_array("English", $subjects)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?> />

                                 <label class="btn btn-outline-primary" for="btncheck1">English</label>

                                 <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" name="subject[]" value="Physics" <?php
                                                                                                                                                if (in_array("Physics", $subjects)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?> />

                                 <label class="btn btn-outline-primary" for="btncheck2">Physics</label>

                                 <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" name="subject[]" value="Biology" <?php
                                                                                                                                                if (in_array("Biology", $subjects)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?> />

                                 <label class="btn btn-outline-primary" for="btncheck3">Biology</label>

                                 <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" name="subject[]" value="Maths" <?php
                                                                                                                                            if (in_array("Maths", $subjects)) {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?> />

                                 <label class="btn btn-outline-primary" for="btncheck4">Maths</label>

                                 <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off" name="subject[]" value="Chemistry" <?php
                                                                                                                                                if (in_array("Chemistry", $subjects)) {
                                                                                                                                                    echo "checked";
                                                                                                                                                }
                                                                                                                                                ?> />

                                 <label class="btn btn-outline-primary" for="btncheck5">Chemistry</label>
                             </div>
                         </div>
                     </div>
                     <div class="mb-3">
                         <label class="form-label">Grade</label>
                         <div class="row">
                             <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                                 <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off" name="grade[]" value="9" <?php
                                                                                                                                        if (in_array("9", $grades)) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>

                                 <label class="btn btn-outline-primary" for="btncheck6">9</label>

                                 <input type="checkbox" class="btn-check" id="btncheck7" autocomplete="off" name="grade[]" value="10" <?php
                                                                                                                                        if (in_array("10", $grades)) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>

                                 <label class="btn btn-outline-primary" for="btncheck7">10</label>

                                 <input type="checkbox" class="btn-check" id="btncheck8" autocomplete="off" name="grade[]" value="11" <?php
                                                                                                                                        if (in_array("11", $grades)) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>

                                 <label class="btn btn-outline-primary" for="btncheck8">11</label>

                                 <input type="checkbox" class="btn-check" id="btncheck9" autocomplete="off" name="grade[]" value="12" <?php
                                                                                                                                        if (in_array("12", $grades)) {
                                                                                                                                            echo "checked";
                                                                                                                                        }
                                                                                                                                        ?>>

                                 <label class="btn btn-outline-primary" for="btncheck9">12</label>
                             </div>
                         </div>
                     </div>

                     <button type="submit" class="btn btn-primary">Update</button>
                 </form>

                 <form class="shadow p-3 mt-5 form-w" method="post" action="req/teacher-edit.php">
                     <h3>Change Password </h3>
                     <hr>
                     <?php
                        if (isset($_GET['error'])) { ?>
                         <div class="alert alert-danger" role="alert">
                             <?= $_GET['error'] ?>
                         </div>
                     <?php
                        }
                        ?>
                     <?php
                        if (isset($_GET['success'])) { ?>
                         <div class="alert alert-success " role="alert">
                             <?= $_GET['success'] ?>
                         </div>
                     <?php
                        }
                        ?>
                     <div class="mb-3">
                         <label class="form-label">Password</label>
                         <div class="input-group mb-3">
                             <input type="password" name="pass" class="form-control" id="passInput">
                             <button class="btn btn-secondary" type="button" id="gBtn">Random</button>
                         </div>
                     </div>
                 </form>
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
            header("Location: teacher.php");
            exit;
        }
    } else {
        header("Location: teacher.php");
        exit;
    }
    ?>