<?php
//
// Function creates the table
//
function initTable() {
  // Connect to local DB and build the query
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");
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

  // Open the file
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
  $sqlconn->close();
}


//
// Function returns an array containing all DB entries
//
function readTable() {
  // Connect to the database, build the query, execute
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");
  $sql = "SELECT * FROM myfriends";
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display query response
  echo "<p>Current Database Entries</p>";
  echo "<table><tbody>";
  echo "<tr><th>Id </th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Age</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'], "</td>";
    echo "<td>", $row['firstname'], "</td>";
    echo "<td>", $row['lastname'], "</td>";
    echo "<td>", $row['num'], "</td>";
    echo "<td>", $row['age'], "</td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
}


//
// function adds a row to the database
//
function addRow($fName, $lName, $pNum, $age) {
  $sqlconn = mysqli_connect("localhost", "root", "password", "cis371");
  $sql = "INSERT INTO myfriends (firstname, lastname, num, age)
    SELECT * FROM (SELECT '$fName', '$lName', '$pNum', '$age') AS tmp
    WHERE NOT EXISTS (SELECT firstname, lastname, num, age FROM myfriends
      WHERE firstname='$lineArray[0]' AND lastname='$lineArray[1]' AND num='$lineArray[2]' AND age='$lineArray[3]'
    LIMIT 1)";
}



?>
