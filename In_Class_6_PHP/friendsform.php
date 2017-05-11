<?php
// Joseph Sirianni
// In Class 6 - Friends Form

// Assign posted variables
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$pNumber = $_POST['pnumber'];
$age = $_POST['age'];
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
