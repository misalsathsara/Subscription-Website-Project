<?php
// Database connection details
$host = 'localhost:3306';  // or 'localhost:3308' based on your configuration
$db = 'SubscriBuy';
$user = 'root';
$pass = 'root';

// Establish a database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
