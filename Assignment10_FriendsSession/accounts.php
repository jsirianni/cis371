<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <head>
    <title>Show Friends</title>
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
    <div>
      <?php
        if ($_COOKIE['admin'] == 1) {
          include 'scripts/functions.php';
          readAccounts();
        }
        else {
          echo "<p>You do not have permission to perform this task</p>";
        }
      ?>
    </div>
  </body>
</html>
