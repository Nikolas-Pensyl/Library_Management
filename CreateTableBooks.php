<?php
	include('config.php');

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS Books (
	Title varchar(50) NOT NULL,
	Author varchar(20) NOT NULL,
	Description varchar(20) NOT NULL,
	Genre varchar(10) NOT NULL,
	Page_Count int NOT NULL,
	CONSTRAINT PK_Books PRIMARY KEY (Title,Author)
)";


	if (mysqli_query($conn, $sql)) {
		echo "Table Patients created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>