<?php

// Function to read invoice data line by line
function readFiles() {
  // Open invoice file for reading
  $iData = fopen("./invoice_data1.txt", "r");
  // Read each line
  while (! feof($iData)) {
    // Assign line to variable, split line into an array
    $line = fgets($iData);
    $lineArray = explode(',', $line);
    // Print the array values to a table row
    echo "<tr>";
    echo "<td>$lineArray[0]</td>";
    echo "<td>$lineArray[1]</td>";
    echo "<td>$lineArray[2]</td>";
    echo "<td>$lineArray[3]</td>";

    // Determine ave speed
    $avgSpeed = getAvgSpeed($lineArray[2], $lineArray[3]);
    echo "<td>$avgSpeed</td>";

    $rate = getSpeedRate($avgSpeed);
    echo "<td>$rate</td>";

    echo "<td>$total</td>";

    echo "</tr>";
  }
  fclose($iData);
}


//function returns average speed
function getAvgSpeed($miles, $minutes) {
  $hours = $minutes / 60;
  $x = $miles / $hours;
  $x = number_format((float)$x, 2, '.', '');
  return $x;
}


// Function returns speed rate
function getAvgRate($averageSpeed);
  $y = "$0.15";
  return y;

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
