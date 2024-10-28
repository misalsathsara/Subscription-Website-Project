<?php
include '../dbase.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE n_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode($result->fetch_assoc());
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Item not found.']);
    }
    
    $stmt->close();
}
$conn->close();
?>
