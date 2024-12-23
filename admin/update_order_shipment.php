<?php
// Include database connection
include '../dbase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order ID and new status from the POST request
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Generate a random tracking ID (e.g., 10 characters long, mix of letters and numbers)
    $tracking_id = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 10));

    // Update the order_status and tracking_id in the database
    $query = "UPDATE orders SET order_status = '$status', tracking_id = '$tracking_id' WHERE id = '$order_id'";
    if (mysqli_query($conn, $query)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>

