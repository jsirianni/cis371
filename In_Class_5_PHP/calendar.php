<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1252"/>
	<link rel="stylesheet" href="default.css" type="text/css"/>
	<title>Month Year</title>
</head>
<body>

  <?php
    // Set the timezone to EST
    date_default_timezone_set('America/New_York');

    // If user passes params, assign them
    if ($_GET['month'] != "" && $_GET['year'] != "") {
      // Convert number to month name
      $month = $_GET['month'];
      //$month = (DateTime::createFromFormat('!m', $month))->format('F');

      $year = $_GET['year'];
      $headerDate = ((DateTime::createFromFormat('!m', $month))->format('F') . " " . $year);

    // IF no passed params, get current date
    } else {
      $headerDate = date('F Y');



			// Determine the first day of the month
			// http://stackoverflow.com/questions/2094797/the-first-day-of-the-current-month-in-php-using-date-modify-as-datetime-object
			$firstDay = new DateTime('first day of this month');
			echo $firstDay->format('jS, F Y');
    }



  ?>

  <div>
    <h1>
      <?php
        echo $headerDate;
      ?>
    </h1>
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
				$day = 1;																									 // first day, can be incremented
				$lastDay = cal_days_in_month (CAL_GREGORIAN,$_GET['month'],$year); //number of days in the selected month



				// Control loop generates table rows until all days are displayed


				?>



				<tr>
					PHP gen row 1
        </tr>
        <tr>
					PHP gen row 2
        </tr>
        <tr>
					PHP gen row 3
        </tr>
        <tr>
					PHP gen row 4
        </tr>
        <tr>
          PHP gen row 5
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
