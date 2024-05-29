<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $spaceNumber = $_POST['spaceNumber'];
    $area = $_POST['area'];
    $qrCode = uniqid();

    $sql = "INSERT INTO parking_spaces (space_number, area, qr_code) VALUES ('$spaceNumber', '$area', '$qrCode')";
    if ($conn->query($sql) === TRUE) {
        echo "New parking space created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
