<?php
  session_start();
  include('connection.php');

  if(isset($_POST['delete'])) {
    $result1 = pg_query($db, "DELETE FROM bid WHERE bid_taskid = '$_POST[delete]'");
    $result2 = pg_query($db, "DELETE FROM task WHERE task_id = '$_POST[delete]'");
    if (!$result1 || !$result2) {
    echo 
         "Task deletion was unsuccessful";
    } else if ($result1 && $result2) {
      echo 
        "<script>
            alert('Task deleted successfully!');
            location.href = 'searchtask.php';
          </script>";
 
    }
  }
 ?>

 <!DOCTYPE html>
 <html>
  <head>
  <title>Search Task</title>
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

        <form action="searchtask.php" method="GET">
          <h4>Search for Task(s):</h4></br>
          <input type="text" name="title" placeholder="Title">
          <h6>
            By Catergory:
            <select id="category" name="category">
              <option value="">Catergory</option>
              <?php
                $result1 = pg_query($db, "SELECT name FROM catalogue");                                
                while($row = pg_fetch_array($result1)) {
                  echo   "<option value = " . $row["name"] . ">" . $row["name"] . " </option>";

                }?>
            </select>
          </h6></br>
          <h6>By Cost:</h6>
          <input type="text" name="cost" placeholder="Cost">
          <h6>By Task's Start Time (eg. 2016-12-25 00:00:00): </h6>
          <input type="text" name="starttimedate" placeholder="Date Time"></br></br>
          <button type="submit" name = "search" class="w3-button w3-grey">Go!</button>
        </form>
        
        <?php 
          include('connection.php');

          $title = $_GET["title"];
          $category = $_GET["category"];
          $cost = $_GET["cost"];
          $start = $_GET["starttimedate"];

          $arr = array("task_title"=>'%'.$title.'%', "task_catalogue"=>$category, "task_cost"=>$cost, "task_starttime"=>$start);
          $query_string = "";
          
          foreach($arr as $field => $value) {
            if ($value != '') {
              if ($query_string !== "") {
                $query_string = $query_string . " AND ";
              }
              if($field !== 'task_title') {
                  $query_string = $query_string . $field . " = '" . $value . "'" ;
                } else {
                  $query_string = $query_string . $field . " LIKE '" . $value . "'" ;
                }
            }
          }
  

          if ($query_string == "") {
            if($_SESSION['is_admin'] == 't') {
              $result = pg_query ($db, "SELECT * FROM task, users WHERE task_owner = user_id");
            } else {
              $result = pg_query ($db, "SELECT * FROM task, users WHERE task_owner = user_id AND is_available = 't'");
            }
          } else {
            if($_SESSION['is_admin'] == 't') {
              $query = "SELECT * FROM task, users WHERE task_owner = user_id AND " . $query_string . ";" ;
              $result = pg_query ($db, $query);
            } else {
              $query = "SELECT * FROM task, users WHERE task_owner = user_id AND is_available = 't' AND " . $query_string . ";" ;
              $result = pg_query ($db, $query);
            }
          }

        ?>


        <table class="w3-table-all">
          <tr>
            <th>Task Title</th>
            <th>Task Description</th>
            <th>Task Cost</th>
            <th>Task Zipcode</th>
            <th>Task Duration</th>
            <th>Task Start Time</th>
            <th>Task Availability</th>
            <th>Task Owner's Email</th>
            <th>Task Category</th>
            <th>Current Bid(s)</th>
            <?php 
              if($_SESSION['is_admin'] == 't') {
                echo '<th>Edit Task</th>';
                echo '<th>Delete Task</th>';
              }
            ?>
          </tr>
          
          <?php

          while ($row = pg_fetch_row($result)){
          ?>
          <tr>
              <td><?php echo $row['2']; ?></td>
              <td><?php echo $row['3']; ?></td>
              <td><?php echo $row ['1']?></td>
              <td><?php echo $row['5']; ?></td>
              <td><?php echo $row['6']; ?> hours</td>
              <td><?php echo $row['7']; ?></td>
              <td><?php if ($row['8'] == "t"){
                          echo "True";
                        }else{
                          echo "False";
                        }; ?></td>
              <td><?php echo $row['15']; ?></td>
              <td><?php echo $row['10']; ?></td>
              <td>
                <form action = "searchbid.php" method="POST">
                <input type = "hidden" name = "task_id" value = "<?php echo $row['0']; ?>"/>
                <button class="w3-button w3-black" type="submit">
                  View Current Bid
                </button>
                </form>
              </td>
              <?php 
              if($_SESSION['is_admin'] == 't') {
                echo '          
                      <td>
                        <form action = "editTask.php" method="POST">
                        <button class="w3-button w3-black" type="submit" name = "edit" value="'.$row['0'].'"">
                          Edit Task
                        </button>
                        </form>
                      </td>
                      <td>
                        <form action = "searchtask.php" method="POST">
                        <button class="w3-button w3-black" type="submit" name = "delete" value="'.$row['0'].'"">
                          Delete Task
                        </button>
                        </form>
                    </td>
                      ';
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
