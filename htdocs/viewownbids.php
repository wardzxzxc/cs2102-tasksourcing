<?php
      session_start();
      include('connection.php');
      $curUser = $_SESSION["user"];
      $result = pg_query($db, "SELECT * FROM bid b, task t, users u WHERE b.bid_userid = '$curUser' AND b.bid_taskid = t.task_id AND t.task_owner = u.user_id");
  ?> 


<!DOCTYPE html>
<html>
<head>
	<title>View Own Bids</title>
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

	  <div class="w3-container w3-light-grey">
	      <div class="container">   
	        <div class="row">
	          <div class="col-sm-12">
	            <div class="panel panel-info">
	              <?php 
	                if(!$result) {
	                	echo '<p>You have not created any bids</p>';
	                }
	                
	                while($row = pg_fetch_assoc($result)) { 
		                echo 
		                '<div class="panel-body">
			                    Task Owner: '.$row["email"]. '</br>
			                    Title: '.$row["task_title"]. '</br>
			                    Description: '.$row["task_description"]. '</br>
			                    Status: '.$row["bid_status"]. '</br>
			                    Bid Date: '.$row["bid_datetime"]. '</br>
			                    Bid Amount: $'.$row["bid_cost"]. '</br></br>
		                </div>                     	
	                    <hr>';
	                }
	                ?>
	              	</div>
	              </div>
	          </div>
	      </div>
	  </div>

</body>

<!-- Footer -->
<?php include 'footer.html'; ?>
</html>