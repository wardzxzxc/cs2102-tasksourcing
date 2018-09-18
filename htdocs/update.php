<!DOCTYPE html>
<head>
    <title>Updating user details</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>li {list-style: none;}</style>
</head>
<body>
    <h2>Supply User ID and enter</h2>
    <ul>
        <form name="display" action="update.php" method="POST" >
            <li>User ID:</li>
            <li><input type="text" name="userid" /></li>
            <li><input type="submit" name="submit" /></li>
        </form>
</ul>
<?php
    session_start();
    include('connection.php');
    
    if (isset($_POST['submit'])) {
        echo "<ul><form name='update' action='update.php' method='POST'>
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
        $result = pg_query($db, "UPDATE users SET user_id = '$_POST[userid_updated]',
                           first_name = '$_POST[first_name_updated]',
                           last_name = '$_POST[last_name_updated]',
                           email = '$_POST[email_updated]',
                           phone = '$_POST[phone_updated]',
                           password = '$_POST[password_updated]',
                           zipcode = '$_POST[zipcode_updated]'");
                        
                           if (!$result) {
                           echo "Update user details failed!";
                           } else {
                           echo "Update user details successful!";
                           }
                           }
                           ?>
</body>
</html>

