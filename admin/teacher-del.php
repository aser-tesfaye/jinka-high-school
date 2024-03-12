 <?php
    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role']) &&
        isset($_GET['teacher_id'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            include "../db_connection.php";

            $id = $_GET['teacher_id'];

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


            if (removeTeacher($id, $conn)) {
                $sm = "Successfully deleted!";
                header("Location: teacher.php?success=$sm");
                exit;
            } else {
                $em = "Unknown error occurred!";
                header("Location: teacher.php?error=$em");
                exit;
            }
        } else {
            header("Location: teacher.php");
            exit;
        }
    } else {
        header("Location: teacher.php");
        exit;
    }
