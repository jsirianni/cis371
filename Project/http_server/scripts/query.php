<?php
//
// Set global values
//
function setGlobal() {
  $GLOBALS['dbhost'] = 'localhost';
  $GLOBALS['dbname'] = 'report';
  $GLOBALS['ddbuser'] = 'reportuser';
  $GLOBALS['dbuserpass'] = 'password';
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  return $sqlconn;
}


//
// Function displays X amount of records
//
function readLast20($numOfReports) {
  // Set vars & connect to the db
  $c = setGlobal();


  // Build query
  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT $numOfReports";
  } else {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  }

  // Execute query & close
  $result = mysqli_query($c,$sql);
  $sqlconn->close();

  // Display result
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", $row['timestamp'],"  </td>";
    echo "</tr>";
  }
}


//
// Function allows the user to perform any query
//
//function customQuery($customSQL) {
  // Set vars & connect to the db
//  setGlobal();
//  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
//}
?>
