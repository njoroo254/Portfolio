<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "sql112.infinityfree.com";  // Correct MySQL Hostname
$username = "if0_38671137";  // Your MySQL Username
$password = "uczHhYrLgsHGZ1";  // Your MySQL Password
$database = "if0_38671137_portfolio";  // Your MySQL Database Name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Prepare SQL statement
$sql = "INSERT INTO contacts (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    echo "<script>alert('Message sent successfully!'); window.location.href='home.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
