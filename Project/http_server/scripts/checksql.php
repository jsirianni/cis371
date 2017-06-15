<?php

//
// Set global values
//
function setGlobal() {
  date_default_timezone_set("America/Detroit");
  $GLOBALS['dbhost'] = 'localhost';
  $GLOBALS['dbname'] = 'report';
  $GLOBALS['ddbuser'] = 'reportuser';
  $GLOBALS['dbuserpass'] = 'password';
}

//
// Return true or false
//
function check($sql) {
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  if (!mysqli_query($sqlconn,$sql)) {
    $sqlconn->close();
    return False;
  }
  else {
    $sqlconn->close();
    return True;
  }
}

// Begin script
setGlobal();
$x = "SELECT * FROM report.reports";
$result = check("SELECT * report.reportse");
echo "The result is $result";

 ?>
