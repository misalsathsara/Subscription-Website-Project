<?php
// Database connection settings
$servername = "localhost"; // Database server (usually "localhost" if running locally)
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (leave empty if no password)
$dbname = "subscribuy"; // The name of your database

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>