<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SubscriBuy"; // Change to your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, type, description, price FROM items"; // Adjust table name and columns accordingly
$result = $conn->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

$conn->close();
echo json_encode($items);
?>
