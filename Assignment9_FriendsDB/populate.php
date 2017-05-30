<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
  <link rel="stylesheet" href="default.css" type="text/css"/>
  <head>
    <title>Friends Home</title>
  </head>
  <body>
    <div>
        <nav>
            <a href="populate.php">Populate Database</a>
            <a href="addfriend.php">Add a friend</a>
            <a href="showfriends.php">Show all friends</a>
        <nav>
    </div>
    <div>
      <?php
        // Populate the table
        popTable();

        // Display text
        echo "<p>The database has been populated!</p>";
      ?>
    </div>
  </body>
</html>
