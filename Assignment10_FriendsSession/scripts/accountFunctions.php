<?php
//
// Functions used against the accounts table
//


//
// Function returns true if account exists
//
function accountLookup($user, $pass) {
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");
  $sql = "SELECT * FROM accounts WHERE userName='".$user."'");
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  echo "$result";
}

//
// Function returns an array containing all DB entries
//
function readAccounts() {
  $sqlconn =  mysqli_connect("localhost", "root", "password", "cis371");
  $sql = "SELECT * FROM myfriends";
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

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
?>
