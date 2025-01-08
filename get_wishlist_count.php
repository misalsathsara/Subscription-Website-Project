<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'dbase.php';

// Get the username from the session
$username = $_SESSION['username'];

// Check if username is set
if (!isset($username)) {
    echo json_encode(['wish_count' => 0]);
    exit;
}

// Query to get the count of wishlist items for the logged-in user
$query = "SELECT COUNT(*) as wishlist_count FROM wishlist WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Output the item count as JSON
echo json_encode(['wish_count' => $row['wishlist_count']]);
