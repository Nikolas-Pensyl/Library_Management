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
	$conpassw = $_POST["conpassw"];

	if(empty($fname) || empty($lname) || empty($address) || empty($phone)) {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";
	} else if(!empty($phone) && !ctype_digit($phone)) {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";
	} else if (!empty($isStaff) && (empty($user) || empty($pass) || empty($conpassw) || (!empty($conpassw) && !empty($pass) && $conpassw!=$pass))) {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";
	} else {

	if($isStaff=="on") {
		if($manager=="on") {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', BIN(1), BIN(1));";
		} else {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', BIN(1), BIN(0));";
		}
		$stmtt = "INSERT INTO login (id, user, pass) VALUES (NULL, '{$user}', '{$pass}');";
		$result = mysqli_query($conn, $stmt);
	} else {
		$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', BIN(0), BIN(0));";
		$stmtt = "INSERT INTO login (id, user, pass) VALUES (NULL, NULL, NULL);";
		$result = mysqli_query($conn, $stmt);
	}
	
	
	
	if($result) {
		$result = mysqli_query($conn, $stmtt);
		if($result) {
			$_SESSION["success"] = 1;
		} else {
			$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";
		}
	} else {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";
	}
}
	echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Person.php'>";

?>