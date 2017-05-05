<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
	<meta http-equiv="Content-type" content="text/html; charset=windows-1252"/>
	<link rel="stylesheet" href="styles/default.css" type="text/css"/>
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
      $month = (DateTime::createFromFormat('!m', $month))->format('F');

      $year = $_GET['year'];
      $headerDate = ($month . " " . $year);

    // IF no passed params, get current date
    } else {
      $headerDate = date('F Y');
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
        <tr>
          <td>1</td>
          <td>2</td>
          <td>3</td>
          <td>4</td>
          <td>5</td>
          <td>6</td>
          <td>7</td>
        </tr>
        <tr>
          <td>8</td>
          <td>9</td>
          <td>10</td>
          <td>11</td>
          <td>12</td>
          <td>13</td>
          <td>14</td>
        </tr>
        <tr>
          <td>15</td>
          <td>16</td>
          <td>17</td>
          <td>18</td>
          <td>19</td>
          <td>20</td>
          <td>21</td>
        </tr>
        <tr>
          <td>22</td>
          <td>23</td>
          <td>24</td>
          <td>25</td>
          <td>26</td>
          <td>27</td>
          <td>28</td>
        </tr>
        <tr>
          <td>29</td>
          <td>30</td>
          <td>31</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
