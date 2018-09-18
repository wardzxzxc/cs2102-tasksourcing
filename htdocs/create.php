<!DOCTYPE html>  
<head>
  <title>Create User</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h2>Create User</h2>
  <ul>
    <form name='display' action='create.php' method='POST' >  
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
      <li>Bid Point:</li>  
      <li><input type='text' name='bid_point'/></li>
      <li>Admin:</li>  
      <li><input type='text' name='is_admin'/></li>
      <li><input type='submit' name='create' value='Create'/></li>  
    </form>
    <button><a href="index.php">Main Menu</a></button>
  </ul>
  
  <?php
    session_start();
    include('connection.php');

    if (isset($_POST['create'])) {  // Submit the insert SQL command
        $result = pg_query($db, "INSERT INTO users VALUES ('$_POST[user_id]', '$_POST[first_name]',
        '$_POST[last_name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]',
        '$_POST[zipcode]', '$_POST[bid_point]', '$_POST[is_admin]')");
        if (!$result) {
            echo "User not created";
        } else {
            echo "User created successfully";
        }
    }
    ?>  
</body>
</html>
