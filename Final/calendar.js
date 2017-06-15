"use strict";

/**
 * Updates calendar.html to display the desired month.
 *
 * @param date a JavaScript Date object set to a day in the month to be displayed.
 */


// Global Vars
var nextMonth;
var nextYear;
var prevMonth;
var prevYear;


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


    // Calculate next month
    nextMonth = date.getMonth()  + 1;
    nextYear = date.getFullYear();

    if (nextMonth >= 12) {
        // Remember:  Months are numbered beginning with 0.
        nextMonth = 0;
        nextYear++;
    }

    // Calculate previous month
    prevMonth = date.getMonth() - 1;
    prevYear = date.getFullYear();
    if (prevMonth == -1) {
      // Set month to december and decrease year by one
      prevMonth = 11;
      prevYear = prevYear - 1;
    }
}


// Load click handler functions
window.onload = function () {
  document.getElementById("rightArrow").addEventListener('click', function (e) {
    var newDate = new Date(nextYear, nextMonth);
    update(newDate);
  })
  document.getElementById("leftArrow").addEventListener('click', function (e) {
    var newDate = new Date(prevYear, prevMonth);
    update(newDate);
  })
  document.getElementById("formsubmit").addEventListener('click', function (e) {
    // Pull data from form
    var formYear =  1;//document.getElementById("form_year").innerHTML;
    var formMonth = 2011;//document.getElementById("form_month").innerHTML;
    var newDate = new Date(formYear, formMonth);
    update(newDate);

  })
}
