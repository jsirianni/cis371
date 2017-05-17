<?php
	// Set the timezone to EST
	date_default_timezone_set('America/New_York');

	// Assign values to month, year, and header date
	if ($_GET['month'] != "" && $_GET['year'] != "") {
		// Convert number to month name
		$month = $_GET['month'];
		$year = $_GET['year'];
		$headerDate = ((DateTime::createFromFormat('!m', $month))->format('F') . " " . $year);
	// No args
	} else {
		$month = date('m');	//month number
		$year = date('Y');  //year number
		$headerDate = date('F Y');
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1252"/>
	<link rel="stylesheet" href="default.css" type="text/css"/>
	<title>Month Year</title>
</head>
<body>
  <div>
    <h1><?php echo $headerDate;?></h1>
  </div>
  <div id="table">
    <table>
      <tbody>
        <tr id="top">
          <th>Sunday</th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
          <th>Saturday</th>
        </tr>

				<?php
				// Vars for control loops
				$day = 1;																									  // first day, can be incremented
				$lastDay = cal_days_in_month (CAL_GREGORIAN,$month,$year);  //number of days in the selected month
				// Create week rows until all days are printed
				do {
					// Control var controls week end
					$x = 1;
					// Table row opening tag - Begins week
					echo "<tr>";
					do {
						// If all days not generated, print next day
						if ($day <= $lastDay) {
							echo "<th>$day</th>";
						}
						// Increment control vars
						$day++;
						$x++;
						// Continue filling the week until 7 days
					} while ($x <= 7);
					// End the week
					echo "</tr>";
					// Continue generating weeks until all days are printed
				} while ($day <= $lastDay);
				?>

      </tbody>
    </table>
  </div>
</body>
</html>
