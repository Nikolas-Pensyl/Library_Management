<?php

	include 'CONNECT.php';
	
	
	$searcher = $_POST['Search_Field'];
	
  //The line below is the one with the issue
  $stmt = "SELECT * from books where title='{$searcher}';"; 
	
  //It is telling me that my varialbe '$stmt' is empty
	$result = mysqli_query($conn, $stmt);

  if ($result->num_rows > 0) {
    // output data of each row
    $i = 1;
    while($row = $result->fetch_assoc()) {
      echo $i . "  Title: " . $row["title"]. " <br>Author: " . $row["author"]. "<br> ISBN: " . $row["isbn"]. "<br><br>";
      $i = $i +1;
    }
  } else {
    echo "0 results";
  }

?>