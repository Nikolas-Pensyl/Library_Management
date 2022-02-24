<?php

	include 'CONNECT.php';
	session_start();
	if(empty($_SESSION['manager']) || $_SESSION['manager']==0) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}
	
	$ISBN = $_POST['ISBN'];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$count = $_POST['count'];
	$short = $_POST['short'];


	if(!empty($short)&&$short=="on") {
		$short = 1;
	} else {
		$short = 0;
	}
	$stmt = "INSERT INTO books (isbn, title, author, copies, shor_term) VALUES ('{$ISBN}', '{$title}', '{$author}', '{$count}', {$short});";

	
	
	$result = mysqli_query($conn, $stmt);
	if($result) {
	    echo "Success!";
		
	} else {
	    echo "Error: Cannot add new library member.<br>" . mysqli_error($conn);
	}
	//echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";

?>