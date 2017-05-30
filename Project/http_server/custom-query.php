<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Custom Query Editor</title>
</head>
<body>
    <div id=header>
        <h2>Report Server</h2>
    </div>
    <div>
        <nav>
            <a href="/">Home</a>
            <a href="quick-stats.php">Quick Stats</a>
            <a href="custom-query.php">Custom Query</a>
            <a href="add-server.php">Add Server</a>
        </nav>
    </div>
    <div>
      <h4>Quick Stats</h4>
      <p>Enter a SQL query</p>
      <form action="custom-query.php">
        Custom Query: <input type="text" name="custom-query"><br>
        <input type="submit" value="Submit">
      </form>
      <table>
        <tbody>
          <?php
            include 'scripts/query.php';
            // Do not execute unless sql submitted
            if ($_GET["custom-query"]) != null) {
              customQuery($_GET["custom-query"]);
            }
          ?>
        </tbody>
      </table>
    </div>
</body>
</html>
