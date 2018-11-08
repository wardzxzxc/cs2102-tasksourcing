<?php 
	session_start();
    include('connection.php');

    if(isset($_POST['login'])) {
    	$result = pg_query($db, "SELECT password, is_admin, user_id FROM users WHERE email = '$_POST[email]'");
    	if ($result != false) {
    		$num_rows = pg_num_rows($result);
    		if ($num_rows > 0) {
    			$result_arr = pg_fetch_row($result);
    			if ($_POST[password] === ($result_arr[0])) {
    				$_SESSION["user"] = $result_arr[2];
    				if ($result_arr[1] == t) {
    					$_SESSION["is_admin"] = t;
    					$message = '<span>Admin login successful!</span>';
					header("Location: dashboard.php");
    				} else {
    					header("Location: dashboard.php");
    				}
    			} else {
    				$message = '<span>Sorry, the email or password is incorrect.</span>';
    			}
    		} else {
    			$message = '<span>Sorry, the email or password is incorrect.</span>';
    		}
    	} else {
    		$message =  '<span> Sorry, an error occurred.';
    	}
    }
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
	<div style="height: 100%">
		<?php 
			include 'navbar.php'
		 ?>
	</div>

	<form action="login.php" method="POST">
		<div class="container">
		<label for="email"><b>Email</b></label>
		<input type="text" placeholder="Enter Email" name="email" required>

		<label for="psw"><b>Password</b></label>
		<input type="password" placeholder="Enter Password" name="password" required>

		<button type="submit" name="login">Login</button>
		<?php 
			echo $message;
		 ?>
		</div>
	</form> 
</body>
	<?php 
	 	include 'footer.php'
	 ?>
</html>
