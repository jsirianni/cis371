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
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  if (!mysqli_query($sqlconn,$sql)) {
    $sqlconn->close();
    echo "false";
    return;
  }
  else {
    $sqlconn->close();
    echo "true";
    return;
  }
}

// Begin script
//if($_SERVER['REQUEST_METHOD']=="GET") {
//  $function = $_GET['call'];
//  if(function_exists($function)) {
//    call_user_func($function;
//  }
//  else {
//    echo 'Function Not Exists!!';
//  }
//}

$query = $_GET['call'];
check("SELECT * FROM report.reports");

 ?>
