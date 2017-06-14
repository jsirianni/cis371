<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="scripts/validate.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Report Server</title>
</head>
<body>
  <section>
    <div id=header>
        <h1>Report Server</h1>
    </div>
    <div class="nav">
      <nav>
        <ul>
            <?php
              include 'scripts/query.php';
              printNav();
             ?>
        </ul>
      </nav>
    </div>
    </section>
    <div class="about">
        <p>
          Welcome to the Report Server. Reports are being gathered in real time
          by a service listening on TCP port 8090. The service is written in GO
          Language and is capable of handling over over 60,000 requests in under
          five seconds when running on fast hardware.
        </p>
        </p>
          Each report contains the following
        </p>
        <ul>
            <li>Report Id: Identification number, incremented by one for each report</li>
            <li>Hostname: The server hostname of the report's origin</li>
            <li>Status: The status of the sending server</li>
            <li>Timestamp: Unix timestamp converted to a human readable format</li>
        </ul>
        <p>
            Use the <a href="quick-stats.php">Quick Stats</a> page to view recent reports.
        </p>
        <p>
            Use the <a href="custom-query.php">Custom Query</a> page to perform SQL queries against the backing MySQL instance.
        </p>
        <p>
            Use the <a href="manual-report.php">Manual Report</a> page to submit a report manually through the web interface.
        </p>
        <div class="logical">
          <img src="images/logical.png">
        <div>
    </div>
    </section>
</body>
</html>
