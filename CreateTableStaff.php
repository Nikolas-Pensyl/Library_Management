<?php
	include('config.php');

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS Staff (
	Name varchar(20) NOT NULL,
	Job varchar(20) NOT NULL,
	Age int NOT NULL,
	CONSTRAINT PK_Books PRIMARY KEY (Name,Job)
)";


	if (mysqli_query($conn, $sql)) {
		echo "Table Patients created successfully";
	} else {
		echo "Error creating table: " . mysqli_error($conn);
	}

	mysqli_close($conn);
?>