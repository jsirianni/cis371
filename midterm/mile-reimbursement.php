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

    $total = getTotal($lineArray[2], $rate);
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
function getSpeedRate($averageSpeed) {
  if ($averageSpeed >= 75) {
    $y = "0.15";
  }
  elseif ($averageSpeed >= 70 && $averageSpeed < 75) {
    $y = "0.45";
  }
  elseif ($averageSpeed >= 65 && $averageSpeed < 70) {
    $y = "0.55";
  }
  elseif ($averageSpeed >= 60 && $averageSpeed < 65) {
    $y = "0.50";
  }
  elseif ($averageSpeed >= 50 && $averageSpeed < 60) {
    $y = "0.40";
  }
  elseif ($averageSpeed >= 40 && $averageSpeed < 50) {
    $y = "0.30";
  }
  elseif ($averageSpeed < 40) {
    $y = "0.15";
  }
  else {
    $y = "error";
  }

  return $y;
}


// Function returns the total
function getTotal($r, $m) {
  $t = $r * $m;
  return $t;
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
