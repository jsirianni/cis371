<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Quick Stats</title>
</head>
<body>
    <section>
    <div id=header>
        <h1>Quick Stats</h1>
    </div>
    <div class="nav">
        <nav>
          <ul>
            <li><a href="/">Home</a></li>
            <li><a href="quick-stats.php">Quick Stats</a></li>
            <li><a href="custom-query.php">Custom Query</a></li>
            <li><a href="manual-report.php">Manual Report</a></li>
          </ul>
        </nav>
    </div>
    </section>
    <div class="content">
      <form action="quick-stats.php">
         Records to display: <input type="text" name="numrecords">
        <input type="submit" value="Submit">
      </form>
      <br>
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
