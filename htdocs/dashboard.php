<!DOCTYPE html>
<?php
  session_start();
  include('connection.php');
  $curUser = $_SESSION["user"];
  $isAdmin = $_SESSION["is_admin"];
?>
<html>
  <head>
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
  <div style="height: 100%">
    <?php 
      include 'navbar.php'
     ?>
  </div>

    <div class="col-sm-3 sidenav hidden-xs">
       <h2>Welcome </h2>
	        <ul class="nav nav-pills nav-stacked">
                      <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="#section1">Dashboard</a></li>
                      <?php
                      if(isset($_SESSION['isAdmin'])) {
                        echo '<li><a href="createTask.php">Create new task</a></li>';
                        echo '<li><a href="viewAllTasks.php">View All Tasks</a></li>';

                      } else {
                        echo '<li><a href="createTask.php">Create new task</a></li>';
                        echo '<li><a href="viewowntasks.php">View your tasks</a></li>';
                        echo '<li><a href="viewownbids.php">View your bids</a></li>';

                      }
                      ?>

      </ul><br>
    </div>
    <br>
    
    <div class="col-sm-9">
      <div class="well">
        <h4>Upcoming tasks</h4>
        <table class="table table-hover">
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Start Date/Time</th>
            <th>Duration</th>
            <th>Address</th>
            <th>Task Owner</th>
          </tr>
          <tbody>
            <?php 
              $result = pg_query($db, "SELECT * FROM task t, users u, bid b, users u1 WHERE 
                                    u.user_id = b.bid_userid AND t.task_id = b.bid_taskid
                                    AND u.user_id = '$curUser' AND b.bid_status = '2'
                                    AND t.task_owner = u1.user_id");
  
              if (pg_num_rows($result) > 0) {
  
                while($row = pg_fetch_array($result)) {
                  echo "<tr> ".
                          "<td> ". $row["task_title"]. " </td>".
                          "<td> ". $row["task_description"]. " </td>". 
                          "<td> ". $row["task_starttime"]. " </td>".
                          "<td> ". $row["task_duration"].  " hours</td>".
                          "<td> ". $row["task_zipcode"]. " </td>".
                          "<td> ". $row["email"].  "</td>".
                        "</tr>";
                }
  
              } else {
                echo ("No task this week! Go start one now! \n");
              }
            ?>
        </tbody>
        </table>
      </div>
      </div>

</body>
<?php include 'footer.html' ?>
</html>