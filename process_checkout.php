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

// Check if username is set in the session
if (!isset($_SESSION['username'])) {
    header("Location: login.php?error=1"); // Redirect to login if no username is set
    exit;
}

// Check if username exists
$username = $_SESSION['username']; // Assuming the username is stored in session

if (empty($username)) {
    die("Error: Username is empty or not set.");
}

// Use the username to fetch the c_id from the customers table
$c_id_query = "SELECT c_id FROM customers WHERE c_uname = '$username'"; // Directly using the username in the query
$c_id_result = $conn->query($c_id_query); // Use query method here, no need for prepared statements in this case

if (!$c_id_result) {
    die("Error executing the query: " . $conn->error); // Debug the query execution
}

if ($c_id_result->num_rows === 0) {
    die("Error: No customer found with the provided username.");
}

// Fetch the c_id
$c_id = $c_id_result->fetch_assoc()['c_id'];



// Get billing information from POST request
$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$address = trim($_POST['address'] ?? '');
$duration = trim($_POST['package_duration'] ?? '');
$renieve = trim($_POST['received_time'] ?? '');
$start_date = trim($_POST['strt_date'] ?? '');
$end_date = trim($_POST['end_date'] ?? '');

// Validate inputs
if (empty($fullname) || empty($email) || empty($address) || empty($duration) || empty($renieve) || empty($start_date) || empty($end_date)) {
    header("Location: checkout.php?error=1");
    exit;
}

// Prepare the order data to insert into the database
$order_query = "INSERT INTO orders (c_id, fullname, email, address, duration, renieve, total_price, start_date, end_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
$order_stmt = $conn->prepare($order_query);

if (!$order_stmt) {
    die("Error preparing the order statement: " . $conn->error);
}

// Bind parameters
$order_stmt->bind_param("ssssssdss", $c_id, $fullname, $email, $address, $duration, $renieve, $total_price, $start_date, $end_date);
if (!$order_stmt->execute()) {
    die("Error executing the order statement: " . $order_stmt->error);
}

// Get the last inserted order ID
$order_id = $conn->insert_id;
$_SESSION['order_id'] = $order_id; // Store the order ID in session

// Insert each item into the order_items table
$item_query = "INSERT INTO order_items (order_id, item_id, n_id) VALUES (?, ?, ?)";
$item_stmt = $conn->prepare($item_query);

if (!$item_stmt) {
    die("Error preparing the item statement: " . $conn->error);
}

// Loop through cart items to save them in the database
foreach ($cart_items as $item) {
    // Validate the keys
    $item_id = $item['id'] ?? null;
    $n_id = $item['n_id'] ?? null;

    if (empty($item_id) || empty($n_id)) {
        die("Error: Missing item_id or n_id for cart item.");
    }

    // Bind the parameters and execute
    $item_stmt->bind_param("iss", $order_id, $item_id, $n_id);
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
