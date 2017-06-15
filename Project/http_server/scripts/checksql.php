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
    return "0";
  }
  else {
    $sqlconn->close();
    return "1";
  }
}

setGlobal();
$x = check("SELECT * FROM report.reports");
echo "$x";

 ?>
