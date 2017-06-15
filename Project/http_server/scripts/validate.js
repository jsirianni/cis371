//
// Custom Query Validation
//
function validateCustomQuery() {
  jQuery.ajax({
    type: "GET",
    url: "teamalerts.duckdns.org/scripts/checksql.php",
    data: "call=check",
    success: function(response){
        alert(response)
      }
    });
}








//
// Validate manual report page
// Requires a Hostname
// Resuires status to be either 'ok' or 'bad'
//
function validateManualReport() {
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;

    if (x == "" || y == "") {
        alert("Hostname and status are required");
        return false;
    }
    else if (y == "ok" || y == "bad") {
      alert("The report has been submitted.")
      return true;
    }
    else {
      alert("The status must be either 'ok' or 'bad'.")
      return false;
    }
}


//
// Validate quick stats page
// Requires an integer value greater than 0
//
function validateQuickStats() {
    var x = document.forms["form"]["numrecords"].value;

    if (isNaN(x) || x == "" || x < 1) {
    alert("You must input a numeric value greater than 0.");
    return false;
    }
    else {
      return true;
    }
}
