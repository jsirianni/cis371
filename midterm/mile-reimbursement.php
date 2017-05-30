<?php



// Open files for reading
$rRates = fopen("./reimbursement_rates.txt", "r");
$iData = fopen("./invoice_data1.txt", "r");

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
</body>
</html>
