<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'dbase.php';

// Get the username from the session
$username = $_SESSION['username'];

// Query to get the count of cart items for the logged-in user
$query = "SELECT COUNT(*) AS item_count FROM cart WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Output the item count as JSON
echo json_encode(['item_count' => $row['item_count']]);
