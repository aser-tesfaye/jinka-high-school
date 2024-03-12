<?php

session_start();
if (
    isset($_SESSION['admin_id']) &&
    isset($_SESSION['role'])
) {
    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['username']) &&
            isset($_POST['pass']) &&
            isset($_POST['subject']) &&
            isset($_POST['grade'])
        ) {

            include '../../db_connection.php';
            include '../data/student.php';

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];
            $pass = $_POST['pass'];
            $gender = $_POST['gender'];

            $subject = $_POST['subject'];
            $allSubject = implode(",", $subject);

            $grade = $_POST['grade'];
            $allGrade = implode(",", $grade);

            if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($lname)) {
                $em  = "Last Name is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($uname)) {
                $em  = "Username is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (!unameIsUnique($uname, $conn)) {
                $em  = "Username is taken! try another";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($pass)) {
                $em  = "Password is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($subject)) {
                $em  = "Subject is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else if (empty($grade)) {
                $em  = "Grade is required";
                header("Location: ../student-add.php?error=$em");
                exit;
            } else {
                // Hashing the password
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT into students(username, pass, fname, lname, gender, subjects, grades) VALUES(?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $gender, $allSubject, $allGrade]);

                $sm = "New Student registered successfully";
                header("Location: ../student-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../student-add.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
