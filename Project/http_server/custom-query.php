<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="scripts/validate.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Custom Query Editor</title>
</head>
<body>
  <section>
    <div id=header>
        <h1>Custom Query</h1>
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
      <p> Example queries</p>
      <ul>
        <li>SELECT * FROM report.reports</li>
        <li>SELECT * FROM report.reports WHERE (hostname='ws1')</li>
        <li>SELECT * FROM report.reports WHERE (hostname='ws1') ORDER BY id DESC LIMIT 10</li>
        <li>SELECT * FROM report.reports WHERE (status='bad') ORDER BY id DESC</li>
      </ul>
      <form name="form" action="custom-query.php" onsubmit="return">
        Custom Query: <input class="textbox" type="text" name="custom-query">
        <input type="submit" value="Submit">
      </form>
      <?php
      include 'scripts/query.php';
      // Do not execute unless sql submitted
      if ($_GET["custom-query"] != null) {
        customQuery($_GET["custom-query"]);
      }
      ?>
    </div>
    </section>
</body>
</html>
