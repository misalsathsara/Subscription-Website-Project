<?php
// $servername = "localhost:3308";
$password = "";
$servername = "localhost:3306";
// $password = "root"; 
$username = "root"; 
$dbname = "SubscriBuy";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>