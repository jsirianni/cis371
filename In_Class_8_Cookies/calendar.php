<?php
	date_default_timezone_set('America/New_York');

	// Set the month and year
	if ($_GET['month'] != "" && $_GET['year'] != "") {
		$month = $_GET['month'];
		$year = $_GET['year'];
		$headerDate = ((DateTime::createFromFormat('!m', $month))->format('F') . " " . $year);
  }
  elseif ($month != "" && $year != "") {
		$month = $month;
		$year = $year;
		$headerDate = ((DateTime::createFromFormat('!m', $month))->format('F') . " " . $year);
	}
	else {
		$month = date('m');
		$year = date('Y');
		$headerDate = date('F Y');
	}

// Background color cookie
$cookie_name = "color";
if ($_GET['backgroundColor_form'] != "") {
	$cookie_value = $_GET['backgroundColor_form'];
} else {
	$cookie_value = $_COOKIE[$cookie_name];
}
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");

// Font color cookie
$cookie_font = "font";
if ($_GET['fontColor_form'] != "") {
	$cookie_font_val = $_GET['fontColor_form'];
} else {
	$cookie_font_val = $_COOKIE[$cookie_font];
}
setcookie($cookie_font, $cookie_font_val, time() + (86400 * 30), "/", ".jsirianni.duckdns.org");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1252"/>
	<link rel="stylesheet" href="default.css" type="text/css"/>
	<title>Month Year</title>
</head>
<?php echo "<body style='background-color:$cookie_value'>"; ?>
<div>
  <h1><?php echo $headerDate;?></h1>
</div>
<div id="table">
  <?php echo "<table style='color:$cookie_font_val'>"; ?>
    <tbody>
      <tr id="top">
        <th>Sunday</th><th>Monday</th><th>Tuesday</th><th>Wednesday</th><th>Thursday</th><th>Friday</th><th>Saturday</th>
      </tr>
			<?php // Begin calendar generation
			$inputMonth = '2013-05-01';
			$month2 = date("m" , strtotime($inputMonth));
			$year2 = date("Y" , strtotime($inputMonth));
			$getdate = getdate(mktime(null, null, null, $month, 1, $year));
			$firstDay = $getdate["weekday"];
			$day = 1;																									  // first day, can be incremented
			$lastDay = cal_days_in_month (CAL_GREGORIAN,$month,$year);  //number of days in the selected month

			// Offset first week of the month with empty cells, ignore Sunday
			if ($firstDay === "Monday") {
				echo "<tr><th></th>"; $x = 1;

			} elseif ($firstDay === "Tuesday") {
				echo "<tr><th></th><th></th>"; $x = 2;

			} elseif ($firstDay === "Wednesday") {
				echo "<tr><th></th><th></th><th></th>";	$x = 3;

			} elseif ($firstDay === "Thursday") {
				echo "<tr><th></th><th></th><th></th><th></th>";	$x = 4;

			} elseif ($firstDay === "Friday") {
				echo "<tr><th></th><th></th><th></th><th></th><th></th>"; $x = 5;

			} elseif ($firstDay === "Saturday") {
				echo "<tr><th></th><th></th><th></th><th></th><th></th><th></th>"; $x = 6;

			} else { $x = 0; }						// Sunday, no offset

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

			} while ($day <= $lastDay); 	// Continue generating weeks if all days not generated																		// End calendar generation
		  ?>
    </tbody>
  </table>
</div>
<div id="nav">
	<?php  	// Determine previous month / year
		$prevMonth = $month -1;
		if ($prevMonth == 0) { $prevMonth = 12; $prevYear = $year - 1;}
		else { $prevYear = $year; }

		// Determine next month / year
		$nextMonth = $month + 1;
		if ($nextMonth == 13) {	$nextMonth = 1; $nextYear = $year + 1;}
		else { $nextYear = $year; }
	?>
	<a href="calendar.php?month=<?php echo $prevMonth; ?>&year=<?php echo $prevYear; ?>">
		<img src="prev.png" alt="previous button" style="width:5em;height:5em;">
	</a>
	<a href="calendar.php?month=<?php echo $nextMonth; ?>&year=<?php echo $nextYear; ?>">
		<img src="next.png" alt="next button" style="width:5em;height:5em;">
	</a>
</div>
<div id="colorselection">
	<form action="calendar.php" method='get'>
			<a>Background Color</p>
	    <select name="backgroundColor_form">
	        <option value="red">red</option>
	        <option value="blue">blue</option>
					<option value="cyan">cyan</option>
					<option value="grey">grey</option>
					<option value="green">green</option>
	    </select>
			<input type="submit" value="Select" />
	</form>
	<br><br>
	<form action="calendar.php" method='get'>
			<a>Font Color</p>
			<select name="fontColor_form">
					<option value="black">black</option>
					<option value="blue">blue</option>
					<option value="cyan">cyan</option>
					<option value="grey">grey</option>
					<option value="green">green</option>
			</select>
			<input type="submit" value="Select" />
	</form>
</div>
</body></html>
