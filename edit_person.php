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
					<form action="./add_member.php" method="POST">
                        <label for="fname">First name:  </label><input class="input" id="fname" type="text" name="fname"><br><br>
                        <label for="lname">Last name:  </label><input class="input" id="lname" type="text" name="lname"><br><br>
                        <label for="phone">Phone number:  </label><input class="input" id="phone" type="text" name="phone"><br><br>
                        <label for="address">Address:  </label><input class="input" id="address" type="text" name="address"><br><br>
                        <label for="staff">Is staff?  </label><input class="input" id="staff" type="checkbox" name="staff"><br><br>
						<label for="usern">Username:  </label><input class="input" id="usern" type="text" name="usern"><br><br>
                        <label for="passw">Password:  </label><input class="input" id="passw" type="password" name="passw"><br><br>
						<label for="conpassw">Confirm Password:  </label><input class="input" id="conpassw" type="password" name="conpassw"><br><br>
						<script src="edit_register_person.js"></script>
						<input type="submit" value="Edit New Member">
					</form>
				</div>
			</div>
		</div>
	</body>	
</html>