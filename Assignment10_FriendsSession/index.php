<?php
include 'scripts/functions.php';
include 'scripts/accountFunctions.php';

$user = $_POST['uName'];
$pass = $_POST['pWord'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <head>
    <title>Login</title>
    <h3>Friends Database</h3>
  </head>
  <body>
    <div>
      <?php
      // Check if user and password is valid
      if (accountLookup() == true) {
        echo "<p>You are authenticated</p>"
        echo '<nav>';
            echo '<a href="home.html">Home</a>';
            echo '<a href="populate.php">Populate Database</a>';
            echo '<a href="addfriend.php">Add a friend</a>';
            echo '<a href="showfriends.php">Show all friends</a>';
        echo '<nav>';
      } else {
        echo '<form action="index.php" method="post">';
          echo 'Username: <input type="text" name="uName"><br>';
          echo 'Password: <input type="text" name="pWord"><br>';
          echo '<input type="submit">';
        echo '</form>';
      }
      ?>

    </div>
  </body>
</html>