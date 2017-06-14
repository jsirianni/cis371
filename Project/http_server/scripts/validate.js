function validateForm() {
    var x = document.forms["myForm"]["hostname"].value;
    if (x == "") {
        alert("Hostname must be filled out");
        return false;
    }
}
