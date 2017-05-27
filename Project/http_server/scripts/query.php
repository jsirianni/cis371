<?php
//
// Global vars for MySQL interaction
//
$dbname = "report";
$tableName = "reports";


//
// Function displays all reports in the database
//
function readTable() {
  $sqlconn =  mysqli_connect("localhost", "reportuser", "password", "report");
  $sql = "SELECT * FROM reports";
  $result = mysqli_query($sqlconn,$sql);

  // Display all DB content
  echo "<table><tbody>";
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'], "</td>";
    echo "<td>", $row['hostname'], "</td>";
    echo "<td>", $row['status'], "</td>";
    echo "<td>", $row['timestamp'], "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";

  // Close the connection
  $sqlconn->close();
}


//
// Function displays last 20 reports
//
function readLast20() {
  $sqlconn =  mysqli_connect("localhost", "reportuser", "password", "report");
  $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  $result = mysqli_query($sqlconn,$sql);

  // Display all DB content
  echo "<table><tbody>";
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'], "</td>";
    echo "<td>", $row['hostname'], "</td>";
    echo "<td>", $row['status'], "</td>";
    echo "<td>", $row['timestamp'], "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";

  // Close the connection
  $sqlconn->close();
}
?>
