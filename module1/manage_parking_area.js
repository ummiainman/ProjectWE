document.getElementById('createClosureForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    fetch('manage_parking_area.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        alert(data);
        // Reload closures list
    })
    .catch(error => console.error('Error:', error));
});
