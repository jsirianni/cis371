function validateForm() {
    var x = document.forms["form"]["hostname"].value;
    if (x == "") {
        alert("Hostname must be filled out");
        return false;
    }
}
