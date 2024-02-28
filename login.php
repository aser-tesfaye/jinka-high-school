<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Jinka High-school</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="logo.png">
</head>

<body class="body-login">
    <div class="black-fill"><br><br>
        <div class="container">
            <div class="d-flex justify-content-center align-items-center flex-column">
                <form class="login" method="post" action="req/login.php">
                    <div class="text-center"><img src="logo.png" alt="" width="100px"></div>
                    <h3>Login</h3>
                    <?php
                    if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $_GET['error']?>
                        </div>
                    <?php 
                        }
                    ?>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="uname" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Login As</label>
                        <select class="form-control" name="role">
                            <option value="1">Admin</option>
                            <option value="3">Student</option>
                            <option value="2">Teacher</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Login</button>
                    <a href="index.php" class="text-decoration-none">Home</a>
                </form>
                <br><br><br>
            </div>

            <div class="text-center text-light">
                <!-- <?php
                    $pass = 123;
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    echo $pass;
                ?> -->
                &copy; 2024 J School. All rights reserved.
            </div>
        </div>
    </div>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>