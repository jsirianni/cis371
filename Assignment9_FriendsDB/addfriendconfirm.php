<?php
// Joseph Sirianni
// In Class 6 - Friends Form

// Import php functions
include 'functions.php';

// Assign posted variables
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$pNumber = $_POST['pnumber'];
$age = $_POST['age'];

// Combine variables into comma delimited line
$line = $firstName . "," . $lastName . "," . $pNumber . "," . $age . "\n";

// Append the submission to a file
$f = fopen("./friends.txt", "a");
fwrite($f, $line);
fclose($friendFile);

// Call table creation function and populate the table
initTable();
popTable();

?>
<!--Build the html content -->
<html>
<link rel="stylesheet" href="default.css" type="text/css"/>
<head>
  <head>
    <title>Friends Home</title>
    <h3>Friends Database</h3>
  </head>
</head>
<body>
  <div>
      <nav>
          <a href="index.html">Home</a><br>
          <a href="populate.php">Populate Database</a><br>
          <a href="addfriend.php">Add a friend</a><br>
          <a href="showfriends.php">Show all friends</a>
      <nav>
  </div>
  <div>
    <p>Thank you for your submission, it has been recorded in a database!</p>
    <a>First name: <?php echo $firstName; ?></a>
    <a>Last name: <?php echo $lastName; ?></a>
    <a>Phone number: <?php echo $pNumber; ?></a>
    <a>Age: <?php echo $age; ?></a>
  </div>
</body>
</html>
