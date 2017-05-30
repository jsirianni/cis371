<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Manual Report</title>
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
          <a href="manual-report.php">Manual Report</a>
        </nav>
    </div>
    <div>
      <h4>Manual Report Submission</h4>
      <form action="manual-report.php">
        Hostname: <input type="text" name="hostname"><br>
        Status: <input type="text" name="status"><br>
        <input type="submit" value="Submit">
      </form>
      <table>
        <tbody>
          <?php
            include 'scripts/query.php';

            // Validate hostname
            if ($_GET["hostname"] != null && $_GET["status"] != null) {
              // Assign SQL friendly varchars
              $currentHostname = "'" . $_GET["hostname"] . "'";
              $currentStatus = "'" . $_GET["status"] . "'";

              // Get unix time
              $currentTime = time();

              // Call manual-report()
              manualReport($currentHostname,$currentStatus,$currentTime);
            }

          ?>
        </tbody>
      </table>
    </div>
</body>
</html>
