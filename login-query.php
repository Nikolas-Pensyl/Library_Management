<?php

	include 'CONNECT.php';
	
	

    $user = $_POST['User_Field'];
    $pass = $_POST['Pass_Field'];

    $stmt = "SELECT * from login where user='{$user}' and pass='{$pass}';";

    $result = mysqli_query($conn, $stmt);
	if(!empty($result)) {
		session_start();
        $row = $result->fetch_assoc();
        $_SESSION["id"] = $row['id'];
        echo $_SESSION["id"];
	} else {
		echo "<script> alert(\"Hello! I am an alert box!!\");</script>";
        echo "test";
	}
	header("Location: ./main.php");

?>