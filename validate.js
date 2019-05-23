    function validateForm() {
    var x = document.forms["form"]["email"].value
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos<1 || dotpos<1) {
        alert("Not a valid e-mail address.");
        return false;
    }

    return true;
}
