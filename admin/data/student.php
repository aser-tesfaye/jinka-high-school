<?php

// Get student by ID
function getStudentsById($student_id, $conn)
{
    $sql = "SELECT * FROM students
           WHERE student_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$student_id]);

    if ($stmt->rowCount() == 1) {
        $students = $stmt->fetch();
        return $students;
    } else {
        return 0;
    }
}


// All students
function getAllStudents($conn)
{
    $sql = "SELECT * FROM students";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $students = $stmt->fetchAll();
        return $students;
    } else {
        return 0;
    }
}


//Checking if the username is taken
function unameIsUnique($uname, $conn, $student_id = 0)
{
    $sql = "SELECT username, student_id FROM students
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($student_id == 0) {
        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() >= 1) {
            $students = $stmt->fetch();
            if ($students['student_id']  == $student_id) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
}

// DELETE 
function removeStudent($id, $conn)
{
    $sql = "DELETE FROM students
            WHERE student_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}
