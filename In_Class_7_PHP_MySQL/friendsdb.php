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

  // Run the table creation query
  mysqli_query($sqlconn, $sql);

  // Add constraint to table
  //$sql = "ALTER TABLE myfriends ADD UNIQUE INDEX (firstname,lastname)";
  //mysqli_query($sqlconn, $sql);

  // Close when finished
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

    // Insert values into table. ID is auto incremented. Skip duplicate firstname,lastname
    $sql = "INSERT INTO myfriends (firstname, lastname, num, age)
      SELECT firstname, lastname FROM myfriends
      WHERE NOT EXISTS (SELECT * FROM myfriends
        WHERE firstname='$lineArray[0]' AND lastname='$lineArray[1]' AND num='$lineArray[2]' AND age='$lineArray[3]'
      LIMIT 1)";



    // Execute the query, if error, print to console
    if ($sqlconn->query($sql) === TRUE) {
        //echo "New record created successfully";
        continue;
    } else {
        //echo "Error: " . $sql . "<br>" . $sqlconn->error;
        continue;
    }
  }
  // Done writing to database
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
  //$array = array();
  while ($row = mysqli_fetch_assoc($result)) {
    //$array[] = $row;
    echo $row["firstname"], $row["lastname"], $row["num"], $row["age"];
    echo "<br>";
  }

  // Display DB content



}
?>
