<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = $_GET['date'];
$location = $_GET['location'];

$sql = "SELECT * FROM spaces WHERE location = '$location' AND id NOT IN (SELECT space_id FROM bookings WHERE date = '$date')";
$result = $conn->query($sql);

$spaces = array();
while($row = $result->fetch_assoc()) {
    $spaces[] = $row;
}

echo json_encode($spaces);

$conn->close();
?>
