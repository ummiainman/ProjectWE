<?php
session_start();

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
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate inputs
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    // Check if user exists
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user["password"])) {
            // Set session variables
            $_SESSION["username"] = $user["username"];
            $_SESSION["role"] = $user["role"];

            // Redirect to respective dashboard
            if ($user["role"] == "Administrator") {
                header("Location: admin dash.html");
            } else {
                header("Location: dashboard.html");
            }
            exit;
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
}

$conn->close();
?>
