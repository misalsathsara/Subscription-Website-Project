<?php
session_start();
include 'dbase.php'; // Include your database connection

// Check if the order_id is set in the session
if (!isset($_SESSION['order_id'])) {
    header("Location: index.php"); // Redirect if no order is found in session
    exit;
}

$order_id = $_SESSION['order_id'];

// Fetch the order details from the database
$order_query = "SELECT * FROM orders WHERE id = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("i", $order_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

// Check if the order exists
if ($order_result->num_rows == 0) {
    echo "Order not found.";
    exit;
}

$order = $order_result->fetch_assoc();

// Get the payment method selected by the user
$payment_method = $_POST['payment_method'] ?? ''; // Default to empty string if not set

// Initialize variables for handling payment details
$payment_status = 'pending'; // Set default status as 'pending'
$transaction_id = null;

// Process the payment based on the selected method
if ($payment_method === 'paypal') {
    // Simulate PayPal payment processing
    $payment_status = 'paid'; // If payment is successful
    $transaction_id = 'PAYPAL-' . uniqid();
} elseif ($payment_method === 'credit_card') {
    // Simulate Credit Card payment processing
    $card_number = $_POST['card_number'] ?? '';
    $expiration_date = $_POST['expiration_date'] ?? '';
    $cvv = $_POST['cvv'] ?? '';

    // Perform basic validation for credit card
    if (empty($card_number) || empty($expiration_date) || empty($cvv)) {
        $payment_status = 'failed'; // If validation fails
        echo "Invalid Credit Card details.";
        exit;
    }

    // Simulate successful payment
    $payment_status = 'paid'; // If payment is successful
    $transaction_id = 'CREDITCARD-' . uniqid();
} elseif ($payment_method === 'bank_transfer') {
    // Simulate Bank Transfer payment processing
    $payment_status = 'paid'; // If payment is successful
    $transaction_id = 'BANKTRANSFER-' . uniqid();
} else {
    // Invalid payment method
    $payment_status = 'failed'; // Set status to 'failed' for invalid methods
    echo "Invalid payment method.";
    exit;
}

// Update the order status to the selected payment status in the database
$update_query = "UPDATE orders SET payment_status = ?, transaction_id = ? WHERE id = ?";
$update_stmt = $conn->prepare($update_query);

if (!$update_stmt) {
    echo "Error preparing the update statement: " . $conn->error;
    exit;
}

$update_stmt->bind_param("ssi", $payment_status, $transaction_id, $order_id);

if ($update_stmt->execute()) {
    echo "Order updated successfully.";
    
    // Fetch the relevant n_id values from the order_items table
    $n_id_query = "SELECT n_id FROM order_items WHERE order_id = ?";
    $n_id_stmt = $conn->prepare($n_id_query);

    if (!$n_id_stmt) {
        echo "Error preparing the n_id fetch statement: " . $conn->error;
        exit;
    }

    $n_id_stmt->bind_param("i", $order_id);
    $n_id_stmt->execute();
    $n_id_result = $n_id_stmt->get_result();

    $n_ids = [];
    while ($row = $n_id_result->fetch_assoc()) {
        $n_ids[] = $row['n_id'];
    }

    if (!empty($n_ids)) {
        $n_id_placeholders = implode(',', array_fill(0, count($n_ids), '?'));
        $delete_cart_query = "DELETE FROM cart WHERE n_id IN ($n_id_placeholders)";
        $delete_cart_stmt = $conn->prepare($delete_cart_query);

        if (!$delete_cart_stmt) {
            echo "Error preparing the delete statement: " . $conn->error;
            exit;
        }

        $delete_cart_stmt->bind_param(str_repeat('s', count($n_ids)), ...$n_ids);

        if ($delete_cart_stmt->execute()) {
            echo "Cart items deleted successfully.";
        } else {
            echo "Error deleting cart items: " . $delete_cart_stmt->error;
            exit;
        }

        $delete_cart_stmt->close();
    } else {
        echo "No matching n_id found in order_items for deletion.";
    }

    // Clear the session and redirect
    unset($_SESSION['cart_items']);
    unset($_SESSION['order_id']);
    header("Location: payment_success.php?transaction_id=$transaction_id");
    exit;
} else {
    echo "Error updating order: " . $update_stmt->error;
    exit;
}
?>
