<!DOCTYPE html>
<html>

  <head>
    <title>READ user with PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>li {list-style: none;}</style>
  </head>

  <body>
    <h2>Supply user Id you would like to read and enter:</h2>
    <ul>
      <form name="display" action="read.php" method="POST" >
        <li>User ID:</li>
        <li><input type="text" name="userid" /></li>
        <li><input type="submit" name="submit" /></li>
      </form>
    </ul>
    <?php
      session_start();
      include('connection.php');
      if (isset($_POST['submit'])) {
        $id = $_POST[userid];
        $query = "SELECT FROM users WHERE userid = $id";
        $execute = pg_query ($db, $query);
        if (!$execute) {
          echo "Problem with reading user: $id, please try again.";
        } else {
          echo "Successfully read user!";
        }
      }
    ?>
  </body>

</html>