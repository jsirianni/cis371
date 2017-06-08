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
      // Clear session values and cookie
      $_POST = array();
      $auth_cookie = "auth";
      $$auth_status = "no";
      setcookie($auth_cookie, $auth_status, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");
      $_POST = array();
      ?>
      <a href="login.php">Login </a>
    </div>
  </body>
</html>
