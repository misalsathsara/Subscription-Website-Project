<?php
include '../dbase.php';

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
