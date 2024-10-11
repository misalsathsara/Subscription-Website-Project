<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit;
}

// Your home page content goes here
echo "Welcome, " . $_SESSION['username'] . "!";

?>

<a href="logout.php">Logout</a>
