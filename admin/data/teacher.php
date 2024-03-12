<?php

// Get Teacher by ID
function getTeachersById($teacher_id, $conn)
{
    $sql = "SELECT * FROM teachers
           WHERE teacher_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacher_id]);

    if ($stmt->rowCount() == 1) {
        $teachers = $stmt->fetch();
        return $teachers;
    } else {
        return 0;
    }
}


// All Teachers
function getAllTeachers($conn)
{
    $sql = "SELECT * FROM teachers";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}


//Checking if the username is taken
function unameIsUnique($uname, $conn, $teacher_id = 0)
{
    $sql = "SELECT username, teacher_id FROM teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($teacher_id == 0) {
        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() >= 1) {
            $teachers = $stmt->fetch();
            if ($teachers['teacher_id']  == $teacher_id) {
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
// function removeTeacher($id, $conn)
// {
//     $sql = "DELETE FROM teachers
//             WHERE teacher_id=?";
//     $stmt = $conn->prepare($sql);
//     $re = $stmt->execute([$id]);

//     if ($re) {
//         return 1;
//     } else {
//         return 0;
//     }
// }
