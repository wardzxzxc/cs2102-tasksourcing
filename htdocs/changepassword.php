<!DOCTYPE html>
<?php
session_start();
include('connection.php');
$curUser = $_SESSION["user"];


if(isset($_POST['update'])) {
    echo $curUser;
    $inputpassword = $_POST['current_password'];
    $password = $_POST['password'];
    $password_repeat = $_POST['password_repeat'];
    $result = pg_query($db, "SELECT u.password FROM users u WHERE u.user_id = $curUser");
    $row = pg_fetch_assoc($result);
    echo $currpassword;
    if($inputpassword == $row["password"]) {
        if($password == $password_repeat) {
        
        $result = pg_query($db, "UPDATE users SET password = '$password' WHERE user_id = '$curUser'");
      
        if ($result) {
            echo "<script>
            alert('Password Changed Successful!');
            location.href = 'dashBoard.php';
          </script>";

        } else {
            echo "<script>
            alert('Password Changed Unsuccessful.');
          </script>";

        }
    } else {
        echo "<script>
        alert('Please re-enter the same new password');
      </script>";
    }
    } else {
        echo "<script>
            alert('Please key in the correct current password');
          </script>";
    }

}

?>
<head>

  <title>Change Password</title>
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

  <h2 class="w3-black">Change Password</h2>
        <ul>
    <form name="display" action="changepassword.php" method="POST" >
        <span>Current Password</span>
        <p><input class="w3-input w3-padding-small w3-border" type='password'
            name='current_password' required/></p>

        <span>New Password</span>
        <p><input class="w3-input w3-padding-small w3-border" type='password' minlength="8"
           name='password' required/></p>

        <span>Confirm New Password</span>
        <p><input class="w3-input w3-padding-small w3-border" type='password' minlength="8"
            name='password_repeat' required/></p>
  
        <p><input class="w3-input w3-padding-small w3-border" type='hidden' value="<?php echo $user_id; ?>"
         name='user_id'/></p>

        <button class="w3-button w3-black" type="submit" name = "update" value="<?php echo $user_id; ?>">
        Change Password
        </button>

    </form>
        </ul>

</body>

<?php
include 'footer.php'
?>
</html>
