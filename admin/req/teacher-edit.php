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
            isset($_POST['teacher_id']) &&
            isset($_POST['subject']) &&
            isset($_POST['grade'])
        ) {

            include '../../db_connection.php';
            include '../data/teacher.php';

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];

            $teacher_id = $_POST['teacher_id'];

            $subject = $_POST['subject'];
            $allSubject = implode(",", $subject);

            $grade = $_POST['grade'];
            $allGrade = implode(",", $grade);

            if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else if (empty($lname)) {
                $em  = "Last Name is required";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else if (empty($uname)) {
                $em  = "Username is required";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else if (!unameIsUnique($uname, $conn)) {
                $em  = "Username is taken! try another";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else if (empty($subject)) {
                $em  = "Subject is required";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else if (empty($grade)) {
                $em  = "Grade is required";
                header("Location: ../teacher-edit.php?error=$em");
                exit;
            } else {
                $sql = "UPDATE teachers SET
                username = ?, fname=?, lname=?, subjects=?,grades=?
                
                WHERE teacher_id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $fname, $lname, $allSubject, $allGrade,$teacher_id]);
                $sm = "successfully updated!";
                header("Location: ../teacher-edit.php?success=$sm");
                exit;
            }
        } else {
            $em = "An error occurred";
            header("Location: ../req/teacher-edit.php?error=$em");
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
