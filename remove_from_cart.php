<?php
session_start();
include 'dbase.php'; // Include your database connection file

if (isset($_POST['cart_id']) && isset($_SESSION['username'])) {
    $cart_id = $_POST['cart_id'];

    // Prepare the SQL query to delete the item from the cart
    $delete_sql = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    if ($stmt) {
        $stmt->bind_param("i", $cart_id);
        if ($stmt->execute()) {
            $_SESSION['message'] = "Item removed from cart.";
        } else {
            $_SESSION['message'] = "Failed to remove item from cart.";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Database error: " . $conn->error;
    }

    $conn->close();
}

// Redirect back to the cart page
header("Location: show_cart.php");
exit();
