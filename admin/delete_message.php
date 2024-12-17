<?php
include '../dbase.php'; // Include database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM contact WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
    $conn->close();
}
?>
