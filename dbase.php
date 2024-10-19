<?php
// $servername = "localhost:3308";
$servername = "localhost:3306";
$username = "root"; 
$password = "";

// $password = "root"; 
$dbname = "SubscriBuy";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 
echo "Connection successful.<br>";