<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $parkingSpaceId = $_POST['parkingSpaceId'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $reason = $_POST['reason'];

    $sql = "INSERT INTO parking_area_closures (parking_space_id, start_date, end_date, reason) VALUES ('$parkingSpaceId', '$startDate', '$endDate', '$reason')";
    if ($conn->query($sql) === TRUE) {
        echo "New closure created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
