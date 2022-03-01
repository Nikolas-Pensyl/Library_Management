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
	$conpassw = $_POST["conpassw"];

	if(empty($fname) || empty($lname) || empty($address) || empty($phone)) {
		$_SESSION["fail"] =1;
		$_SESSION["editid"] = $id;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_person.php'>";
	} else if(!empty($phone) && !ctype_digit($phone)) {
		$_SESSION["fail"] =1;
		$_SESSION["editid"] = $id;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_person.php'>";
	} else if (!empty($isStaff) && (empty($user) || empty($pass) || empty($conpassw) || (!empty($conpassw) && !empty($pass) && $conpassw!=$pass))) {
		$_SESSION["fail"] =1;
		$_SESSION["editid"] = $id;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_person.php'>";
	} else {

	if($isStaff=="on") {
		if($manager=="on") {
			$stmt = "update members set fname='{$fname}', lname='{$lname}', address='{$address}', phone='{$phone}', staff=BIN(1), manager=BIN(1) where id='{$id}';";
		} else {
			$stmt = "update members set fname='{$fname}', lname='{$lname}', address='{$address}', phone='{$phone}', staff=BIN(1), manager=BIN(0) where id='{$id}';";
		}
		$stmtt = "update login set pass='{$pass}', user='{$user}' where id='{$id}';";
		$result = mysqli_query($conn, $stmt);
	} else {
        $stmt = "update members set fname='{$fname}', lname='{$lname}', address='{$address}', phone='{$phone}', staff=BIN(0), manager=BIN(0) where id='{$id}';";
		$stmtt = "update login set pass=NULL, user=NULL where id='{$id}';";
		$result = mysqli_query($conn, $stmt); 
	}
	
	
	
	if($result) {
		$result = mysqli_query($conn, $stmtt);
		if($result) {
			$_SESSION["success"] = 1;
			echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
		} else {
			$_SESSION["fail"] =1;
		$_SESSION["editid"] = $id;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_person.php'>";
		}
	} else {
	    $_SESSION["fail"] =1;
		$_SESSION["editid"] = $id;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_person.php'>";
	}
}
?>