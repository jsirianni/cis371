<?php



// Open files for reading
$rRates = fopen("./reimbursement_rates.txt", "r");

// Function to read invoice data line by line
function readFiles() {
  // Open invoice file for reading
  $iData = fopen("./invoice_data1.txt", "r");
  // Read each line individually
  while (! feof($iData)) {

    $line = fgets($iData);
    $lineArray = explode(',', $line);

    echo "<tr>";
    echo "<td>$lineArray[0]</td>";
    echo "<td>$lineArray[1]</td>";
    echo "<td>$lineArray[2]</td>";
    echo "<td>$lineArray[3]</td>";
    echo "</tr>";
  }
}

?>


<!--Build the html content -->
<html>
<head>
  <h1>Invoice for Miles Driver</h1>
</head>
<body>
  <table><tbody>
    <tr>
      <th>Origin</th>
      <th>Destination</th>
      <th>Miles</th>
      <th>Minutes</th>
      <th>Avg. Speed</th>
      <th>Rate</th>
      <th>Total</th>
    </tr>
    <?php readFiles(); ?>
  </tbody></table>

</body>
</html>
