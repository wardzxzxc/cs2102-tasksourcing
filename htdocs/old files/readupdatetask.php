<!DOCTYPE html>
<head>
<title>Updating task details</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>
<body>
<h2>Supply Task ID and enter</h2>
<ul>
<form name="display" action="readupdatetask.php" method="POST" >
<li>Task ID:</li>
<li><input type="text" name="taskid" /></li>
<li><input type="submit" name="submit" /></li>
</form>
<button><a href="index.php">Main Menu</a></button>
</ul>
<?php
    session_start();
      include('connection.php');

    $result = pg_query($db, "SELECT * FROM task WHERE task_id = '$_POST[taskid]'");
    $row    = pg_fetch_assoc($result);
    if (isset($_POST['submit'])) {
        echo "<ul><form name='readupdatetask' action='readupdatetask.php' method='POST'>
        <li>Task ID:</li>
        <li><input type='text' name='taskid_updated'
        value='$row[task_id]' /></li>

        <li>Task Cost:</li>
        <li><input type='text' name='taskcost_updated'
        value='$row[task_cost]' /></li>

        <li>Task Title:</li>
        <li><input type='text' name='tasktitle_updated'
        value='$row[task_title]' /></li>

        <li>Task Description:</li>
        <li><input type='text' name='taskdescription_updated'
        value='$row[task_description]' /></li>

        <li>Task Created:</li>
        <li><input type='text' name='taskcreation_updated'
        value='$row[task_datetime_created]' /></li>

        <li>Task Zipcode:</li>
        <li><input type='text' name='taskzipcode_updated'
        value='$row[task_zipcode]' /></li>

        <li>Task Duration:</li>
        <li><input type='text' name='taskduration_updated'
        value='$row[task_duration]' /></li>

        <li>Task Start:</li>
        <li><input type='text' name='taskstart_updated'
        value='$row[task_starttime]' /></li>

        <li>Task End:</li>
        <li><input type='text' name='taskend_updated'
        value='$row[task_endtime]' /></li>

        <li>Task Available:</li>
        <li><input type='text' name='taskavailability_updated'
        value='$row[is_available]' /></li>

        <li>Task Type:</li>
        <li><input type='text' name='tasktype_updated'
        value='$row[task_type]' /></li>

        <li>Task Minimum Bid:</li>
        <li><input type='text' name='taskbid_updated'
        value='$row[task_winningbid_id]' /></li>

        <li>Task Owner:</li>
        <li><input type='text' name='taskowner_updated'
        value='$row[task_owner]' /></li>

        <li><input type='submit' name='new' /></li>
        </form>

        </ul>";
    }
    if (isset($_POST['new'])) {
         $result = pg_query($db, "UPDATE task SET
                           task_id = '$_POST[taskid_updated]',
                           task_cost = '$_POST[taskcost_updated]',
                           task_title = '$_POST[tasktitle_updated]',
                           task_description = '$_POST[taskdescription_updated]',
                           task_datetime_created = '$_POST[taskcreation_updated]',
                           task_zipcode = '$_POST[taskzipcode_updated]',
                           task_duration = '$_POST[taskduration_updated]',
                           task_starttime = '$_POST[taskstart_updated]',
                           task_endtime = '$_POST[taskend_updated]',
                           is_available = '$_POST[taskavailability_updated]',
                           task_type = '$_POST[tasktype_updated]',
                           task_winningbid_id = '$_POST[taskbid_updated]',
                           task_owner = '$_POST [taskowner_updated]'
                           WHERE task_id = '$_POST[taskid_updated]'");

        $task_name = $_POST[taskid_updated] . ' ' . $_POST[tasktitle_updated];

                           if (!$result) {
                           echo "Update task details failed for task id $task_name!";
                           } else {
                           echo "Update task details successful for task id $task_name!";
                           }
                           }
                           ?>
</body>
</html>
