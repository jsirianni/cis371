<?php
// Joseph Sirianni
// In Class 6 - Friends Form

// Import php functions
include 'friendsdb.php';

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
<body>
  Thank you for your submission, it has been recorded in a database! <br><br>

  First name: <?php echo $firstName; ?><br>
  Last name: <?php echo $lastName; ?><br>
  Phone number: <?php echo $pNumber; ?><br>
  Age: <?php echo $age; ?><br>
  <br>
  <link rel='myfriends' type='text/php' href='myfriends.php'>

  <?php
  // Print the table contents to the web page
  readTable();
  ?>
</body>
</html>
