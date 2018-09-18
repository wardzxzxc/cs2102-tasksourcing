<!DOCTYPE html>
<head>
<title>Updating user details</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>
<body>
<h2>Supply User ID and enter</h2>
<ul>
<form name="display" action="readupdate.php" method="POST" >
<li>User ID:</li>
<li><input type="text" name="userid" /></li>
<li><input type="submit" name="submit" /></li>
</form>
<button><a href="index.php">Main Menu</a></button>
</ul>
<?php
    session_start();
      include('connection.php');
    
    $result = pg_query($db, "SELECT * FROM users WHERE user_id = '$_POST[userid]'");
    $row    = pg_fetch_assoc($result);
    if (isset($_POST['submit'])) {
        echo "<ul><form name='readupdate' action='readupdate.php' method='POST'>
        <li>User ID:</li>
        <li><input type='text' name='userid_updated'
        value='$row[user_id]' /></li>
        
        <li>First Name:</li>
        <li><input type='text' name='first_name_updated'
        value='$row[first_name]' /></li>
        
        <li>Last Name:</li>
        <li><input type='text' name='last_name_updated'
        value='$row[last_name]' /></li>
        
    <li>Email:</li>
        <li><input type='text' name='email_updated'
        value='$row[email]' /></li>
        
    <li>Phone:</li>
        <li><input type='text' name='phone_updated'
        value='$row[phone]' /></li>
        
    <li>Password:</li>
        <li><input type='text' name='password_updated'
        value='$row[password]' /></li>
        
    <li>Zipcode:</li>
        <li><input type='text' name='zipcode_updated'
        value='$row[zipcode]' /></li>
        
        <li><input type='submit' name='new' /></li>
        </form>
        
        </ul>";
    }
    if (isset($_POST['new'])) {
         $result = pg_query($db, "UPDATE users SET
                           first_name = '$_POST[first_name_updated]',
                           last_name = '$_POST[last_name_updated]',
                           email = '$_POST[email_updated]',
                           phone = '$_POST[phone_updated]',
                           password = '$_POST[password_updated]',
                           zipcode = '$_POST[zipcode_updated]' 
                           WHERE user_id = '$_POST[userid_updated]'");
                           
        $full_name = $_POST[first_name_updated] . ' ' . $_POST[last_name_updated];

                           if (!$result) {
                           echo "Update user details failed for $full_name!";
                           } else {
                           echo "Update user details successful for $full_name!";
                           }
                           }
                           ?>
</body>
</html>
