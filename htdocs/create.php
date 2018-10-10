<!DOCTYPE html>  
<head>

  <title>Create User</title>
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

</head>
<body>
    <div>
        <?php
            include 'navbar.php'
        ?>
    </div>

  <h2 class="w3-black">Create User</h2>
  <ul>
    <form name="display" action="create.php" method="POST" >
        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="First Name" name='first_name'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Last Name" name='last_name'/></p>

        <p><select class="w3-light-grey w3-dropdown-click w3-padding-16 w3-border" name = "gender">
        <option value = ""> Select Gender </option>
        <option value = "Male"> Male </option>
        <option value = "Female"> Female </option>
        </select></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Email" name='email'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Phone" name='phone'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Password" name='password'/></p>

        <p><input class="w3-input w3-padding-small w3-border" type='text'
            placeholder="Zipcode" name='zipcode'/></p>

        <p><select class="w3-light-grey w3-dropdown-click w3-padding-16 w3-border" name = "is_admin">
        <option value = ""> Will the user be an admin? </option>
        <option value = "True"> True </option>
        <option value = "False"> False </option>
        </select></p>
      <li><input class="w3-button w3-black" type='submit' name='create'/></li>
    </form>
        </br>
    <button class="w3-button w3-black"><a href="index.php">Main Menu</a></button>
  </ul>
  
  <?php
    $db = pg_connect("host=localhost port=5432 dbname=Project1 user=postgres password=jinwei95");

    if (isset($_POST['create'])) {  // Submit the insert SQL command
        $result = pg_query($db, "INSERT INTO users (first_name, last_name, gender, email, phone, password, zipcode, is_admin) VALUES ('$_POST[first_name]', '$_POST[last_name]', '$_POST[gender]', '$_POST[email]', '$_POST[phone]', '$_POST[password]', '$_POST[zipcode]', '$_POST[is_admin]')");
        if (!$result) {
            echo '<div class="message"> User not created </div>';
        } else {
            echo '<div class="message"> User created successfully </div>';
        }
    }
    ?>  
</body>

<?php
    include 'footer.php'
?>
</html>
