<!DOCTYPE html>
<html>

  <head>
    <title>DELETE user with PHP</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>li {list-style: none;}</style>
  </head>

  <body>
    <h2>Supply task ID you would like to delete and enter:</h2>
    <ul>
      <form name="display" action="deleteTask.php" method="POST" >
        <li>Task ID:</li>
        <li><input type="text" name="task_id" /></li>
        <li><input type="submit" name="submit" /></li>
      </form>
      <button><a href="index.php">Main Menu</a></button>
    </ul>
    <?php
      session_start();
      include('connection.php');

      if (isset($_POST['submit'])) {

    		$id = $_POST[task_id];
    		$query = "DELETE FROM tasks WHERE task_id = $id";
        $execute = pg_query ($db, $query);

    		if (!$execute) {
          echo "Problem with removing task: $task, please try again.";
    		} else {
    			echo "Successfully removed task!";
    		}
      }
    ?>
  </body>

</html>
