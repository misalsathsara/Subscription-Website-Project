<?php
session_start();

$_SESSION = array(); // Clear all session variables
session_destroy(); // Destroy the session

// Set a session variable to indicate successful logout
session_start(); // Restart session to set the message
$_SESSION['logout_message'] = "You have successfully logged out.";

header('Location: index.php'); // Redirect to the login page
exit;
?>
