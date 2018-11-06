<?php
session_start();
include('connection.php');
$curUser = $_SESSION["user"];
$_POST['bid_taskid'] = $_POST['task_id'];

 ?>

 <!DOCTYPE html>
 <html>
  <head>
  <title>Search Bid</title>
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

        <?php
          $result = pg_query ($db, "SELECT * FROM bid, users WHERE bid_taskid = '$_POST[bid_taskid]' AND bid_userid = user_id ");
        ?>

        <table class="w3-table-all w3-hoverable">
          <tr>
            <th>Bid Cost</th>
            <th>Bid Time</th>
            <th>Bid Status</th>
            <th>Bid Owner</th>
          </tr>

          <?php
          while ($row = pg_fetch_row($result)){
          ?>
          <tr>
              <td><?php echo $row['0']; ?></td>
              <td><?php echo $row['1']; ?></td>
              <td><?php if ($row ['2'] == '1'){
                            echo "Pending";
                        } else if($row['2'] == '2'){ 
                            echo "Accepted";
                        }else {
                          echo "Rejected";
                        }?></td>
              <td><?php echo $row['9']; ?></td>
          </tr>
          <?php
          }
          ?>
        </table>
         <form action="createbid.php" method="POST" >
                <input type = "hidden" name = "taskid" value = <?php echo $_POST['bid_taskid'] ?> />
                <button class="w3-button w3-white w3-border w3-border-blue" type="submit" name = "accept">
                  <i class=" "></i> Bid
                </button>
      </form>

      </div>

<?php
include 'footer.php'
?>
</html>
