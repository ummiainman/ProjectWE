document.addEventListener("DOMContentLoaded", function() {
    var form = document.querySelector("form");
    form.addEventListener("submit", function(event) {
        event.preventDefault();
        
        var staffSpaces = document.getElementById("staffSpaces").value;
        var studentSpaces = document.getElementById("studentSpaces").value;

        // Perform AJAX request to update parking spaces
        fetch("update_parking_spaces.php", {
            method: "POST",
            body: new URLSearchParams(new FormData(form))
        }).then(response => response.text())
          .then(data => {
              alert("Parking spaces updated successfully!");
          }).catch(error => {
              console.error("Error updating parking spaces:", error);
          });
    });
});
