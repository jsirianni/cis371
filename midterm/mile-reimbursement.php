<?php



// Open files for reading
$rRates = fopen("./reimbursement_rates.txt", "r");

// Function to read invoice data line by line
function readInvoice() {
  $iData = fopen("./invoice_data1.txt", "r");
  while (! feof($iData)) {
    echo fgets($iData). "<br />";
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
  </tbody></table>
  <?php readInvoice(); ?>
</body>
</html>
