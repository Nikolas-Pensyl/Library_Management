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

	if(empty($ISBN) || empty($author) || empty($title) || empty($count)) {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Book.php'>";
	} else if(!empty($count) && $count<1) {
		$_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Book.php'>";
	} else {


	if(!empty($short)&&$short=="on") {
		$short = 1;
	} else {
		$short = 0;
	}
	$stmt = "INSERT INTO books (isbn, title, author, copies, short_term) VALUES ('{$ISBN}', '{$title}', '{$author}', '{$count}', {$short});";

	
	
	$result = mysqli_query($conn, $stmt);
	if($result) {
	    $_SESSION["success"] = 1;
		
	} else {
	    $_SESSION["fail"] =1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Book.php'>";
	}
	echo "<meta http-equiv = 'Refresh' content = '0; url = Register_Book.php'>";
}

?>