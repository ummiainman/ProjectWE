function validateRegistrationForm() {
    var fullname = document.forms["registrationForm"]["fullname"].value;
    var username = document.forms["registrationForm"]["username"].value;
    var email = document.forms["registrationForm"]["email"].value;
    var password = document.forms["registrationForm"]["password"].value;
    var role = document.forms["registrationForm"]["role"].value;

    if (fullname == "" || username == "" || email == "" || password == "" || role == "") {
        alert("All fields must be filled out.");
        return false;
    }

    // Simple email validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Please enter a valid email address.");
        return false;
    }

    return true;
}
