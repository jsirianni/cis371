<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <head>
    <title>Add Friend</title>
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
    <div class="container">
      <br>
      <?php
      if ($_COOKIE['admin'] == 1) {
        echo '<form action="addfriendconfirm.php" method="post">';
        echo 'First Name: <input type="text" name="fname"><br>';
        echo 'Last Name: <input type="text" name="lname"><br>';
        echo 'Phone Number: <input type="text" name="pnumber"><br>';
        echo 'Age: <input type="text" name="age"><br>';
        echo '<input type="submit">';
        echo '</form>';
      }
      else {
        echo "<p>You do not have permission to perform this task</p>";
      }
      ?>
    </div>
  </body>
</html>
