function validateForm() {
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;
    if (x == "" || y == "") {
        alert("Hostname and status are required");
        return false;
    }
    else if (y.value.match("ok") || y.value.match("bad")) {
      alert("Status be either 'ok' or 'bad'")
      return false;
    }
    else {
      alert("The report has been submitted")
      return true;
    }

}
