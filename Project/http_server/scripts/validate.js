// Validate manual report page
function validateManualReport() {
    // Pull values from form submission
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;

    // Check if data present
    if (x == "" || y == "") {
        alert("Hostname and status are required");
        return false;
    }
    // Return true if valid status
    else if (y == "ok" || y == "bad") {
      alert("The report has been submitted.")
      return true;
    }
    // Return valse if not valid
    else {
      alert("The status must be either 'ok' or 'bad'.")
      return false;
    }
}


// Validate custom query page
function validateCustomQuery() {
    // Pull values from form submission
    var x = document.forms["form"]["custom-query"].value;
    // Check if data present
    if (x == "") {
        alert("Error, query is blank.");
        return false;
    }
    // Submit query
    else {
      return true;
    }
}


// Validate quick stats page
function validateQuickStats() {
    // Pull values from form submission
    var x = document.forms["form"]["numrecords"].value;
    
    // Validate input is a number and greater than 1
    if (isNaN(x) || x == "" || x < 1) {
    alert("You must input a numberical value greater than 0.");
    return false;
    }
    // Submit query
    else {
      return true;
    }
}
