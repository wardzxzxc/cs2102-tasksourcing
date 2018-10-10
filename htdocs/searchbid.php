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
  <title>Search Bid</title>
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

      <div class = "container">

        <?php
          $result = pg_query ($db, "SELECT * FROM bid");
          $result2 = pg_query($db, "SELECT user_id, first_name, last_name FROM users");
        ?>

        <table class="w3-table-all w3-hoverable">
          <tr>
            <th>Bid Cost</th>
            <th>Bid Time</th>
            <th>Bid Status</th>
            <th>Bid Owner</th>
          </tr>

          <?php
          while ($row = pg_fetch_row($result)){
          ?>
          <tr>
              <td><?php echo $row['0']; ?></td>
              <td><?php echo $row['1']; ?></td>
              <td><?php if ($row ['2'] == '1'){echo "Pending";}
                        elseif($row['2'] == '2'){echo "Accepted";}
                        else{echo "Rejected";}?></td>
              <td><?php
                  while ($row2 = pg_fetch_row($result2)){
                  ?>
                  <?php
                  if ($row['3'] == $row2['0']){
                    echo $row2['1'], $row2['2'];
                  }
                  ?>
              </td>
                  <?php
                  }
                  ?>
          </tr>
          <?php
          }
          ?>
        </table>

      </div>

<?php
include 'footer.php'
?>
</html>
