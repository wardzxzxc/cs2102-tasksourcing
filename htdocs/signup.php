	<?php 
	session_start();
	include('connection.php');
	if ($_POST[password] == ($_POST[password_repeat])) {
	 	if (isset($_POST['signup'])) {  // Submit the insert SQL command
	 		$result = pg_query($db, "INSERT INTO users(first_name, last_name, email, phone, password, zipcode, is_admin) VALUES ('$_POST[first_name]',
	 			'$_POST[last_name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]',
	 			'$_POST[zipcode]', 'FALSE')");
	 		if (!$result) {
	 			echo "User not created";
	 		} else {
	 			echo "User created successfully";
	 		}
	 	}
	 } else {
	 	$message =  '<span> The passwords you entered does not match.';
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
	 	<div style="height: 100%">
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

<!-- 	 			<label for="user_id"><b>User ID</b></label>
	 			<input type="text" placeholder="Enter User ID" name="user_id" required
	 			value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : '' ?>"> -->

	 			<label for="first_name"><b>First Name</b></label>
	 			<input type="text" placeholder="Enter First Name" name="first_name" required
	 			value="<?php echo isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">

	 			<label for="last_name"><b>Last Name</b></label>
	 			<input type="text" placeholder="Enter Last Name" name="last_name" required
	 			value="<?php echo isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>">

	 			<label for="email"><b>Email</b></label>
	 			<input type="text" placeholder="Enter Email" name="email" required
	 			value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">

	 			<label for="password"><b>Password</b></label>
	 			<input type="password" placeholder="Enter Password" name="password" required>

	 			<label for="password_repeat"><b>Repeat Password</b></label>
	 			<input type="password" placeholder="Repeat Password" name="password_repeat" required>

	 			<label for="phone"><b>Contact Number</b></label>
	 			<input type="text" placeholder="Enter Contact Number" name="phone" required
	 			value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">

	 			<label for="zipcode"><b>Zipcode</b></label>
	 			<input type="text" placeholder="Enter Zipcode" name="zipcode" required
	 			value="<?php echo isset($_POST['zipcode']) ? $_POST['zipcode'] : '' ?>">
	 			<!-- <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p> -->

	 			<div class="clearfix">
	 				<button type="button" class="cancelbtn">Cancel</button>
	 				<button type="submit" name='signup' class="signupbtn">Sign Up</button>
	 			</div>
	 		</div>
	 		
	 	</form>

	 </body>
	 <?php 
	 include 'footer.php'
	 ?>
	 </html>

    <!--
    <body>  
    	<ul>
    		<form name='display' action='signup.php' method='POST' >  
    			<li>User ID:</li>  
    			<li><input type='text' name='user_id'/></li>  
    			<li>First Name:</li>  
    			<li><input type='text' name='first_name'/></li>  
    			<li>Last Name:</li>
    			<li><input type='text' name='last_name'/></li> 
    			<li>Email:</li>  
    			<li><input type='text' name='email'/></li>
    			<li>Phone:</li>  
    			<li><input type='text' name='phone'/></li>
    			<li>Password:</li>  
    			<li><input type='text' name='password'/></li>
    			<li>Zip Code:</li>  
    			<li><input type='text' name='zipcode'/></li>
    			<button><input type='submit' name='signup' value='Sign Up'/></button> 
    		</form>
    	</ul>
    </body>
    </html> -->