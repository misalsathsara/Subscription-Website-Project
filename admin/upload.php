<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "SubscriBuy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// File upload logic
if (isset($_FILES['itemImage']) && !empty($_POST['itemName'])) {
    $itemID = $_POST['itemID'];
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $itemDescription = $_POST['itemDescription'];
    $itemPrice = $_POST['itemPrice'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
    
    if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO items (n_id, name, type, description, price, image) 
                VALUES ('$itemID', '$itemName', '$itemType', '$itemDescription', '$itemPrice', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Item added successfully!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
    }
}

$conn->close();
?>
