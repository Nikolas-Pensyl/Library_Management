<?php

	include 'CONNECT.php';
	
    session_start();
    session_destroy();
	header("Location: ./main.php");

?>