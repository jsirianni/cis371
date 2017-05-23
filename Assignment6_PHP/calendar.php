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


				<?php  // Begin calendar generation

				// Determine which day of week if first of the month | SOURCE --> http://stackoverflow.com/questions/16951411/returning-the-first-day-of-a-given-month-in-weekday-format-with-php
				$inputMonth = '2013-05-01';
				$month2 = date("m" , strtotime($inputMonth));
				$year2 = date("Y" , strtotime($inputMonth));
				$getdate = getdate(mktime(null, null, null, $month, 1, $year));
				$firstDay = $getdate["weekday"];  // String
				// Vars for control loops

				$day = 1;																									  // first day, can be incremented
				$lastDay = cal_days_in_month (CAL_GREGORIAN,$month,$year);  //number of days in the selected month

				// Offset first week of the month with empty cells, ignore Sunday
				if ($firstDay === "Monday") {
					echo "<tr><th></th>";
					$x = 1;

				} elseif ($firstDay === "Tuesday") {
					echo "<tr><th></th><th></th>";
					$x = 2;

				} elseif ($firstDay === "Wednesday") {
					echo "<tr><th></th><th></th><th></th>";
					$x = 3;

				} elseif ($firstDay === "Thursday") {
					echo "<tr><th></th><th></th><th></th><th></th>";
					$x = 4;

				} elseif ($firstDay === "Friday") {
					echo "<tr><th></th><th></th><th></th><th></th><th></th>";
					$x = 5;

				} elseif ($firstDay === "Saturday") {
					echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th>";
					$x = 6;

				} else { 											// Sunday, no offset
					$x = 0;
				}
				$x++;													// Increment to account for first day


				do {													// Create additional weeks
					do { 												// Fill weeks with days
						if ($day <= $lastDay) {   // If all days not generated, print next day
							echo "<th>$day</th>";
						}
						$day++; 									// Increment control vars
						$x++;
					} while ($x <= 7);					// Continue filling the week until 7 days

					echo "</tr>"; 					    // End the week
					if ($day <= $lastDay) { 	  // Begin week if not all days generated
						echo "<tr>";
					}
					$x = 1;											// reset days printed
				} while ($day <= $lastDay); 	// Continue generating weeks if all days not generated
																			// End calendar generation ?>

      </tbody>
    </table>
	</div>
	<div id="nav">

		<?php
		// Determine previous and next month
		$prevMonth = $month -1;
		$nextMonth = $month + 1;
		?>

		<a href="calendar.php?month=<?php echo $prevMonth; ?>&year=2011">
 			<img src="prev.png" alt="previous button" style="width:42px;height:42px;">
		</a>


		<a href="calendar.php?month=<?php echo $nextMonth; ?>&year=2011">
 			<img src="next.png" alt="next button" style="width:42px;height:42px;">
		</a>










	</div>
</body>
</html>
