<?php
      session_start();
      include('connection.php');
      $accept = $_POST[accept];
      $arr = explode('//', $accept);
      $bidder = $arr[0];
      $taskid = $arr[1];

      //Set all bids to "rejected"
      $result =  pg_query($db, "UPDATE bid SET bid_status = '3' WHERE bid_taskid = '$taskid'");
      //Set the selected bid to "accepted"
      $result1 = pg_query($db, "UPDATE bid SET bid_status = '2' WHERE bid_userid = '$bidder' AND bid_taskid = '$taskid'"); 
      //Close the task
      $result2 = pg_query($db, "UPDATE task SET is_available = 'f' WHERE task_id = '$taskid'"); //Closed the task
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Accept Bid</title>
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
  <div class="w3-container w3-light-grey" style="padding:96px" id="home">
    <h3 class="w3-center">All Bids</h3>
    <p><div class="container">   
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-info">
    <?php 
              if(!$result || !$result1 || !$result2) {
                echo '<p>Bid not approved successfully!</p> ';
              }
              else if ($result && $result1 && $result2) {
                echo '<p>Bid approved successfully!</p>';
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