<?php
session_start();
include 'dbase.php';

if (isset($_SESSION['username']) && $_SESSION['username'] === true) {
    $n_id = $_POST['n_id'] ?? '';

    // Check if the item is already in the cart
    $c_id = $_SESSION['c_id']; // Assuming you store user ID in session
    $check_sql = "SELECT * FROM cart WHERE n_id = '$n_id' AND c_id = '$c_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo json_encode(['success' => false, 'error' => 'exists']);
    } else {
        // Insert the item into the cart
        $insert_sql = "INSERT INTO cart (c_id, n_id) VALUES ('$c_id', '$n_id')";
        if ($conn->query($insert_sql) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
