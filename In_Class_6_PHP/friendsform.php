<?php
// Joseph Sirianni
// In Class 6 - Friends Form


$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$pNumber = $_POST['pnumber'];
$age = $_POST['age'];


?>

<html>
<body>
  Thank you for your submission! <br><br>
  First name: <?php echo $firstName; ?><br>
  Last name: <?php echo $lastName; ?><br>
  Phone number: <?php echo $pNumber; ?><br>
  Age: <?php echo $age; ?><br>
</body>
</html>
