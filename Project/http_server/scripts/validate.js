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
