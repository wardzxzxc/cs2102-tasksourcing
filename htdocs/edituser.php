<!DOCTYPE html>
<?php
session_start();
include('connection.php');
$user_id = $_POST['edit'];
$isAdmin = $_SESSION["is_admin"];
$result = pg_query($db, "SELECT * FROM users WHERE user_id = $user_id");
$row = pg_fetch_assoc($result);
?>
<head>

  <title>Edit Task</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/read.css">
</head>

    <style>
        li {
            list-style: none;
        }

        .message {
            text-align: center;
            padding: 2px;
            background-color: #000000;
            border: 2px solid #FFFFFF;
            width: auto;
            color: #FFFFFF;
        }
    </style>

<body>
    <div>
        <?php
        include 'navbar.php'
        ?>
    </div>

  <h2 class="w3-black">Edit Task</h2>
        <ul>
    <form name="display" action="edituser.php" method="POST" >
        <span>First Name</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['first_name']; ?>"
            placeholder="First Name" name='first_name'/></p>

        <span>Last Name</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['last_name']; ?>"
            placeholder="Last Name" name='last_name'/></p>

        <span>Phone Number</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['phone']; ?>"
            placeholder="Phone Number" name='phone'/></p>
  
        <span>Email</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['email']; ?>"
            placeholder="Email" name='email'/></p>

        <span>Zip Code</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['zipcode']; ?>"
            placeholder="Zip Code" name='zipcode'/></p> 

        <?php if($_SESSION['is_admin'] == 't')   {
            echo'
            <span>Password</span>
            <p><input class="w3-input w3-padding-small w3-border" type="password" value="' . $row['password'] .'"
                placeholder="password" name="password" minlength="8"></p> ';
        }
        ?>    

        <p><input class="w3-input w3-padding-small w3-border" type='hidden' value="<?php echo $row['user_id']; ?>"
         name='user_id'/></p>

        <button class="w3-button w3-black" type="submit" name = "edit_user" value="<?php echo $row['user_id']; ?>">
        Edit User
        </button>

    </form>
        </br>
    <button class="w3-button w3-black"><a href="/searchuser.php">Search User</a></button>
        </ul>

  <?php

    if (isset($_POST['edit_user'])) {  // Submit the insert SQL command
        $result = pg_query($db, "UPDATE users SET first_name = '$_POST[first_name]', last_name = '$_POST[last_name]', phone = '$_POST[phone]', zipcode = '$_POST[zipcode]', email = '$_POST[email]', password = '$_POST[password]'
        WHERE user_id = '$_POST[user_id]'");

        if (!$result) {
                echo "<script> 
                alert('User not updated');
                location.href = 'dashboard.php';
                </script>"; 
        } else {
                echo "<script> 
                alert('User updated successfully');
                location.href = 'dashboard.php';
                </script>"; 
    }
}
    ?>
</body>

<?php
include 'footer.php'
?>
</html>
