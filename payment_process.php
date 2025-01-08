<?php
session_start();
include 'dbase.php';

header('Content-Type: application/json'); // Ensure JSON response for AJAX

// Check if the order ID is available in the session
if (!isset($_SESSION['order_id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No order found in session.']);
    exit;
}

$order_id = $_SESSION['order_id'];
$payment_method = $_POST['payment_method'] ?? '';
$allowed_methods = ['paypal', 'credit_card', 'bank_transfer'];

// Validate payment method
if (!in_array($payment_method, $allowed_methods)) {
    echo json_encode(['status' => 'error', 'message' => 'Invalid payment method.']);
    exit;
}

// Begin transaction
$conn->begin_transaction();

try {
    // Fetch the order details
    $order_query = "SELECT * FROM orders WHERE id = ?";
    $order_stmt = $conn->prepare($order_query);
    $order_stmt->bind_param("i", $order_id);
    $order_stmt->execute();
    $order_result = $order_stmt->get_result();

    if ($order_result->num_rows === 0) {
        throw new Exception('Order not found.');
    }

    // Payment processing logic
    $payment_status = 'pending';
    $transaction_id = null;

    if ($payment_method === 'paypal') {
        $payment_status = 'paid';
        $transaction_id = 'PAYPAL-' . uniqid();
    } elseif ($payment_method === 'credit_card') {
        $card_number = $_POST['card_number'] ?? '';
        $expiration_date = $_POST['expiration_date'] ?? '';
        $cvv = $_POST['cvv'] ?? '';

        // Validate credit card details
        if (empty($card_number) || empty($expiration_date) || empty($cvv)) {
            throw new Exception('Invalid Credit Card details.');
        }
        $payment_status = 'paid';
        $transaction_id = 'CREDITCARD-' . uniqid();
    } elseif ($payment_method === 'bank_transfer') {
        $payment_status = 'paid';
        $transaction_id = 'BANKTRANSFER-' . uniqid();
    }

    // Update the order with payment status and transaction ID
    $update_query = "UPDATE orders SET payment_status = ?, order_status = 'pending', transaction_id = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ssi", $payment_status, $transaction_id, $order_id);

    if (!$update_stmt->execute()) {
        throw new Exception("Failed to update order: " . $update_stmt->error);
    }

    // Delete items from the cart based on the order
    $n_id_query = "SELECT n_id FROM order_items WHERE order_id = ?";
    $n_id_stmt = $conn->prepare($n_id_query);
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
        $delete_cart_stmt->bind_param(str_repeat('s', count($n_ids)), ...$n_ids);

        if (!$delete_cart_stmt->execute()) {
            throw new Exception("Failed to delete cart items: " . $delete_cart_stmt->error);
        }
    }

    // Commit the transaction
    $conn->commit();

    // Clean up session
    unset($_SESSION['cart_items']);
    unset($_SESSION['order_id']);

    echo json_encode(['status' => 'success', 'message' => 'Payment successful!', 'transaction_id' => $transaction_id]);
    exit;
} catch (Exception $e) {
    // Rollback transaction on error
    $conn->rollback();
    error_log("Error: " . $e->getMessage());
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    exit;
}
