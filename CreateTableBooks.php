<?php
	include('config.php');

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS Books (
	Title varchar(50) NOT NULL,
	Author varchar(20) NOT NULL,
	ISBN int NOT NULL,
	Copies int NOT NULL,
	CONSTRAINT PK_Books PRIMARY KEY (Title,Author)
)";


	if (mysqli_query($conn, $sql)) {
		echo "Table Patients created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>