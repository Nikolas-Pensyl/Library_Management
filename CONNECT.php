<?php
	error_reporting (E_ALL ^ E_NOTICE);
	$host = "localhost";
	$uname = "root";
	$pass = "";
	$db = "project_lib-man";
	
	$conn = mysqli_connect($host, $uname, $pass, $db);

?>