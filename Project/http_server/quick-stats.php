<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
  <script src="scripts/validate.js"></script>
  <meta charset="UTF-8">
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
            <?php
              include 'scripts/query.php';
              printNav();
             ?>
          </ul>
        </nav>
    </div>
    <div class="content">
      <form name="form" action="quick-stats.php" onsubmit="return validateQuickStats()">
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
  </section>
</body>
</html>
