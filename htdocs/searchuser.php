<?php
session_start();
include('connection.php');

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

    <form action="searchuser.php" method="GET">
      <div class = "container">
        <h1> Search User</h1>
        <p> Please supply the email pf the user you would like to look for</p>
        <hr>
        <label for="email"><b>Email:</b></label>
	 			<input type="text" placeholder="Enter Email" name="email" required>
        <div class = "clearfix">
            <button type="submit" name="search">Search</button>
          </a>
        </div>
        <br>
      </form>


        <?php
          if(isset($_GET['email'])){
            $email = $_GET['email'];
            $result = pg_query($db, "SELECT * FROM users WHERE email = '$email'");
          } else {
            $result = pg_query($db, "SELECT * FROM users");
          }
        ?>

        <table class="w3-table-all w3-hoverable">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Gender</th>
            <th>Email</th>
            <?php if($_SESSION['is_admin'] == 't') {
              echo '<th>Edit</th>';
            }
            ?>
          </tr>
          <?php while ($row = pg_fetch_row($result)) { ?>
          <tr>
            <td><?php echo $row['1']; ?></td>
            <td><?php echo $row['2']; ?></td>
            <td><?php echo $row['3']; ?></td>
            <td><?php echo $row['4']; ?></td>
            <?php if($_SESSION['is_admin'] == 't') {
              echo '
              <td><form action = "edituser.php" method="POST">
              <button class="w3-button w3-black" type="submit" name = "edit" value="'.$row['0'].'"">
                Edit User
              </button>
              </form></td>';
            }
            ?>
          </tr>
          <?php } ?>
        </table>
      </div>
<?php
include 'footer.php'
?>
</html>
