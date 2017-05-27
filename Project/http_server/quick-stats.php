<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" href="styles/default.css" type="text/css"/>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>CS 371 assignment 2</title>
</head>
<body>
    <div id=header>
        <h2>Report Server</h2>
    </div>
    <div>
        <nav>
            <a href="/">Home</a>
            <a href="quick-stats.php">Quick Stats</a>
            <a href="custom-query.html">Custom Query</a>
            <a href="add-server.html">Add Server</a>
        </nav>
    </div>
    <div>
        <h4>Quick Stats</h4>
        <?php
          include 'scripts/query.php';
          readLast20();
        ?>
    </div>
</body>
</html>
