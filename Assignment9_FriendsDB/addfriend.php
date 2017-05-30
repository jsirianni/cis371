<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="default.css" type="text/css"/>
  <head>
    <title>Friend's Form</title>
  </head>
  <body>
    <div>
        <nav>
            <a href="index.html">Home</a>
            <a href="populate.php">Populate Database</a>
            <a href="addfriend.php">Add a friend</a>
            <a href="showfriends.php">Show all friends</a>
        <nav>
    </div>
    <div class="container">
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
