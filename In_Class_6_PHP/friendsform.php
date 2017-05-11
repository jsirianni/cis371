<?php
// Joseph Sirianni
// In Class 6 - Friends Form

// Assign posted variables
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$pNumber = $_POST['pnumber'];
$age = $_POST['age'];

// Combine variables into comma delimited line
$line = $fireName + "," + $lastName + "," + $pNumber + "," + $age;

// Append the submission to a file
$f = fopen("friends.txt", "a");
fwrite($f, $line);
fclose($friendFile);
?>


<!--Build the html content -->
<html>
<body>
  Thank you for your submission! <br><br>

  First name: <?php echo $firstName; ?><br>
  Last name: <?php echo $lastName; ?><br>
  Phone number: <?php echo $pNumber; ?><br>
  Age: <?php echo $age; ?><br>
</body>
</html>
