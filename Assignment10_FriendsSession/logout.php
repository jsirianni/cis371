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
        $blank = "";

        $auth_cookie = "auth";
        $admin_cookie = "admin";
        $username_cookie = "username";

        setcookie($auth_cookie, $blank, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");
        setcookie($admin_cookie, $blank, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");
        setcookie($username_cookie, $blank, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");
      ?>
      <a href="login.php">Login </a>
    </div>
  </body>
</html>
