<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Database connection
    include '../dbase.php';

    $sql = "SELECT id, item_name, type, description, price FROM items WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $item = $result->fetch_assoc();
    $stmt->close();
    $conn->close();

    echo json_encode($item);
}
?>
