<?php
// Joseph Sirianni
// In Class 6 - Friends Form


$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$pNumber = $_POST['pnumber'];
$age = $_POST['age'];

echo $firstName;
echo $lastName;
echo $pNumber;
echo $age;

?>

<p>Thank you for your submission <?phpecho $_POST["fname"]; ?></p>
