<div style="top:0; width:100%">
  <div class="w3-bar w3-white w3-wide w3-padding w3-card">
    <a href="index.php" class="w3-bar-item w3-button">TASK TORTOISE</a>
    <!-- Float links to the right. Hide them on small screens -->
    <div class="w3-right w3-hide-small">
      <a href="index.php" class="w3-bar-item w3-button">Home</a>
      <?php
      	session_start();
      	if(isset($_SESSION["user"])) {
      		echo '<a href="logout.php" class="w3-bar-item w3-button">Logout</a>';
      	} else {
      		echo '<a href="login.php" class="w3-bar-item w3-button">Login</a>';
      	}
       ?>
      <a href="aboutus.php" class="w3-bar-item w3-button">About</a>
      <a href="searchtask.php" class="w3-bar-item w3-button">Search</a>
    </div>
  </div>
</div>
