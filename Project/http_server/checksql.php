<?php
include 'query.php';

setGlobal();
$sql = $_POST['sql'];
$sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
if (!mysqli_query($sqlconn,$sql)) {
  $sqlconn->close();
  return false;
}
else {
  $sqlconn->close();
  return false;
}
?>
<p>Validate your SQL</p>
