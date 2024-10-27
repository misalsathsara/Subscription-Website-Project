<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'dbase.php'; // Include your database connection file

// Set response headers to return JSON
header('Content-Type: application/json');

// Check if n_id is provided
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['n_id']) && !empty($_POST['n_id'])) {
    $n_id = $_POST['n_id'];
    $username = $_SESSION['username'] ?? '';
    
    // Check if user is logged in
    if (empty($username)) {
        echo json_encode(['error' => 'User not logged in']);
        exit;
    }

    // Retrieve c_id from customers table using the username
    $customer_sql = "SELECT c_id FROM customers WHERE c_uname = ?";
    $customer_stmt = $conn->prepare($customer_sql);

    // Check if preparation was successful
    if (!$customer_stmt) {
        echo json_encode(['error' => 'Database error: ' . $conn->error]);
        exit;
    }

    $customer_stmt->bind_param("s", $username);
    $customer_stmt->execute();
    $customer_result = $customer_stmt->get_result();

    if ($customer_result->num_rows > 0) {
        $customer = $customer_result->fetch_assoc();
        $c_id = $customer['c_id']; // Get c_id from the customers table

        // Check if item already exists in cart
        $check_sql = "SELECT * FROM cart WHERE c_id = ? AND n_id = ?";
        $stmt = $conn->prepare($check_sql);

        // Check if preparation was successful
        if (!$stmt) {
            echo json_encode(['error' => 'Database error: ' . $conn->error]);
            exit;
        }

        $stmt->bind_param("ss", $c_id, $n_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Item already exists in cart
            echo json_encode(['error' => 'exists']);
        } else {
            // Insert item into cart
            $insert_sql = "INSERT INTO cart (c_id, n_id, username) VALUES (?, ?, ?)";
            $insert_stmt = $conn->prepare($insert_sql);

            // Check if preparation was successful
            if (!$insert_stmt) {
                echo json_encode(['error' => 'Database error: ' . $conn->error]);
                exit;
            }

            $insert_stmt->bind_param("sss", $c_id, $n_id, $username); // Bind c_id, n_id, and username

            if ($insert_stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['error' => 'Failed to add item to cart']);
            }
        }
        $stmt->close();
    } else {
        echo json_encode(['error' => 'Customer not found']);
    }

    $customer_stmt->close();
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();
?>
