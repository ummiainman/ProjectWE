function validateLoginForm() {
    var username = document.forms["loginForm"]["username"].value;
    var password = document.forms["loginForm"]["password"].value;

    if (username == "" || password == "") {
        alert("Username and password must be filled out.");
        return false;
    }

    return true;
}
