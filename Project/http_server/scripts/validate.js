function validateForm() {
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;
    if (x == "" || y == "") {
        alert("Hostname and status are required");
        return false;
    }
    else if (y != "ok") {
      alert("test")
      return false;
    }
    else {
      alert("The report has been submitted")
      return true;
    }

}
