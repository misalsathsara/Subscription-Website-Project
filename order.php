<?php
session_start();
// include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('header2.php'); // Include logged-in header
} else {
    include('header.php'); // Include default header
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Blog</title>
    <!-- <link rel="stylesheet" href="details.css"> -->
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body>
<?php
// Check if user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Include the database connection
    include('dbase.php');

    // Query to get orders of the logged-in customer
    $query = "SELECT * FROM orders WHERE email = (SELECT c_email FROM customers WHERE c_uname = ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username); // Bind the username to the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if orders exist
    if ($result->num_rows > 0) {
        echo "<div class='order-list'>";
        while ($row = $result->fetch_assoc()) {
            // Display order details
            echo "<div class='order-item'>";
            echo "<h3>Order ID: " . $row['id'] . "</h3>";
            echo "<p><strong>Customer Name:</strong> " . $row['fullname'] . "</p>";
            echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
            echo "<p><strong>Address:</strong> " . $row['address'] . "</p>";
            echo "<p><strong>Total Price:</strong> " . $row['total_price'] . "</p>";
            echo "<p><strong>Payment Status:</strong> " . $row['payment_status'] . "</p>";
            echo "<p><strong>Order Date:</strong> " . $row['order_date'] . "</p>";

            // Optionally, you can add more details such as order items here
            echo "</div>"; // Close order item
        }
        echo "</div>"; // Close order list
    } else {
        echo "<p>No orders found for this customer.</p>";
    }
} else {
    // If the user is not logged in, display a message
    echo "<p>Please log in to view your orders.</p>";
}
?>




</body>

</html>

