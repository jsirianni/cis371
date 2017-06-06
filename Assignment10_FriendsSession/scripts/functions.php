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
  echo "<tr><th>Id</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Age</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'], "</td>";
    echo "<td>", $row['username'], "</td>";
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
  $username = substr($fName, 0, 1) . $lName;

  $sqlconn = mysqli_connect("localhost", "root", "password", "cis371");

  $sql = "INSERT INTO myfriends (firstname, lastname, num, age, username)
    SELECT * FROM (SELECT '$fName', '$lName', '$pNum', '$age', '$username') AS tmp
    WHERE NOT EXISTS (SELECT firstname, lastname, num, age, username FROM myfriends
      WHERE firstname='$lineArray[0]' AND lastname='$lineArray[1]' AND num='$lineArray[2]' AND age='$lineArray[3]' AND username='$username[4]'
    LIMIT 1)";

  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();
}
?>
