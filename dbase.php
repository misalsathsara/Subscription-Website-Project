<?php
$host = 'localhost:3308';
// $host = 'localhost';  
$db = 'SubscriBuy';
$user = 'root';
$pass = '';

// Establish a database connection
$conn = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
