<?php
include 'scripts/functions.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <head>
    <title>Logout</title>
    <h3>Friends Database</h3>
  </head>
  <body>
    <div>
      <p>You have been logged out</p>
      <?php
      echo '<form action="login.php" method="post">';
      echo 'Username: <input type="text" name="uName"><br>';
      echo 'Password: <input type="text" name="pWord"><br>';
      echo '<input type="submit">';
      echo '</form>';
      ?>
    </div>
  </body>
</html>
