<?php
$servername = "localhost:3308";
$password = "";
// $servername = "localhost:3306";
// $password = "root"; 
$username = "root"; 
$dbname = "SubscriBuy";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
} 
echo "Connection successful.<br>";