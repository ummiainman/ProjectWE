document.addEventListener('DOMContentLoaded', function() {
    fetch('get_daily_parking.php')
    .then(response => response.json())
    .then(data => {
        const availabilityContainer = document.getElementById('dailyAvailability');
        data.forEach(record => {
            const div = document.createElement('div');
            div.classList.add('availability-record');
            div.textContent = `Date: ${record.date}, Available Spaces: ${record.available_spaces}, Occupied Spaces: ${record.occupied_spaces}`;
            availabilityContainer.appendChild(div);
        });
    })
    .catch(error => console.error('Error:', error));
});
