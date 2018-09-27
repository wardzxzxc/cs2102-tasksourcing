<!DOCTYPE html>
<head>
  <title>Create Task</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style>li {list-style: none;}</style>
</head>
<body>
  <h2>Create Task</h2>
  <ul>
    <form name='display' action='createTask.php' method='POST' >
      <li>Task ID:</li>
      <li><input type='text' name='task_id'/></li>
      <li>Task Cost:</li>
      <li><input type='text' name='task_cost'/></li>
      <li>Task Title:</li>
      <li><input type='text' name='task_title'/></li>
      <li>Task Description:</li>
      <li><input type='text' name='task_description'/></li>
      <li>Created:</li>
      <li><input type='text' name='task_datetime_created'
        value = '<?php echo date("Y-m-d H:i:s")?>'/></li>
      <li>Task Zipcode:</li>
      <li><input type='text' name='task_zipcode'/></li>
      <li>Task Duration (in hour):</li>
      <li><input type='text' name='task_duration'/></li>
      <li>Task Start (eg. 2016-12-25 00:00:00):</li>
      <li><input type='text' name='task_starttime'/></li>
      <li>Task End (eg. 2016-12-25 00:00:00):</li>
      <li><input type='text' name='task_endtime'/></li>
      <li>Available:</li>
      <select name = "is_available">
          <option value = ""> Select </option>
          <option value = "FALSE"> FALSE</option>
          <option value = "TRUE"> TRUE </option>
      </select>
      <li>Task Type:</li>
      <li><input type='text' name='task_type'/></li>
      <li>Task Winning Bid Id:</li>
      <li><input type='text' name='task_winningbid_id'/></li>
      <li>Task Owner:</li>
      <li><input type='text' name='task_owner'/></li>
      <li><input type='submit' name='createTask' value='Create Task'/></li>
    </form>
    <button><a href="index.php">Main Menu</a></button>
  </ul>

  <?php
    session_start();
    include('connection.php');

    if (isset($_POST['createTask'])) {  // Submit the insert SQL command
        $result = pg_query($db, "INSERT INTO task VALUES ('$_POST[task_id]', '$_POST[task_cost]',
        '$_POST[task_title]', '$_POST[task_description]', '$_POST[task_datetime_created]', '$_POST[task_zipcode]','$_POST[task_duration]',
        '$_POST[task_starttime]', '$_POST[task_endtime]', '$_POST [is_available]', '$_POST [task_type]', '$_POST [task_winningbid_id]', '$_POST [task_owner]')");
        if (!$result) {
            echo "Task not created";
        } else {
            echo "Task created successfully";
        }
    }
    ?>
</body>
</html>
