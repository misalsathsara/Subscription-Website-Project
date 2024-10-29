<?php
session_start();
include 'dbase.php'; // Include your database connection

// Check if the cart session exists
if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
    header("Location: show_cart.php"); // Redirect if cart is empty
    exit;
}

// Retrieve cart items from the session
$cart_items = $_SESSION['cart_items'];
$total_price = 0;

// Calculate total price and prepare order details
foreach ($cart_items as $item) {
    $total_price += $item['price'];
}

// Get billing information from POST request
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');

// Validate inputs (you can expand this as needed)
if (empty($fullname) || empty($email) || empty($address)) {
    // Redirect back to checkout with an error message
    header("Location: checkout.php?error=1");
    exit;
}

// Prepare the order data to insert into the database
$order_query = "INSERT INTO orders (fullname, email, address, total_price) VALUES (?, ?, ?, ?)";
$order_stmt = $conn->prepare($order_query);

if (!$order_stmt) {
    die("Error preparing the statement: " . $conn->error);
}

// Bind parameters
$order_stmt->bind_param("sssd", $fullname, $email, $address, $total_price);
$order_stmt->execute();

// Get the last inserted order ID
$order_id = $conn->insert_id;

// Insert each item into the order_items table
$item_query = "INSERT INTO order_items (order_id, item_id, quantity, price) VALUES (?, ?, ?, ?)";
$item_stmt = $conn->prepare($item_query);

if (!$item_stmt) {
    die("Error preparing the statement: " . $conn->error);
}

// Loop through cart items to save them in the database
foreach ($cart_items as $item) {
    $item_stmt->bind_param("iiid", $order_id, $item['id'], $item['quantity'], $item['price']);
    $item_stmt->execute();
}

// Clean up
$item_stmt->close();
$order_stmt->close();
$conn->close();

// Clear the cart session
unset($_SESSION['cart_items']);

// Redirect to a success page or show a success message
header("Location: success.php"); // Redirect to a success page
exit;
?>
