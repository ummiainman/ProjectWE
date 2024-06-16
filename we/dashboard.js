document.addEventListener("DOMContentLoaded", function() {
    // Example data for booking overview
    var bookings = [
        { id: 1, spaceNumber: "A12", area: "Staff", status: "Confirmed" },
        { id: 2, spaceNumber: "B15", area: "Student", status: "Pending" }
    ];

    var tbody = document.querySelector("table tbody");
    bookings.forEach(function(booking) {
        var row = document.createElement("tr");
        row.innerHTML = `
            <td>${booking.id}</td>
            <td>${booking.spaceNumber}</td>
            <td>${booking.area}</td>
            <td>${booking.status}</td>
        `;
        tbody.appendChild(row);
    });

    var actionButtons = document.querySelectorAll(".action-btn");
    actionButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            // Handle button click events
            alert("Action button clicked");
        });
    });
});
