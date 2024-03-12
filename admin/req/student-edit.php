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
            isset($_POST['student_id']) &&
            isset($_POST['subject']) &&
            isset($_POST['gender']) &&
            isset($_POST['grade'])
        ) {

            include '../../db_connection.php';
            include '../data/student.php';

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];
            $gender = $_POST['gender'];

            $student_id = $_POST['student_id'];

            $subject = $_POST['subject'];
            $allSubject = implode(",", $subject);

            $grade = $_POST['grade'];
            $allGrade = implode(",", $grade);

            if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (empty($lname)) {
                $em  = "Last Name is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (empty($uname)) {
                $em  = "Username is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (!unameIsUnique($uname, $conn, $student_id)) {
                $em  = "Username is taken! try another";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (empty($subject)) {
                $em  = "Subject is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else if (empty($grade)) {
                $em  = "Grade is required";
                header("Location: ../student-edit.php?error=$em");
                exit;
            } else {
                $sql = "UPDATE students SET username = ?,fname=? ,lname=?,gender=?,subjects=?,grades=?
                
                WHERE student_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $gender , $allSubject, $allGrade, $student_id]);
                $sm = "successfully updated!";
                header("Location: ../student-edit.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../req/student-edit.php?error=$em");
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
