<!DOCTYPE html>
<?php
session_start();
include('connection.php');
$task_id = $_POST['edit'];
$isAdmin = $_SESSION["is_admin"];
$result = pg_query($db, "SELECT * FROM task WHERE task.task_id = $task_id");
$row = pg_fetch_assoc($result);
?>
<head>

  <title>Edit Task</title>
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

  <h2 class="w3-black">Edit Task</h2>
        <ul>
    <form name="display" action="editTask.php" method="POST" >
        <span>Title</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_title']; ?>"
            placeholder="Task Title" name='task_title'/></p>

        <span>Description</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_description']; ?>"
            placeholder="Task Description" name='task_description'/></p>

        <span>Cost</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_cost']; ?>"
            placeholder="Task Cost" name='task_cost'/></p>

        <span>Zipcode</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_zipcode']; ?>"
            placeholder="Task Zipcode" name='task_zipcode'/></p>

        <span>Duration</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_duration']; ?>"
            placeholder="Task Duration (in hour)" name='task_duration'/></p>

        <span>Start Date/Time</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['task_starttime']; ?>"
            placeholder="Task Start (eg. 2016-12-25 00:00:00)" name='task_starttime'/></p>

        <span>Availability</span>
        <p><input class="w3-input w3-padding-small w3-border" type='text' value="<?php echo $row['is_available']; ?>"
        placeholder="Is the task available?" name='is_available'/></p>

        

        <p><input class="w3-input w3-padding-small w3-border" type='hidden' value="<?php echo $row['task_id']; ?>"
         name='task_id'/></p>

        <span>Catalogue</span>
        <p>
            <select name="task_catalogue">
                <?php
                $result1 = pg_query($db, "SELECT name FROM catalogue");
                while ($row = pg_fetch_array($result1)) {
                    echo "<option value = " . $row["name"] . ">" . $row["name"] . " </option>";
                } ?>
            </select>
        </p>

        <button class="w3-button w3-black" type="submit" name = "editTask" value="<?php echo $row['task_id']; ?>">
        Edit task
        </button>

    </form>
        </br>
    <button class="w3-button w3-black"><a href="/viewAllTasks.php">View All Tasks</a></button>
        </ul>

  <?php

    if (isset($_POST['editTask'])) {  // Submit the insert SQL command
        $result = pg_query($db, "UPDATE task SET task_description = '$_POST[task_description]', task_cost = '$_POST[task_cost]', task_title = '$_POST[task_title]', task_zipcode = '$_POST[task_zipcode]', task_duration = '$_POST[task_duration]', task_catalogue = '$_POST[task_catalogue]', is_available = '$_POST[is_available]'
        WHERE task_id = '$_POST[task_id]'");

        if (!$result) {
            if ($isAdmin == 't') {
                echo "<script> 
                alert('Task not updated');
                location.href = 'searchtask.php';
                </script>"; 
            } else {
                echo "<script> 
                    alert('Task not updated');
                    location.href = 'viewowntasks.php';
                    </script>";
            }
        } else {
            if ($isAdmin == 't') {
                echo "<script> 
                alert('Task updated successfully');
                location.href = 'searchtask.php';
                </script>"; 
            } else {
                echo "<script>
                alert('Task updated successfully'); 
                location.href = 'viewowntasks.php';
                </script>";
            }
        }
    }
    ?>
</body>

<?php
include 'footer.php'
?>
</html>
