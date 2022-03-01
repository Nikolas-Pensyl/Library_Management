<?php

	include 'CONNECT.php';

	session_start();
	if(!empty($_SESSION['id'])) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}
	
	

    $user = $_POST['User_Field'];
    $pass = $_POST['Pass_Field'];

    if(empty($_POST['User_Field']) || empty($_POST['Pass_Field'])) {
        $_SESSION["Previous"] = 1;
        header("Location: ./login.php"); 
    } else {

    $stmt = "SELECT * from login where user='{$user}' and pass='{$pass}';";

    $result = mysqli_query($conn, $stmt);
	if(!empty($result)) {
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row['id'];
        $stmt = "SELECT * from members where id='{$row['id']}';";
        $result = mysqli_query($conn, $stmt);
        if(!empty($result)) {
            $row = $result->fetch_assoc();
            if($row['staff']==1) {
                $_SESSION["staff"] = 1;
                if($row['manager']==1) {
                    $_SESSION["manager"] = 1;
                } else {
                    $_SESSION["manager"] = 0;
                }
            } else {
                $_SESSION["staff"] = 0;
                $_SESSION["manager"] = 0;
            }
        } else {
            session_destroy();
        }
	} else {
		echo "<script> alert(\"Hello! I am an alert box!!\");</script>";
        echo "test";
	}
	header("Location: ./main.php");
    }

?>