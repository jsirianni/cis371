<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Manual Report</title>
</head>
<body>
  <section>
    <div id=header>
        <h1>Manual Report</h1>
    </div>
    <div>
      <nav class="nav">
        <ul>
          <li><a href="/">Home</a></li>
          <li><a href="quick-stats.php">Quick Stats</a></li>
          <li><a href="custom-query.php">Custom Query</a></li>
          <li><a href="manual-report.php">Manual Report</a></li>
        </ul>
      </nav>
    </div>
    </section>
    <div class="report">
        <p>
          Use this page to submit a manual report. Provide a hostname and a status.
          A status other than "ok" is considered to be "bad" and will be caught by any
          filters that look for servers in a bad state.
        </p>
        <form class="report" action="manual-report.php">
          Hostname: <br><input type="text" name="hostname"><br>
          Status: <br><input type="text" name="status"><br>
          <input type="submit" value="Submit">
        </form>
        <?php
          include 'scripts/query.php';
          // Validate hostname
          if ($_GET["hostname"] != null && $_GET["status"] != null) {
            // Assign SQL friendly varchars
            $currentHostname = "'" . $_GET["hostname"] . "'";
            $currentStatus = "'" . $_GET["status"] . "'";
            $currentTime = time();
            // Call manual-report()
            manualReport($currentHostname,$currentStatus,$currentTime);
          }
        ?>
    </div>
    </section>
</body>
</html>
