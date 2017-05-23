<?php

// Global vars for MySQL interaction
$dbname = "cis371";
$tableName = "myfriends";


//
// Function creates the table
//
function initTable() {
  // Connect to local DB, hardcoded creds not recomended
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");

  // Build the creation query
  $sql = "CREATE TABLE myfriends (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname CHAR(15), lastname CHAR(30), num CHAR(15), age CHAR(3))";

  // Run the table creation query and then close connection
  mysqli_query($sqlconn, $sql);
  $sqlconn->close();
}


//
// Populate table from text file, false if table already has data
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
// Function returns an array containing all DB entries
//
function readTable() {
  // Connect to local DB, hardcoded creds not recomended
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");

  // For query to read all data, create array to read into
  $sql = "SELECT * FROM myfriends";
  $result = mysqli_query($sqlconn,$sql);

  // Display all DB content
  echo "<h3> Current Database Entries </h3>";
  echo "<table><tbody>";
  echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Age</th></tr>";
  echo "<tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<th>$row['id']</th>";
    echo "<th>$row['irstname']</th>";
    echo "<th>$row['lastname']</th>";
    echo "<th>$row['num']</th>";
    echo "<th>$row['age']</th>";
  }
  echo "</tr"
  echo "</tbody></table>";

  // Close the connection
  $sqlconn->close();
}
?>
