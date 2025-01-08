<?php
// update_order_status.php

session_start();

// Include database connection
include('dbase.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $orderId = isset($_POST['order_id']) ? intval($_POST['order_id']) : null;
    $newStatus = isset($_POST['status']) ? $_POST['status'] : null;

    // Validate input
    if ($orderId && $newStatus) {
        try {
            // Update the order status in the database
            $query = "UPDATE orders SET order_status = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("si", $newStatus, $orderId);

            if ($stmt->execute()) {
                // Return success response
                echo json_encode(["success" => true, "message" => "Order status updated successfully."]);
            } else {
                // Return error response
                echo json_encode(["success" => false, "message" => "Failed to update order status."]);
            }
        } catch (Exception $e) {
            // Handle exception
            echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
        }
    } else {
        // Missing required fields
        echo json_encode(["success" => false, "message" => "Invalid input."]);
    }
} else {
    // Invalid request method
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}
