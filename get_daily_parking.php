<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT date, available_spaces, occupied_spaces FROM daily_parking_availability;
$result = $conn->query($sql);

/* $availability = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $availability[] = $row;
    }
} else {
    $availability[] = ["date" => date("Y-m-d"), "available_spaces" => 0, "occupied_spaces" => 0];
}

$conn->close();

echo json_encode($availability);
?> */

$data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode([]);
}

$conn->close();

echo json_encode($data);
?>
