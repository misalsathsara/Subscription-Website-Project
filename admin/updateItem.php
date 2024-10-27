<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SubscriBuy";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $id = $data->id;
    $name = $data->name;
    $type = $data->type;
    $description = $data->description;
    $price = $data->price;

    $sql = "UPDATE items SET name = ?, type = ?, description = ?, price = ? WHERE n_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssss', $name, $type, $description, $price, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update item.']);
    }
    
    $stmt->close();
}

$conn->close();
?>
