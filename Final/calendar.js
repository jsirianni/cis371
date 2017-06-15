"use strict";

/**
 * Updates calendar.html to display the desired month.
 *
 * @param date a JavaScript Date object set to a day in the month to be displayed.
 */
var update = function (date) {
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var daysInCurrentMonth = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();

    // *** Remember to use getElementsByTagName when possible.  It avoids a lot of the hassle of looking through each child. ***


    // Calculate the previous and next month
    // (You may use this for adding links to the left arrow)
    var nextMonth = date.getMonth()  + 1;
    var nextYear = date.getFullYear();
    if (nextMonth >= 12) {
        // Remember:  Months are numbered beginning with 0.
        nextMonth = 0;
        nextYear++;
    }
    
    
}
