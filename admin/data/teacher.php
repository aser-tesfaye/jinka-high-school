<?php


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
function unameIsUnique($uname, $conn)
{
    $sql = "SELECT username FROM teachers
            WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);

    if ($stmt->rowCount() >= 1) {

        return 0;
    } else {
        return 1;
    }
}

// DELETE 
function removeTeacher($id, $conn)
{
    $sql = "DELETE FROM teachers
            WHERE teacher_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}
