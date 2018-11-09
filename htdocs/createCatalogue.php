<!DOCTYPE html>  
<head>

  <title>Create Catalogue Item</title>
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

    <h2 class="w3-black">Create Catalogue Item</h2>
        <ul>
    <form name="display" action="createCatalogue.php" method="POST" >
        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Catalogue Name" name='catalogue_name'/></p>

        <p><input class="w3-button w3-black" type='submit' name='createCatalogue'/></p>
    </form>
        </br>
    <button class="w3-button w3-black"><a href="index.php">Main Menu</a></button>
        </ul>
  
  <?php
    session_start();
    include('connection.php');

    if (isset($_POST['createCatalogue'])) {  // Submit the insert SQL command

        // Default Way (Working)
        /* $result = pg_query($db, "INSERT INTO catalogue (name) VALUES ('$_POST[name]')"); */
        
        // Method 1 (Not Working)
        /* $result = pg_query($db, "CALL create_catalogue('".$_POST["name"]."')"); */
        
        // Method 2
        $result = pg_query($db, "SELECT create_catalogue('$_POST[catalogue_name]')");
      
        if (!$result) {
            echo '<div class="message"> Catalogue Item not created </div>';
        } else {
            echo '<div class="message"> Catalogue Item created successfully </div>';
        }
    }
    ?>  
</body>

<?php
    include 'footer.php'
?>
</html>
