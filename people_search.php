<?php
	session_start();
	if(empty($_SESSION['manager']) || $_SESSION['manager']==0) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}
?>
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
			<h1 class = "Intro">Edit People</h1>
			<h6 class = "Intro">Start by searching for a person you want to edit or delete then click on edit or to based on your desire.</h6>
		</div>
		<div>
			<div class = "mainbods center">
				<div>
					<form action="./people_search.php" method="POST">
						<input class = "span" id="Search_Field" type="text" name="Search_Field">
						<input  type="submit" value="Search">
					</form>
				</div>
				<?php
            include 'CONNECT.php';
            
            
            $searcher = $_POST['Search_Field'];
			
            $stmt = "SELECT * from members where fname='{$searcher}' or lname='{$searcher}';"; 
            
            $result = mysqli_query($conn, $stmt);

            if ($result->num_rows > 0) {
              // output data of each row
              $i = 1;
              while($row = $result->fetch_assoc()) {
                if($i%2==0) {
                  echo "<div class=\"dck-clr search\"><p class=\"searchtxt\">".$i . ".    Name: " . $row["fname"]." ".$row["lname"]." <br />Phone: " . $row["phone"]. "<br /> Address: " . $row["address"]. "</p><br><br>";
                } else {
                  echo "<div class=\"lght-clr search\"><p class=\"searchtxt\">". $i. ".    Name: " . $row["fname"]."  ". $row["lname"]." <br />Phone: " . $row["phone"]. "<br /> Address: " . $row["address"]. "</p><br><br>";
                }
				echo "<form class=\"centerbut\" action=\"./edit_person.php\" method=\"POST\">";
				echo "<input type=\"submit\" value=\"edit\">";
				$id = $row["id"];
				echo "<input type=\"hidden\" name=\"id\" value='{$id}'>";
				echo "</form></div>";
                $i = $i +1;
              }
            } else {
              echo "0 results";
            }

          ?>
			</div>
		</div>
	</body>
</html>