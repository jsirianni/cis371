<?php
	// Set the timezone to EST
	date_default_timezone_set('America/New_York');

	// If args exist
	if ($_GET['month'] != "" && $_GET['year'] != "") {
		$month = $_GET['month'];
		$year = $_GET['year'];
		$headerDate = ((DateTime::createFromFormat('!m', $month))->format('F') . " " . $year);
	// No args
	} else {
		$month = date('m');	//month as a number
		$year = date('Y');
		$headerDate = date('F Y'); // Header = Month work + year
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
				// Determine which day of week if first of the month | SOURCE --> http://stackoverflow.com/questions/16951411/returning-the-first-day-of-a-given-month-in-weekday-format-with-php
				$inputMonth = '2013-05-01';
				$month2 = date("m" , strtotime($inputMonth));
				$year2 = date("Y" , strtotime($inputMonth));
				$getdate = getdate(mktime(null, null, null, $month, 1, $year));

				// Vars for control loops
				$day = 1;																									  // first day, can be incremented
				$lastDay = cal_days_in_month (CAL_GREGORIAN,$month,$year);  //number of days in the selected month


				// For first week print empty days depending on first day of month
				if ($lastDay == "Sunday") {
					continue;
				} elseif ($lastDay == "Monday") {
					echo "<tr>";
					echo "<th></th>";
				} elseif ($lastDay == "Tuesday") {
					echo "<tr>";
					echo "<th></th><th></th>";
				} elseif ($lastDay == "Wednessday") {
					echo "<tr>";
					echo "<th></th><th></th><th></th>";
				} elseif ($lastDay == "Thursday") {
					echo "<tr>";
					echo "<th></th><th></th><th></th><th></th>";
				} elseif ($lastDay == "Friday") {
					echo "<tr>";
					echo "<th></th><th></th><th></th><th></th><th></th>";
				} else { 						//Saturday
					echo "<tr>";
					echo "<th></th><th></th><th></th><th></th><th></th><th></th>";
				}
				// Close first week
				echo "</tr>";


				// Create additional weeks
				do {
					// Control var controls week end
					$x = 1;

					// Begin week
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
