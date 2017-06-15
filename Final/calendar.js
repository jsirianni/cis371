"use strict";

/**
 * Updates calendar.html to display the desired month.
 *
 * @param date a JavaScript Date object set to a day in the month to be displayed.
 */
var update = function (date) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var daysInCurrentMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();


    // Set the header month and year
    var header = document.getElementById("header");
    header.innerHTML = months[date.getMonth()] + " " + date.getFullYear();

    // Get all elements inside Calander Table, then get all data cells
    var calTable = document.getElementById("calendarTable");
    var dayCells = calTable.getElementsByTagName("td");

    // Iterate through each cell and assign a day
    // Stop when all days in month are filled
    var day = 1;
    for (var i=0; i<dayCells.length; i++) {
      if (day <= daysInCurrentMonth) {
        dayCells[i].innerHTML = day;
      }
      day += 1;
    }

    // Calculate the previous and next month
    // (You may use this for adding links to the left arrow)
    var nextMonth = date.getMonth()  + 1;
    var nextYear = date.getFullYear();
    if (nextMonth >= 12) {
        // Remember:  Months are numbered beginning with 0.
        nextMonth = 0;
        nextYear++;
    }

    // Click handlers
    document.getElementById("rightArrow").addEventListener('click', function (e) {
      var newDate = new Date(nextYear, nextMonth);
      alert("Right Arrow click");
    })
    document.getElementById("leftArrow").addEventListener('click', function (e) {
      alert("Left Arrow click");
    })
}
