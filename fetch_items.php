<?php
// fetch_items.php
$host = 'localhost';
$db = 'SubscriBuy';
$user = 'root';  // replace with your database user
$pass = '';      // replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM items";
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
