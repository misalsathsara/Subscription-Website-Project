<?php
session_start();

// Include your database connection file
include 'dbase.php'; // Ensure this file provides $conn for database operations

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Update the active_status in the database
    $update_stmt = $conn->prepare("UPDATE customers SET active_status = 0 WHERE c_uname = ?");
    $update_stmt->bind_param("s", $username);
    $update_stmt->execute();
}

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Set a session variable to indicate successful logout
session_start(); // Restart session to set the message
$_SESSION['logout_message'] = "You have successfully logged out.";

// Redirect to the login page
header('Location: index.php');
exit;
