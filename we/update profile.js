function validateProfileForm() {
    var fullname = document.forms["updateProfileForm"]["fullname"].value;
    var username = document.forms["updateProfileForm"]["username"].value;
    var email = document.forms["updateProfileForm"]["email"].value;
    var password = document.forms["updateProfileForm"]["password"].value;

    if (fullname == "" || username == "" || email == "" || password == "") {
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
