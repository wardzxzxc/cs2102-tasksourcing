<!DOCTYPE html>
<?php
  session_start();
  include('connection.php');
  $curUser = $_SESSION["user"];
?>
<head>

  <title>Create Task</title>
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

  <h2 class="w3-black">Create Task</h2>
        <ul>
    <form name="display" action="createTask.php" method="POST" >
        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Task Cost" name='task_cost'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Task Title" name='task_title'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Task Description" name='task_description'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Zipcode" name='task_zipcode'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Task Duration (in hour)" name='task_duration'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Task Start (eg. 2016-12-25 00:00:00)" name='task_starttime'/></p>

        <p>
            <select name="task_catalogue">
                <?php
                $result1 = pg_query($db, "SELECT name FROM catalogue");                                
                while($row = pg_fetch_array($result1)) {
                  echo   "<option value = " . $row["name"] . ">" . $row["name"] . " </option>";

                }?>
            </select>
        </p>

        <p><input class="w3-button w3-black" type='submit' name='createTask'/></p>
    </form>
        </br>
    <button class="w3-button w3-black"><a href="/dashboard.php">Main Menu</a></button>
        </ul>

  <?php

    if (isset($_POST['createTask'])) {  // Submit the insert SQL command
        $date = date('Y-m-d H:i:s');

        $result = pg_query($db, "INSERT INTO task (task_cost, task_title, task_description, task_datetime_created, task_zipcode,
                     task_duration, task_starttime, is_available, task_owner, task_catalogue) VALUES
                     ('$_POST[task_cost]', '$_POST[task_title]', '$_POST[task_description]', '$date', '$_POST[task_zipcode]',
                     '$_POST[task_duration]', '$_POST[task_starttime]', '1', '$curUser', '$_POST[task_catalogue]')");

        if (!$result) {
            echo '<div class="message"> Task not created </div>';
        } else {
            echo '<div class="message"> Task created successfully </div>';
        }
    }
    ?>
</body>

<?php
    include 'footer.php'
?>
</html>
