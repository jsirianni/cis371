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
function check() {
  //setGlobal();
  echo "false";
  return "true";
  //$sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  //if (!mysqli_query($sqlconn,$sql)) {
  //  $sqlconn->close();
  //  return false;
  //}
  //else {
  //  $sqlconn->close();
  //  return true;
  //}
}

// Begin script
if($_SERVER['REQUEST_METHOD']=="GET") {
  $function = $_GET['call'];
  if(function_exists($function)) {
    call_user_func($function);
  }
  else {
    echo 'Function Not Exists!!';
  }
}


 ?>
