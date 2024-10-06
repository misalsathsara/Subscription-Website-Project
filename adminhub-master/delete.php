<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['id'];

    // Database connection
    $servername = "localhost";
    $username = "roor";
    $password = "";
    $dbname = "SubscriBuy"; // Change to your actual database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $itemId);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Item deleted successfully.";
    } else {
        echo "No item found with that ID.";
    }

    $stmt->close();
    $conn->close();
}
?>
