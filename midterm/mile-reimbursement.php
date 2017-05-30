<?php



// Open files for reading
$rRates = fopen("./reimbursement_rates.txt", "r");

// Function to read invoice data line by line
function readFiles() {
  $iData = fopen("./invoice_data1.txt", "r");
  while (! feof($iData)) {
    $line = fgets($iData);
    $lineArray = explode(',', $line);
    $origin = $lineArray[0];
    $dest = $lineArray[1];
    $miles = $lineArray[2];
    $minutes = $lineArray[3];

    echo "<tr>";
    echo "<td>$origin</td>";
    echo "<td>$dest</td>";
    echo "<td>$miles</td>";
    echo "<td>$minutes</td>";
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
