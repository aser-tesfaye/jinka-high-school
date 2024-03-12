 <?php
    session_start();
    if (
        isset($_SESSION['admin_id']) &&
        isset($_SESSION['role']) &&
        isset($_GET['student_id'])
    ) {
        if ($_SESSION['role'] == 'Admin') {
            include "../db_connection.php";

            $id = $_GET['student_id'];

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


            if (removeStudent($id, $conn)) {
                $sm = "Successfully deleted!";
                header("Location: student.php?success=$sm");
                exit;
            } else {
                $em = "Unknown error occurred!";
                header("Location: student.php?error=$em");
                exit;
            }
        } else {
            header("Location: student.php");
            exit;
        }
    } else {
        header("Location: student.php");
        exit;
    }
