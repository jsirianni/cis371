<?php
//
// Function to read invoice data line by line
//
function readFiles() {
  // Open invoice file for reading
  $iData = fopen("./invoice_data1.txt", "r");

  $mTotal = 0;
  $minTotal = 0;
  $totalSpeedAve = 0;
  $rateAverage = 0;
  $costTotal = 0;
  $numEntries = 0;

  // Read each line
  while (! feof($iData)) {
    // Assign line to variable, split line into an array
    $line = fgets($iData);
    $lineArray = explode(',', $line);

    // Print the array values to a table row
    echo "<tr>";
    echo "<td>$lineArray[0]</td>";
    echo "<td>$lineArray[1]</td>";

    // add to miles total
    $currentMiles = $lineArray[2];
    $mTotal += $currentMiles;
    echo "<td>$currentMiles</td>";

    // add to minute total
    $minTotal += $lineArray[3];
    echo "<td>$lineArray[3]</td>";

    // Calulate average speed
    $avgSpeed = getAvgSpeed($lineArray[2], $lineArray[3]);
    $totalSpeedAve += $avgSpeed;
    echo "<td>$avgSpeed</td>";

    $rate = getSpeedRate($avgSpeed);
    $rateAverage += $rate;
    echo "<td>$$rate</td>";

    $total = getTotal($lineArray[2], $rate);
    $costTotal += $total;
    echo "<td>$$total</td>";


    echo "</tr>";

    // Increment entry number
    $numEntries += 1;
  }

  // Get averages
  $totalSpeedAve = $totalSpeedAve / $numEntries;
  $totalSpeedAve = number_format((float)$totalSpeedAve, 2, '.','');
  $rateAverage = $rateAverage / $numEntries;


  // Print totals
  echo "<tr>";
  echo "<td></td><td></td>"; // blank cells
  echo "<td>$mTotal</td>";
  echo "<td>$minTotal</td>";
  echo "<td>$totalSpeedAve</td>";
  echo "<td>$rateAverage</td>";
  echo "<td>$costTotal</td>";
  echo "</tr>";

  fclose($iData);
}

//
//function returns average speed
//
function getAvgSpeed($miles, $minutes) {
  $hours = $minutes / 60;
  $x = $miles / $hours;
  $x = number_format((float)$x, 2, '.', '');
  return $x;
}

//
// Function returns speed rate
//
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

//
// Function returns the total
//
function getTotal($r, $m) {
  $t = $r * $m;
  return $t;
}
?>
