<?php
	session_start();
	if(!empty($_SESSION["success"])) {
		echo "<script> alert( \" Sucessfully performed the operation \" );</script>";
		unset($_SESSION["success"]);
	} else if(!empty($_SESSION["fail"])) {
		echo "<script> alert( \" Failed to perform the operation \" );</script>";
		unset($_SESSION["fail"]);
	}
?>
<!DOCTYPE html>
<html>	
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		<script src="./Scripts/jquery-3.4.1.min.js"></script>
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
		<title>main</title>
	</head>
	<body>
		<div class = "center">
			<h1 class = "Intro">Welcome to our Library</h1>
		</div>
	</body>	
</html>