<?php
//
// Global vars for MySQL interaction
//
$dbname = "report";
$tableName = "reports";


//
// Pupulate a table
//
function popTable() {
  // Connect to local DB, hardcoded creds not recomended
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");

  // open file and read each line
  $inputFile = fopen("friends.txt", "r");
  while (($line = fgets($inputFile)) !== false) {
    // Raad line from file into array, then convert to a astring
    $lineArray = explode(',', $line);
    $line = settype($line, "string");

    // Insert values into table. ID is auto incremented. Skip if identical row
    $sql = "INSERT INTO myfriends (firstname, lastname, num, age)
      SELECT * FROM (SELECT '$lineArray[0]', '$lineArray[1]', '$lineArray[2]', '$lineArray[3]') AS tmp
      WHERE NOT EXISTS (SELECT firstname, lastname, num, age FROM myfriends
        WHERE firstname='$lineArray[0]' AND lastname='$lineArray[1]' AND num='$lineArray[2]' AND age='$lineArray[3]'
      LIMIT 1)";

    // Execute the query. Error handling can be added here later
    if ($sqlconn->query($sql) === TRUE) {
        continue;
    } else {
        continue;
    }
  }
  // Close the connection
  $sqlconn->close();
}


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
?>
