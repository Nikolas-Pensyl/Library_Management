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
	$manager = $_POST['manager'];
	$user = $_POST["usern"];
	$pass = $_POST["passw"];
	if($isStaff=="on") {
		if($manager=="on") {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 1, 1);";
		} else {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 1, 0);";
		}
		$stmtt = "INSERT INTO login (id, user, pass) VALUES (NULL, '{$user}', '{$pass}');";
		$result = mysqli_query($conn, $stmt);
	} else {
		$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 0, 0);";
		$stmtt = "INSERT INTO login (id, user, pass) VALUES (NULL, NULL, NULL);";
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