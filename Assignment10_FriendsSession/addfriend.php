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
          <a href="home.html">Home</a>
          <a href="populate.php">Populate Database</a>
          <a href="addfriend.php">Add a friend</a>
          <a href="showfriends.php">Show all friends</a>
        <nav>
    </div>
    <div class="container">
      <br>
      <form action="addfriendconfirm.php" method="post">
        First Name: <input type="text" name="fname"><br>
        Last Name: <input type="text" name="lname"><br>
        Phone Number: <input type="text" name="pnumber"><br>
        Age: <input type="text" name="age"><br>
        <input type="submit">
      </form>
    </div>
  </body>
</html>
