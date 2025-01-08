<?php
session_start();
include 'dbase.php'; // Include your database connection
header('Content-Type: application/json');

if (isset($_SESSION['username']) && isset($_POST['n_id'])) {
    $username = $_SESSION['username'];
    $n_id = $_POST['n_id'];

    // Step 1: Get the customer ID (c_id) based on the username
    $customer_sql = "SELECT c_id FROM customers WHERE c_uname = ?";
    $customer_stmt = $conn->prepare($customer_sql);
    $customer_stmt->bind_param("s", $username);
    $customer_stmt->execute();
    $customer_result = $customer_stmt->get_result();

    if ($customer_result->num_rows > 0) {
        $customer_row = $customer_result->fetch_assoc();
        $c_id = $customer_row['c_id'];

        // Step 2: Check if the item already exists in the wishlist for this user
        $check_sql = "SELECT * FROM wishlist WHERE c_id = ? AND n_id = ?";
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param("ss", $c_id, $n_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Item already exists in the wishlist
            echo json_encode(['error' => 'Item already in wishlist']);
        } else {
            // Step 3: Insert the new item into the wishlist, including the username
            $insert_sql = "INSERT INTO wishlist (c_id, n_id, username) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);
            $insert_stmt->bind_param("sss", $c_id, $n_id, $username);
            if ($insert_stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['error' => 'Database error']);
            }
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Customer not found']);
    }
    $customer_stmt->close();
} else {
    echo json_encode(['error' => 'Unauthorized']);
}
$conn->close();
