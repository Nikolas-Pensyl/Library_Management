<?php

	include 'CONNECT.php';

	session_start();
	if(empty($_SESSION['manager']) || $_SESSION['manager']==0) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}
	
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$isStaff = $_POST['staff'];
	$manager = $_POST["manager"];
	$user = $_POST["usern"];
	$pass = $_POST["passw"];
    $id = $_POST["id"];

	if($isStaff=="on") {
		if($manager=="on") {
			$stmt = "update members set fname='{$fname}' lname='{$lname}' address='{$address}' phone='{$phone}' staff=BIN(1) manager=BIN(1) where id='{$id}';";
		} else {
			$stmt = "update members set fname='{$fname}' lname='{$lname}' address='{$address}' phone='{$phone}' staff=BIN(1) manager=BIN(0) where id='{$id}';";
		}
		$stmtt = "update login set pass='{$user}' user='{$pass}' where id='{$id}';";
		$result = mysqli_query($conn, $stmt);
	} else {
        $stmt = "update members set fname='{$fname}' lname='{$lname}' address='{$address}' phone='{$phone}' staff=BIN(0) manager=BIN(0) where id='{$id}';";
		$stmtt = "update login set pass='NULL' user='NULL' where id='{$id}';";
		$result = mysqli_query($conn, $stmt); 
	}
	
	
	
	if($result) {
		$result = mysqli_query($conn, $stmtt);
		if($result) {
			echo $isStaff;
			echo "Success!";
		} else {
			echo "Error: Cannot add new library members.<br>" . mysqli_error($conn);
		}
	} else {
	    echo "Error: Cannot add new library member.<br>" . mysqli_error($conn);
	}
	//echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";

?>