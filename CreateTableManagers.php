<?php
	include('config.php');

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS Managers (
	Name varchar(20) NOT NULL,
	U_Card int NOT NULL,
	Address varchar(30) NOT NULL,
	Phone varchar(15) NOT NULL,
	CONSTRAINT PK_Books PRIMARY KEY (Name,U_Card)
)";


	if (mysqli_query($conn, $sql)) {
		echo "Table Managers created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>