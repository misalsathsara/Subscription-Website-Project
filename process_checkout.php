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

// Calculate total price
foreach ($cart_items as $item) {
    $total_price += $item['price']; // Total price calculation
}

// Get billing information from POST request
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');
$duration = trim($_POST['package_duration'] ?? '');
$renieve = trim($_POST['received_time'] ?? '');

// Validate inputs
if (empty($fullname) || empty($email) || empty($address) || empty($duration) || empty($renieve)) {
    header("Location: checkout.php?error=1");
    exit;
}

// Prepare the order data to insert into the database
$order_query = "INSERT INTO orders (fullname, email, address, duration, renieve, total_price) VALUES (?, ?, ?, ?, ?, ?)";
$order_stmt = $conn->prepare($order_query);

if (!$order_stmt) {
    die("Error preparing the order statement: " . $conn->error);
}

// Bind parameters
$order_stmt->bind_param("sssssd", $fullname, $email, $address, $duration, $renieve, $total_price);
if (!$order_stmt->execute()) {
    die("Error executing the order statement: " . $order_stmt->error);
}

// Get the last inserted order ID
$order_id = $conn->insert_id;
$_SESSION['order_id'] = $order_id; // Store the order ID in session

// Insert each item into the order_items table
$item_query = "INSERT INTO order_items (order_id, item_id) VALUES (?, ?)";
$item_stmt = $conn->prepare($item_query);

if (!$item_stmt) {
    die("Error preparing the item statement: " . $conn->error);
}

// Loop through cart items to save them in the database
foreach ($cart_items as $item) {
    // Ensure you are accessing the correct key, e.g., 'n_id'
    $item_id = $item['id']; // Ensure this key is correct based on the print_r debug

    if (empty($item_id)) {
        die("Error: Missing item ID (n_id) for item in cart.");
    }

    // Bind the order details and execute the insertion
    $item_stmt->bind_param("is", $order_id, $item_id); // Assuming 'item_id' is a string ('s')
    if (!$item_stmt->execute()) {
        die("Error executing the item statement: " . $item_stmt->error);
    }
}

// Clean up
$item_stmt->close();
$order_stmt->close();
$conn->close();

// Clear the cart session
unset($_SESSION['cart_items']);

// Redirect to the payment page
header("Location: payment.php");
exit;
?>
