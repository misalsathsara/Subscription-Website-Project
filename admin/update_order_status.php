<?php
// Include database connection
include '../dbase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the order ID and new status from the POST request
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    // Update the order_status in the database
    $query = "UPDATE orders SET order_status = '$status' WHERE id = '$order_id'";
    if (mysqli_query($conn, $query)) {
        echo 'success';
    } else {
        echo 'error: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
