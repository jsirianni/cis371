<?php
  if ($_COOKIE['auth'] != "yes") {
    // Redirect user
    header("Location: home.php");
  }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <head>
    <title>Friends Home</title>
    <h3>Friends Database</h3>
  </head>
  <body>
    <div>
        <nav>
          <a href="home.php">Home</a>
          <a href="addfriend.php">Add a friend</a>
          <a href="showfriends.php">Show all friends</a>
          <a href="accounts.php">Show Accounts</a>
          <a href="logout.php">Logout </a>
        <nav>
    </div>
    </div>
        <p>You are authenticated</p>
        <?php
          $currentUser = $_COOKIE['username'];
          echo "<a>Your username is $currentUser</a><br>";
          if ($_COOKIE['admin'] == 1) {
            echo "<a>You are an administrator</a><br>";
          }
          else {
            echo "<a>You are a user</a><br>";
          }
        ?>
    <div>
  </body>
</html>
