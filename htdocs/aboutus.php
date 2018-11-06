<?php
session_start();
include('connection.php');

if ($_POST[password] == ($_POST[password_repeat])) {
  if (isset($_POST['signup'])) {  // Submit the insert SQL command
    $result = pg_query($db, "INSERT INTO users(first_name, last_name, email, phone, password, zipcode, is_admin) VALUES ('$_POST[first_name]',
      '$_POST[last_name]', '$_POST[email]', '$_POST[phone]', '$_POST[password]',
      '$_POST[zipcode]', 'FALSE')");
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
  <title>About Us</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./css/read.css">
  </head>

  <body>
    <div>
      <?php
        include 'navbar.php'
      ?>
    </div>

    <div class = "container" align ="center">
        <h1>About TASKTORTOISE</h1>
        <br>
        <span><p><b>Hey there fellow busy humans,</b></p></span>
        <br>
        <span><p><b>Welcome to Task Tortoise! Glad to have you here.</b></p></span>
        <br>
        <span><p>At Task Tortoise, we strongly believe that we are a community that can truly help one another out, at our convenience, at our own rate. Why worry? Or why hire a dedicated helper just for certain tasks you need for couple of hour or days? With tasktortoise's community, finding people to complete your task(s) is no longer a problem. You may even gain a friend!
        </p></span>
        <span><h3>Gain a friend. Lose a task.</h3></span>
        <br>
        <span><p>Regardless of the type of tasks you have be it walking your dog, babysitting, grocery shopping or anything you can think of, you can easily create your own task and choose your own helper!</p></span>
        <?php
        echo "<br>";
        echo '
        <img src="/img/tasktortoise.jpg" width="255" height="255" title="tasktortoise" alt="tasktortoise" />
        ';
        ?>
    </div>

</body>
<?php
include 'footer.php'
?>
</html>
