<?php
//
// Function sets env
//
function setEnv() {
  $dbhost = "localhost";
  $dbname = "report";
  $tableName = "reports";
  $dbuser = "reportuser";
  $dbuserpass = "password";
}


//
// Function displays X amount of records
//
function readLast20($numOfReports) {
  setEnv();
  $sqlconn =  mysqli_connect($dbhost, $dbuser, $dbuserpass, "report");

  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT $numOfReports";
  } else {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  }

  $result = mysqli_query($sqlconn,$sql);


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
  $sqlconn->close();
}
?>
