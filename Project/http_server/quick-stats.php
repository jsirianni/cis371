<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Quick Stats</title>
</head>
<body>
    <div id=header>
        <h2>Quick Stats</h2>
    </div>
    <div>
        <nav>
          <a href="/">Home</a>
          <a href="quick-stats.php">Quick Stats</a>
          <a href="custom-query.php">Custom Query</a>
          <a href="manual-report.php">Manual Report</a>
        </nav>
    </div>
    <div class='result'>
      <form action="quick-stats.php">
        Override records to dislay: <input type="text" name="numrecords"><br>
        <input type="submit" value="Submit">
      </form>
      <table>
        <tbody>
          <?php
            include 'scripts/query.php';
            readLast20($_GET["numrecords"]);
          ?>
        </tbody>
      </table>
    </div>
</body>
</html>
