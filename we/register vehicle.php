<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fkparkdb";

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
    $role = $_POST["role"];

    // Validate inputs
    if (empty($fullname) || empty($username) || empty($email) || empty($password) || empty($role)) {
        echo "All fields are required.";
        exit;
    }

    // Check if username or email already exists
    $checkUserQuery = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Username or email already exists.";
        exit;
    }

    // Insert user into the database
    $insertQuery = "INSERT INTO users (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssss", $fullname, $username, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Registration successful. <a href='login.html'>Login here</a>";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
