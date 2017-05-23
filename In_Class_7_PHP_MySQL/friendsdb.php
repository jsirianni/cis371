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

  // open file and read each line
  $inputFile = fopen("friends.txt", "r");
  while (($line = fgets($inputFile)) !== false) {
    // Raad line from file into array, then convert to a astring
    $lineArray = explode(',', $line);
    $line = settype($line, "string");

    // Insert values into table. ID is auto incremented. Skip duplicate firstname,lastname
    $sql = "INSERT IGNORE INTO myfriends (firstname, lastname, num, age)
      VALUES ('$lineArray[0]','$lineArray[1]','$lineArray[2]','$lineArray[3]')";

    // Execute the query, if error, print to console
    if ($sqlconn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $sqlconn->error;
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
  $sqlconn =  mysqli_connect("localhost", "root", "password");

  // For query to read all data, create array to read into
  $sql = "SELECT * FROM myfriends";
  $result = mysqli_query($sqlconn,$sql);

  // Read each row row into array
  $array = array();
  $num = mysqli_num_rows($result);
  if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $array[] = $rwo;
    }
  }
  print_r($array);
}














// Call functions
initTable();
popTable();
readTable();
?>
