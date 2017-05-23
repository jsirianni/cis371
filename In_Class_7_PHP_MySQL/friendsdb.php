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

  // Close when finished
  $sqlconn->close();
}


//
// Populate table from text file, false if table already has data
//
function popTable() {
  // Connect to local DB, hardcoded creds not recomended
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");

  // open file for reading
  $inputFile = fopen("friends.txt", "r");

    // Read each line and insert into table
    while (($line = fgets($inputFile)) !== false) {
      // Place comma delimited values into array
      $lineArray = explode(',', $line);

      // Insert each value into table
      $sql = "insert into cis371 myfriends myfriends"
           . " ("               // ID is auto inserted
           . "$lineArray[0],"   // fName
           . "$lineArray[1],"   // lName
           . "$lineArray[2],"   // pNumber
           . "$lineArray[3]"    // age
           . ")";

  }
  // Done writing to database
  $sqlconn->close();
}


// Function returns an array containing all DB entries
function readTable() {
  // Connect to local DB, hardcoded creds not recomended
  $sqlconn =  mysqli_connect("localhost", "root", "password");

}

// Call db create function
initTable();
popTable();

?>
