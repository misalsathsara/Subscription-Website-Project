<?php
session_start();
if (isset($_POST['order_id']) && isset($_POST['status'])) {
    include('dbase.php');

    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $queryUpdateStatus = "UPDATE orders SET order_status = ? WHERE id = ?";
    $stmtUpdateStatus = $conn->prepare($queryUpdateStatus);
    $stmtUpdateStatus->bind_param("ss", $status, $order_id);

    if ($stmtUpdateStatus->execute()) {
        // Return success if the status update is successful
        echo "success";
    } else {
        // Return the error if status update fails
        echo "Failed to update order status. Error: " . $stmtUpdateStatus->error;
    }
}
