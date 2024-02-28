<?php

session_start();
if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['role'])) {
    # code...


?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home - Jinka High-school</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="logo.png">
    </head>

    <body class="body-home">

        <div class="d-flex justify-content-center align-items-center vh-100">
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
                    <a href="logout.php" class="btn btn-warning">Logout</a>
                </small>
            </div>
        </div>


        <script src="js/bootstrap.min.js"></script>
    </body>

    </html>


<?php
} else {
    header("Location: login.php");
    exit;
}
?>