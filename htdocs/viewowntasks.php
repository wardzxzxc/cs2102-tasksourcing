 <?php
      session_start();
      include('connection.php');
      $curUser = $_SESSION["user"];
      $result = pg_query($db, "SELECT * FROM task WHERE task_owner = '$curUser'");
      
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
              location.href = 'viewowntasks.php';
            </script>";
   
      }
    }
  ?> 

<!DOCTYPE html>
<html>
  <head>
    <title>View Own Tasks</title>
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

<div class="w3-container w3-light-grey">
      <div class="container">   
        <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-info">
              <?php 
                if(pg_num_rows($result) == 0) {
                            echo '<p>You have not created any task for viewing!</p> </div> </div> </div>';
                          }
                      while($row = pg_fetch_assoc($result)){ 
                      echo '
                          <div class="panel-body">
                            Title: '.$row["task_title"]. '</br>
                            Category: '.$row["task_catalogue"]. '</br>
                            Start Date/Time: '.$row["task_starttime"]. '</br>
                            Duration: '.$row["task_duration"]. '</br>
                            Price: $'.$row["task_cost"]. '</br>
                            Availability: ';
                            
                       if ($row["is_available"] == 't'){
                          echo 'True';
                       } else {
                         echo 'False';
                       }
                      echo '</br>
                            Description: '.$row["task_description"]. '</br></br>
                          </div>

                          <div class="button-container" align="center">

                            <form action="viewbids.php" method="POST">
                              <div>
                                <button class="w3-button w3-black" type="submit" name = "view" value="'.$row['task_id'].'"">
                                  View bids
                                </button>
                              </div>
                            </form>

                            <form action="edittask.php" method="POST">
                              <div>
                    		        <input type = "hidden" name = "user" value = '.$curUser.' />
                                <button class="w3-button w3-black" type="submit" name = "edit" value="'.$row['task_id'].'"">
                                  Edit task
                                </button>
                              </div>
                            </form>
                            
                            <form action="viewowntasks.php" method="POST">
                              <div>
                    		        <input type = "hidden" name = "user" value = '.$curUser.' />
                                <button class="w3-button w3-black" type="submit" name = "delete" value="'.$row['task_id'].'"">
                                    Delete task
                                </button>
                              </div>
                            </form>

                          </div>
                        <hr />';
                      }
          ?>
         </div>
        </div>
      </div>
      </div>
    </p>
    </div>


</body>

<!-- Footer -->
<?php include 'footer.html'; ?>
</html>