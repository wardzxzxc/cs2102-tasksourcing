<?php
session_start();
include('connection.php');
        $curruser = $_SESSION["user"]; //Person that wants to bid
        $taskid = $_POST["taskid"];
        $result = pg_query($db, "SELECT * FROM task t, users u WHERE t.task_id = '$taskid' AND t.task_owner = u.user_id");
        $row = pg_fetch_assoc($result);
    

        date_default_timezone_set('Asia/Singapore');
        $date = date("Y-m-d H:i:s");

         if (isset($_POST['bid'])) {
              $result = pg_query($db, "INSERT INTO bid (bid_cost, bid_datetime, bid_status, bid_userid, bid_taskid)
              VALUES('$_POST[amount]','$date','1','$curruser', '$_POST[task]')");
              if($result) 
                  echo "<script> 
                    alert('Bid successful!'); 
                    location.href = 'searchtask.php';
                </script>";
              else {
                  echo "<script>
                    alert('Bid unsuccessful!'); 
                    location.href = 'searchtask.php';
                </script>";    
              }  
            }         
      ?> 
<!DOCTYPE html>
    <html>
    <head>
        <title>Create Bid</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="./css/login.css">
    </head>
    <body>
        <div style="height: 100%">
            <?php 
                include 'navbar.php'
             ?>
        </div>

        <div class="w3-container w3-light-grey" style="padding:96px" id="home">
          <h3 class="w3-center">Bid for Task!</h3>
          <p><div class="container">   
            <div class="row">
              <div class="col-sm-12">
                <div class="panel panel-info">
                  <div class="panel-heading" align="center"><b> <?php echo $row["title"]; ?></b></div>
                  <div class="panel-body" align = "center">
                    Creator: <?php echo $row["email"]; ?></br>
                    Type: <?php echo $row["task_catalogue"]; ?></br>
                    Start Date/Time: <?php echo $row["task_starttime"]; ?></br>
                    Duration: <?php echo $row["task_duration"]; ?></br>
                    Price: $<?php echo $row["task_cost"]; ?></br>
                    Description: <?php echo $row["task_description"]; ?></br></br>
                    </div>
                </div>
              </div>
            </div>
          </div></p>
           <div class="w3-row-padding" style="margin-top:64px padding:128px 16px">
            <div class="w3-content" align="center">
              <form action="createbid.php" method="POST" >
                <p><input type="hidden" name="task" value = "<?php echo $taskid; ?>"></p>
                <p><input class="w3-input w3-border" type="number" placeholder="Amount" name="amount"></p>
                <p>
                 <button class="w3-button w3-white w3-border w3-border-blue" type="submit" name = "bid">
                   BID
                 </button>
               </p>
               </p>
              </form>
          </div>
      </div>
  </div>
</body>
<!-- Footer -->
<?php
include 'footer.html';
?>
</html>
