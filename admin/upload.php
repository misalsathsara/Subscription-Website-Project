<?php
$servername = "localhost";
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
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $itemDescription = $_POST['itemDescription'];
    $itemPrice = $_POST['itemPrice'];

    // Fetch the last inserted ID
    $sql = "SELECT n_id FROM items ORDER BY n_id DESC LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $lastID = $row['n_id'];
        
        // Extract the numeric part and increment
        $numericPart = (int)substr($lastID, 2); // Assuming 'ID' is the prefix
        $newID = 'ID' . str_pad($numericPart + 1, 3, '0', STR_PAD_LEFT); // Generate ID with leading zeros (e.g., ID001)
    } else {
        $newID = 'ID001'; // If no records exist, start with ID001
    }

    // File upload logic
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
    
    if (move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO items (n_id, name, type, description, price, image) 
                VALUES ('$newID', '$itemName', '$itemType', '$itemDescription', '$itemPrice', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Item added successfully!', 'itemID' => $newID]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to upload image.']);
    }
}

$conn->close();
?>
