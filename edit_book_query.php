<?php

	include 'CONNECT.php';

	session_start();
	if(empty($_SESSION['manager']) || $_SESSION['manager']==0) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}
	

    $ISBN = $_POST['ISBN'];
    $oldisbn = $_POST['oldisbn'];
	$author = $_POST['author'];
	$title = $_POST['title'];
	$count = $_POST['count'];
	$short = $_POST['short'];

	if(empty($ISBN) || empty($author) || empty($title) || empty($count)) {
		$_SESSION["fail"] =1;
		$_SESSION["ISBN"] = $ISBN;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_book.php'>";
	} else if(!empty($count) && $count<1) {
		$_SESSION["fail"] =1;
		$_SESSION["ISBN"] = $ISBN;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_book.php'>";
	} else {

	if($short=="on") {
        $stmt = "update books set isbn='{$ISBN}', author='{$author}', title='{$title}', copies='{$count}', short_term=BIN(1) where isbn='{$oldisbn}';";
		
	} else {
        $stmt = "update books set isbn='{$ISBN}', author='{$author}', title='{$title}', copies='{$count}', short_term=BIN(0) where isbn='{$oldisbn}';";
	}
    $result = mysqli_query($conn, $stmt);
	
	
	
	if($result) {
		$_SESSION["success"] = 1;
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	} else {
	    $_SESSION["fail"] =1;
		$_SESSION["ISBN"] = $ISBN;
		echo "<meta http-equiv = 'Refresh' content = '0; url = edit_book.php'>";
	}
	//
}

?>