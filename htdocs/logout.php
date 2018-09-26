<?php 
	session_start();
	unset($_SESSION["user"]);
	unset($_SESSION["is_admin"]);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="background-color:#eee">
	<?php 
		include 'navbar.php'
	 ?>
	<div class="jumbotron" style=" padding:10%">
	  <h1 class="display-4">You have successfully logged out!</h1>
	  <p>Click the button below to navigate to the main page! </p>
	  <p class="lead">
	  <button type="button" class="btn btn-secondary btn-lg"><a href="index.php">Home</a></button>
	</div>
	<?php
		include 'footer.php'
	?>

</body>
</html>