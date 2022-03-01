<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		<script src="./scripts/jquery-3.4.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.2/flexslider.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.6.2/jquery.flexslider.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    	<link rel="stylesheet" type="text/css" href="./Styles/main.css">
		<link rel="stylesheet" type="text/css" href="./Styles/nav.css">
		<link rel = stylesheet href = Styles/body.css type = text/css>
		<script>
			$(new Document).ready(function() {
				$("#nav-placeholder").load("nav.php");
			});
		</script>
		<div id="nav-placeholder"></div>
		<title>Search</title>
	</head>
	<body>
		<div class="center">
			<h1 class = "Intro">Search Books</h1>
		</div>
		<div>
			<div class = "mainbody">
				<div class ="center">
					<form action="./search_books.php" method="POST">
						<input class = "span" id="Search_Field" type="text" name="Search_Field">
						<input  type="submit" value="Search">
					</form>
				</div>
				<?php
					session_start();
					include 'CONNECT.php';
					
					
					$searcher = $_POST['Search_Field'];
					if(empty($searcher)) {
						echo "<script> alert(\"Make sure to actually enter a value\");</script>";
					} else {
					
					//The line below is the one with the issue
					$stmt = "SELECT * from books where title like '%{$searcher}%';"; 
					
					//It is telling me that my varialbe '$stmt' is empty
					$result = mysqli_query($conn, $stmt);

					if ($result->num_rows > 0) {
					// output data of each row
					$i = 1;
					while($row = $result->fetch_assoc()) {
						if($i%2==0) {
						echo "<div class=\"dck-clr search\"><p class=\"searchtxt\">".$i . ".    Title: " . $row["title"]. " <br />Author: " . $row["author"]. "<br /> ISBN: " . $row["isbn"]. "</p>";
						} else {
						echo "<div class=\"lght-clr search\"><p class=\"searchtxt\">". $i. ".    Title: " . $row["title"]. " <br />Author: " . $row["author"]. "<br /> ISBN: " . $row["isbn"]. "</p>";
						}
						if(!empty($_SESSION['id'])&&!empty($_SESSION['staff'])&&$_SESSION['staff']==1) {
							echo "
								<form class=\"centerbut\" action=\"./checkout.php\" method=\"POST\">
								<input type=\"submit\" value=\"Checkout\">
								<input type=\"hidden\" name=\"ISBN\" value='{$row['isbn']}'>
							</form>";
							echo "
							<form class=\"centerbut\" action=\"./checkin.php\" method=\"POST\">
							<input type=\"submit\" value=\"CheckIn\">
							<input type=\"hidden\" name=\"ISBN\" value='{$row['isbn']}'>
						</form>";
							if(!empty($_SESSION['manager'])&&$_SESSION['manager']==1) {
								echo "<form class=\"centerbut\" action=\"./edit_book.php\" method=\"POST\">";
								echo "<input type=\"submit\" value=\"Edit Book\">";
								echo "<input type=\"hidden\" name=\"isbn\" value='{$row['isbn']}'>";
								echo "</form>";
							}
						} else {
							echo "<br>";
						}
						echo "</div>";
						
						$i = $i +1;
					}
					} else {
					echo "<h3 class=\"center\">0 results</h3>";
					}
				}

				?>
			</div>
		</div>
	</body>
</html>
