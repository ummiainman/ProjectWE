<?php
session_start();
include 'database.php';

// Assuming the user is logged in and their ID is stored in the session
$userId = $_SESSION['user_id'];

$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];

// Update user information
$query = "UPDATE users SET fullname = ?, username = ?, email = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('sssi', $fullname, $username, $email, $userId);
$stmt->execute();

// Update vehicle information
foreach ($_POST as $key => $value) {
    if (strpos($key, 'vehicle_') === 0) {
        $vehicleId = str_replace('vehicle_', '', $key);
        $vehicleDetails = $value;

        // Assuming vehicle details is in the format "make model (license_plate)"
        list($make, $model, $licensePlate) = sscanf($vehicleDetails, "%s %s (%[^)])");

        $query = "UPDATE vehicles SET make = ?, model = ?, license_plate = ? WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssii', $make, $model, $licensePlate, $vehicleId, $userId);
        $stmt->execute();
    }
}

header('Location: profile.html');
exit;
?>
