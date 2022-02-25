<?php
	session_start();
	
	if(empty($_SESSION['manager']) || $_SESSION['manager']==0) {
		echo "<meta http-equiv = 'Refresh' content = '0; url = main.php'>";
	}

	include 'CONNECT.php';
	$isbn = $_POST['isbn'];
	$stmt = "SELECT * from books where isbn='{$isbn}';"; 
	$result = mysqli_query($conn, $stmt);
	$row = $result->fetch_assoc();
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
		<script>
			$(new Document).ready(function() {
				$("#nav-placeholder").load("nav.php");
			});
		</script>
		<div id="nav-placeholder"></div>
        <title>Edit Person</title>
	</head>
	<body>
		<div class = "center">
			<h1 class = "Intro">Memebr/Staff Registration</h1>
		</div>
    <div>
			<div class = "mainbody center"><div>
					<form action="./edit_book_query.php" method="POST">
                        <label for="title">Title:  </label><input class="input" id="title" type="text" name="title" value=<?php echo"'{$row['title']}'"; ?>><br><br>
                        <label for="ISBN">ISBN:  </label><input class="input" id="ISBN" type="text" name="ISBN" value=<?php echo"'{$row['isbn']}'"; ?>><br><br>
                        <label for="author">Author:  </address></label><input class="input" id="author" type="text" name="author" value=<?php echo"'{$row['author']}'"; ?>><br><br>
                        <label for="count">Amount of Books:  </label><input class="input" id="count" type="number" name="count" value=<?php echo"'{$row['copies']}'"; ?>><br><br>
						<label for="short">Short Term rental?  </label><input class="input" id="short" type="checkbox" name="short" <?php if($row['short_term']==1) {echo "checked";} ?>><br><br>
                        <input type="hidden" name="oldisbn" value=<?php echo"'{$row['isbn']}'"; ?>>
						<input type="submit" value="Edit Book">
					</form>
				</div>
			</div>
		</div>
	</body>	
</html>