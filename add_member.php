<?php

	include 'CONNECT.php';
	
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$isStaff = $_POST['staff'];
	$manager = $_POST['manager'];
	if($isStaff=="on") {
		if($manager=="on") {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 1, 1);";
		} else {
			$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 1, 0);";
		}
		echo "1";
	} else {
		$stmt = "INSERT INTO members (id, fname, lname, address, phone, staff, manager) VALUES (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', 0, 0);";
		echo "0";
	}
	
	
	$result = mysqli_query($conn, $stmt);
	if($result) {
		echo $isStaff;
	    echo "Success!";
		
	} else {
	    echo "Error: Cannot add new library member.<br>" . mysqli_error($conn);
	}
	//echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";

?>