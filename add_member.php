<?php

	include 'CONNECT.php';
	
	
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$isStaff = $_POST['staff'];
	
	
	$stmt = "insert into members (id, fname, lname, address, phone, staff)
		values (NULL, '{$fname}', '{$lname}', '{$address}', '{$phone}', '{$isStaff}');";
	
	$result = mysqli_query($conn, $stmt);

	if($result) {
	    echo "Success!";
	} else {
	    echo "Error: Cannot add new library member.<br>" . mysqli_error($conn);
	}
	//echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";

?>