function validateForm() {
    var x = document.forms["form"]["hostname"].value;
    var y = document.forms["form"]["status"].value;
    if (x == "" || y == "") {
        alert("Hostname and status are required");
        return false;
    }
    if (y == "ok") {
      alert("The report has been submitted with status ok")
      return true;
    }
    else {
      alert("The report has been submitted")
      return true;
    }

}
