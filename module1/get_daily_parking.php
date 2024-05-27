<?php
include 'db.php';

$sql = "SELECT * FROM daily_parking_availability ORDER BY date DESC";
$result = $conn->query($sql);

$availabilityData = array();
while($row = $result->fetch_assoc()) {
    $availabilityData[] = $row;
}

echo json_encode($availabilityData);

$conn->close();
?>
