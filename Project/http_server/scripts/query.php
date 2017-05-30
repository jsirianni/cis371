<?php
//
// Set global values
//
function setGlobal() {
  $GLOBALS['dbhost'] = 'localhost';
  $GLOBALS['dbname'] = 'report';
  $GLOBALS['ddbuser'] = 'reportuser';
  $GLOBALS['dbuserpass'] = 'password';
}


//
// Function displays X amount of records
//
function readLast20($numOfReports) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);


  // Build query
  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT $numOfReports";
  } else {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  }

  // Execute query & close
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display result
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", date('d.m.Y H:i:s', $row['timestamp'])," </td>";
    echo "</tr>";
  }
}


//
// Function allows the user to perform any query
//
function customQuery($customSQL) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  $result = mysqli_query($sqlconn, $customSQL);
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
// Function allows user to perform an INSERT
//
function manualReport($hostname, $status, $timestamp) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);

  // Build INSERT statement
  $sql = "INSERT INTO report.reports (hostname,status,timestamp) VALUES ($hostname,$status,$timestamp)";

  // Execute INSERT & close
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();
}
?>
