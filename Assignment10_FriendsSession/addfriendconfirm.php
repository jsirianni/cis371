<?php
include 'scripts/functions.php';
addRow($_POST['fname'], $_POST['lname'], $_POST['pnumber'], $_POST['age']);
?>

<html>
<link rel="stylesheet" href="styles/default.css" type="text/css"/>
<head>
  <head>
    <title>submission Confirmation</title>
    <h3>Friends Database</h3>
  </head>
</head>
<body>
  <div>
      <nav>
        <a href="home.html">Home</a>
        <a href="populate.php">Populate Database</a>
        <a href="addfriend.php">Add a friend</a>
        <a href="showfriends.php">Show all friends</a>
      <nav>
  </div>
  <div>
    <p>Thank you for your submission, it has been recorded in a database!</p>
    <a>First name:   <?php echo $firstName;?>  </a><br>
    <a>Last name:    <?php echo $lastName;?>   </a><br>
    <a>Phone number: <?php echo $pNumber;?>    </a><br>
    <a>Age:          <?php echo $age;?>        </a><br>
  </div>
</body>
</html>
