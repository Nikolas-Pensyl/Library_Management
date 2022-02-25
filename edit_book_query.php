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

	if($short=="on") {
        $stmt = "update books set isbn='{$ISBN}', author='{$author}', title='{$title}', copies='{$count}', short_term=BIN(1) where isbn='{$oldisbn}';";
		
	} else {
        $stmt = "update books set isbn='{$ISBN}', author='{$author}', title='{$title}', copies='{$count}', short_term=BIN(0) where isbn='{$oldisbn}';";
	}
    $result = mysqli_query($conn, $stmt);
	
	
	
	if($result) {
	    echo "Success!";
	} else {
	    echo "Error: Cannot add new library member.<br>" . mysqli_error($conn);
	}
	//echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";

?>