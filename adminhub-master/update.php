<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['id'];
    $itemName = $_POST['item_name'];
    $itemType = $_POST['type'];
    $itemDescription = $_POST['description'];
    $itemPrice = $_POST['price'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "SubscriBuy"; // Change to your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE items SET item_name = ?, type = ?, description = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $itemName, $itemType, $itemDescription, $itemPrice, $itemId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Item updated successfully.";
    } else {
        echo "No changes made.";
    }

    $stmt->close();
    $conn->close();
}
?>
