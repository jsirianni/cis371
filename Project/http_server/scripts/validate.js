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
// Validate custom query page
// Reuires a SELECT statement
//
function validateCustomQuery() {
    var x = document.forms["form"]["custom-query"].value;
    x = x.toLowerCase();

    if (x == "") {
        alert("Error, query is blank.");
        return false;
    }
    else if (x.includes("select") == false) {
      alert("You must use a SELECT statement");
      return false;
    }
    else {
      $.ajax({
        type: "POST",
        url: "your_ajax_function.php",
        data: "username=" + $('#id_of_username_input'),
        success: function(retval){
          if (retval == true) {
            alert("Invalid SQL Statement")
            return false;
          }
          else {
            return true;
          }
        }
      }};
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
