function validateVehicleRegistrationForm() {
    var vehicleNumber = document.forms["vehicleRegistrationForm"]["vehicle_number"].value;
    var vehicleType = document.forms["vehicleRegistrationForm"]["vehicle_type"].value;
    var vehicleGrant = document.forms["vehicleRegistrationForm"]["vehicle_grant"].value;

    if (vehicleNumber == "" || vehicleType == "" || vehicleGrant == "") {
        alert("All fields must be filled out");
        return false;
    }
    return true;
}
