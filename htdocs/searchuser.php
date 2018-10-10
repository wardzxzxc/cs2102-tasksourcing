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
  <title>Search User</title>
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

    <form action="searchuser.php" method="POST">
      <div class = "container">
        <h1> Search User</h1>
        <p> Please supply the userId you would like to look for</p>
        <hr>
        <label for="user_id"><b>User ID:</b></label>
	 			<input type="text" placeholder="Enter User ID" name="user_id" required
	 			value="<?php echo isset($_POST['user_id']) ? $_POST['user_id'] : '' ?>">

        <div class = "clearfix">
          <a href = "searchuser.php">
            <button type="submit">Search</button>
          </a>
        </div>


        <?php
          echo "<br>";
          if(isset($_POST['user_id'])){
            $id = $_POST['user_id'];
            $result = pg_query($db, "SELECT * FROM users WHERE user_id = $id");
            $row = pg_fetch_row($result);
        ?>

        <table class="w3-table-all w3-hoverable">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
          </tr>
          <tr>
            <td><?php echo $row['1']; ?></td>
            <td><?php echo $row['2']; ?></td>
            <td><?php echo $row['3']; ?></td>
            <td><?php echo $row['4']; ?></td>
          </tr>
        </table>
        <?php
          }
        ?>
      </div>
    </form>
<?php
include 'footer.php'
?>
</html>
