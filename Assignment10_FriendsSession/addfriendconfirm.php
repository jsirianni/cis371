<?php
include 'scripts/functions.php';
// Calls add row function. Returns a username
$x = addRow($_POST['fname'], $_POST['lname'], $_POST['pnumber'], $_POST['age']);
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
        <a href="accounts.php">Accounts</a>
      <nav>
  </div>
  <div>
    <p>Thank you for your submission, it has been recorded in a database!</p>
    <a>Username:     <?php echo $x;?>                 </a><br>
    <a>First name:   <?php echo $_POST['fname'];?>    </a><br>
    <a>Last name:    <?php echo $_POST['lname'];?>    </a><br>
    <a>Phone number: <?php echo $_POST['pnumber'];?>  </a><br>
    <a>Age:          <?php echo $_POST['age'];?>      </a><br>
  </div>
</body>
</html>
