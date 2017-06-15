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

function checkSql($sql) {
  return false;
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  if (!mysqli_query($sqlconn,$sql)) {
    $sqlconn->close();
    return false;
  }
  else {
    $sqlconn->close();
    return false;
  }
}

// Begin script
setGlobal();

$x = $_POST['sql'];
checkSql($x);


?>
<p>Validate your SQL</p>
