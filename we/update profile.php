<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit;
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkpark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $currentUsername = $_SESSION["username"];

    // Validate inputs
    if (empty($fullname) || empty($username) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Update user in the database
    $updateQuery = "UPDATE users SET fullname = ?, username = ?, email = ?, password = ? WHERE username = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sssss", $fullname, $username, $email, $password, $currentUsername);

    if ($stmt->execute()) {
        // Update session variables
        $_SESSION["username"] = $username;
        echo "Profile updated successfully. <a href='student_staff_dashboard.html'>Go to Dashboard</a>";
    } else {
        echo "Error: " . $updateQuery . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
