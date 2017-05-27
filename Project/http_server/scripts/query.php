<?php
//
// Global vars for MySQL interaction
//
$dbhost = "localhost";
$dbname = "report";
$tableName = "reports";
$dbuser = "reportuser";
$dbuserpass = "password";



//
// Function displays all reports
//
function readTable() {
  $sqlconn =  mysqli_connect("localhost", "reportuser", "password", "report");
  $sql = "SELECT * FROM reports";
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


//
// Function displays last 20 reports
//
function readLast20($numOfReports) {
  $sqlconn =  mysqli_connect("localhost", "reportuser", "password", "report");

  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
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
