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
    return false;
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="scripts/validate.js"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="styles/default.css" type="text/css"/>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <title>Validate SQL</title>
</head>
