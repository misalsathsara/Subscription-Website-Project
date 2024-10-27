<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SubscriBuy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE n_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete item.']);
    }
    
    $stmt->close();
}
$conn->close();
?>
