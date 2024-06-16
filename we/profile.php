<?php
session_start();
include 'database.php';

// Assuming the user is logged in and their ID is stored in the session
$userId = $_SESSION['user_id'];

$query = "SELECT fullname, username, email, role FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$query = "SELECT id, CONCAT(make, ' ', model, ' (', license_plate, ')') AS details FROM vehicles WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();

$vehicles = [];
while ($row = $result->fetch_assoc()) {
    $vehicles[] = $row;
}

$response = [
    'fullname' => $user['fullname'],
    'username' => $user['username'],
    'email' => $user['email'],
    'role' => $user['role'],
    'vehicles' => $vehicles
];

header('Content-Type: application/json');
echo json_encode($response);
?>
