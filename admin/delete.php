<?php
include '../dbase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['id'];

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
