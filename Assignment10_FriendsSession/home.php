<?php if ($validLogin == 0) { header("Location: login.php");} ?>

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
            <a href="populate.php">Populate Database</a>
            <a href="addfriend.php">Add a friend</a>
            <a href="showfriends.php">Show all friends</a>
            <a href="logout.php">Logout </a>
        <nav>
    </div>
    </div>
        <p>You are authenticated</p>
    <div>
  </body>
</html>
