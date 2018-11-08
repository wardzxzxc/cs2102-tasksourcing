<?php
      session_start();
      include('connection.php');
      $curUser = $_SESSION["user"];
      $_POST['taskid'] = $_POST['view'];
    
      $maximumbid = pg_query($db, "SELECT MAX(bid_cost) FROM bid b, users u WHERE b.bid_userid = u.user_id AND b.bid_taskid = '$_POST[taskid]'");
    
      $result = pg_query($db, "SELECT * FROM bid b, users u WHERE b.bid_userid = u.user_id AND b.bid_taskid = '$_POST[taskid]' ORDER BY bid_cost, bid_datetime");
    
      $result1 = pg_query($db, "SELECT * FROM bid b, users u WHERE b.bid_userid = u.user_id AND b.bid_taskid = '$_POST[taskid]' AND b.bid_status = 2 ORDER BY bid_cost, bid_datetime");
?>
<!DOCTYPE html>
<html>
 <head>
    <title>View All Bids</title>
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

<!-- Login Section !-->
<div class="w3-container w3-light-grey" style="padding:96px" id="home">

<h2 style="color:red; font-family:verdana; text-align:center;">
<?php
    $row = pg_fetch_row($maximumbid);
    echo "Current Highest Bid: $";
    echo $row[0];
?>
</h2>
      <h3 class="w3-center">All Bids</h3>
      <p><div class="container">   
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-info">
        <?php
            
            // while($row = pg_fetch_assoc($result)){ 
            //   if ($row["bid_status"] == 2) {
            //     $bidAccepted = 1;
            //     echo $bidAccepted;
            //   }
            // }
            
            while($row = pg_fetch_assoc($result)){   //Creates a loop to loop through results

            echo 
            '<div class="panel-body" style="border: 2px solid black;">
              Bidder: '.$row["email"].'</br>
              Status: ';
            if ($row["bid_status"] == 1) {
              echo 'Pending';
            } else if ($row["bid_status"] == 2) {
              echo 'Accepted';
            } else {
              echo 'Rejected';
            }
            echo '</br>
              Bid Amount: $'.$row["bid_cost"].' </br>
              Bid Created Date/Time: '.$row["bid_datetime"].' </br>
            </div>';
            
            if (pg_numrows($result1) == 0) {
              echo '
              <div class="w3-row-padding" style="margin-top:64px padding:128px 16px">
                <div class="w3-content" align="center">
                  <form action="acceptbid.php" method="POST" >
                      <button class="w3-button w3-black" type="submit" name = "accept" value = "'.$row["user_id"]. "//" .$row["bid_taskid"].'">
                          Accept bid
                      </button>
                  </form>
                </div>
              </div>';
            }
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
