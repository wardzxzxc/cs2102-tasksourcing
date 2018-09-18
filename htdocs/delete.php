<!DOCTYPE html>
<html>

  <head>
    <title>DELETE user with PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>li {list-style: none;}</style>
  </head>

  <body>
    <h2>Supply user Id you would like to delete and enter:</h2>
    <ul>
      <form name="display" action="delete.php" method="POST" >
        <li>User ID:</li>
        <li><input type="text" name="user_id" /></li>
        <li><input type="submit" name="submit" /></li>
      </form>
      <button><a href="index.php">Main Menu</a></button>
    </ul>
    <?php
      session_start();
      include('connection.php');

      if (isset($_POST['submit'])) {

    		$id = $_POST[user_id];
    		$query = "DELETE FROM users WHERE user_id = $id";
        $execute = pg_query ($db, $query);

    		if (!$execute) {
          echo "Problem with removing user: $id, please try again.";
    		} else {
    			echo "Successfully removed user!";
    		}
      }
    ?>
  </body>

</html>
