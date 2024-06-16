document.addEventListener("DOMContentLoaded", function() {
    fetchProfileData();
});

function fetchProfileData() {
    fetch('get_profile.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('fullname').value = data.fullname;
            document.getElementById('username').value = data.username;
            document.getElementById('email').value = data.email;
            document.getElementById('role').value = data.role;

            let vehicleInfo = document.getElementById('vehicle-info');
            data.vehicles.forEach(vehicle => {
                let vehicleDiv = document.createElement('div');
                vehicleDiv.className = 'vehicle';
                vehicleDiv.innerHTML = `
                    <label for="vehicle_${vehicle.id}">Vehicle ${vehicle.id}:</label>
                    <input type="text" id="vehicle_${vehicle.id}" name="vehicle_${vehicle.id}" value="${vehicle.details}" class="form-control">
                `;
                vehicleInfo.appendChild(vehicleDiv);
            });
        });
}

function validateProfileForm() {
    // Add form validation logic here
    return true;
}
