<?php
include 'scripts/functions.php';

// Assign user and password if posted
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
        if (accountLookup($user, $pass) == false) {
          echo '<form action="login.php" method="post">';
          echo 'Username: <input type="text" name="uName"><br>';
          echo 'Password: <input type="text" name="pWord"><br>';
          echo '<input type="submit">';
          echo '</form>';
        } else {
          // Set cookies
          $auth_cookie = "auth";
          $auth_status = "yes";
          setcookie($auth_cookie, $auth_status, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");

          $x = checkSudo($user);
          $admin_cookie = "admin";
          $admin_status = (string)$x;
          setcookie($admin_cookie, $admin_status, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");

          $username_cookie = "username";
          $user_status = $user;
          setcookie($username_cookie, $user_status, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");

          // Redirect user
          header("Location: home.php");
        }
      ?>
    </div>
  </body>
</html>
