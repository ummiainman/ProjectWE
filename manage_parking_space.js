document.getElementById('createParkingSpaceForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch('manage_parking_space.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Reload parking spaces list
    })
    .catch(error => console.error('Error:', error));
});
