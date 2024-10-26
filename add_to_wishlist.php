<?php
session_start();
include 'dbase.php';
header('Content-Type: application/json');

if (isset($_SESSION['username']) && isset($_POST['n_id'])) {
    $username = $_SESSION['username'];
    $n_id = $_POST['n_id'];

    $check_sql = "SELECT * FROM wishlist WHERE username = ? AND n_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("ss", $username, $n_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['error' => 'exists']);
    } else {
        $insert_sql = "INSERT INTO wishlist (username, n_id) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ss", $username, $n_id);
        if ($insert_stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['error' => 'Database error']);
        }
    }
    $stmt->close();
} else {
    echo json_encode(['error' => 'Unauthorized']);
}
$conn->close();
?>
