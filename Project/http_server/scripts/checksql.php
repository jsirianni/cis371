<?php
include 'query.php';
//
// Check if valid sql. Returns true if valid
//
function checkSql() {
  setGlobal();
  $sql = $_GET['sql'];
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  if (!mysqli_query($sqlconn,$sql)) {
    $sqlconn->close();
    return false;
  }
  else {
    $sqlconn->close();
    return true;
  }
}
?>
