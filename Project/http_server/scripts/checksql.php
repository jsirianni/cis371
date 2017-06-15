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

function check(sql) {
  echo "<p>Checking SQL</p>";
}

// Begin script
setGlobal();

if ($_SERVER['REQUEST_METHOD']=="POST") {
  echo "<p>Working</p>";
}
else {
  echo "<p>Not Working</p>";
}


 ?>
