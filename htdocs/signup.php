	<?php 
	session_start();
	include('connection.php');

	if ($_POST[password] == ($_POST[password_repeat])) {
	 	if (isset($_POST['signup'])) {  // Submit the insert SQL command
			
			$result = pg_query($db, "SELECT create_user ('$_POST[first_name]', '$_POST[last_name]', 
			'$_POST[gender]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[zipcode]', 'FALSE')");
			
	 		if (!$result) {
	 			echo "<script type='text/javascript'>alert('A user with this email address already exists!')</script>";
	 		} else {
	 			echo "<script type='text/javascript'>
	 			alert('Registration successful!')
	 			window.location.href = 'login.php';
	 			</script>";
	 		}
	 	}
	 } else {
	 	echo "<script type='text/javascript'>alert('The passwords you entered does not match!')</script>";
	 }

	 ?>



	 <!DOCTYPE html>
	 <html>
	 <head>
	 	<title>Sign Up</title>
	 	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	 	<link rel="stylesheet" type="text/css" href="./css/signup.css">
	 </head>
	 <body>
	 	<div>
	 		<?php 
	 		include 'navbar.php'
	 		?>
	 	</div>
	 	<?php 
	 	echo $message;
	 	?>
	 	<form action="signup.php" method="POST">
	 		<div class="container">
	 			<h1>Sign Up</h1>
	 			<p>Please fill in this form to create an account.</p>
	 			<hr>
	 			<label for="first_name"><b>First Name</b></label>
	 			<input type="text" placeholder="Enter First Name" name="first_name" required
	 			value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">

	 			<label for="last_name"><b>Last Name</b></label>
	 			<input type="text" placeholder="Enter Last Name" name="last_name" required
	 			value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">

	 			<label for="gender"><b>Gender</b></label><br/>
	 			<select name="gender">
	 				<option value="MALE">Male</option>
	 				<option value="FEMALE">Female</option>
	 			</select>
				<br/>
				<br/>
	 			<label for="email"><b>Email</b></label>
	 			<input type="email" placeholder="Enter Email" name="email" required
	 			value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">

	 			<label for="password"><b>Password</b></label>
	 			<input type="password" placeholder="Enter Password" name="password" minlength="8" required>

	 			<label for="password_repeat"><b>Repeat Password</b></label>
	 			<input type="password" placeholder="Repeat Password" name="password_repeat" minlength="8" required>

	 			<label for="phone"><b>Contact Number</b></label>
	 			<input type="text" placeholder="Enter Contact Number" name="phone" required
	 			value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">

	 			<label for="zipcode"><b>Zipcode</b></label>
	 			<input type="text" placeholder="Enter Zipcode" name="zipcode" required
	 			value="<?php echo isset($_POST['zipcode']) ? $_POST['zipcode'] : '' ?>">
	 			<!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

	 			<div class="clearfix">
	 				<a href="index.php">
	 					<button type="button" class="cancelbtn">Cancel</button>
	 				</a>

	 				<button type="submit" name='signup' class="signupbtn">Sign Up</button>
	 			</div>
	 		</div>

	 	</form>
	 </body>
	 <?php 
	 include 'footer.php'
	 ?>
	 </html>
