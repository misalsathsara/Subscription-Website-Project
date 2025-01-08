<?php
// Include your database connection script
include '../dbase.php';  // Adjust the path to your actual database connection file

// SQL query to fetch all orders
$query = "SELECT id, fullname, total_price, payment_status, order_date,order_status FROM orders ORDER BY order_date DESC";
$result = $conn->query($query);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><div class='media-box'><i class='bi bi-person-circle' style='font-size: 1.5em;'></i><div class='media-box-body'><div class='text-truncate'>" . htmlspecialchars($row['fullname']) . "</div></div></div></td>";
        echo "<td>" . $row['id'] . "</td>"; // Displaying order ID instead of user ID
        echo "<td>" . date('d/m/Y', strtotime($row['order_date'])) . "</td>";
        echo "<td>$" . number_format($row['total_price'], 2) . "</td>";
        echo "<td><span class='text-" . ($row['payment_status'] == 'paid' ? "green" : ($row['payment_status'] == 'failed' ? "red" : "blue")) . " td-status'><i class='bi " . ($row['payment_status'] == 'paid' ? "bi-check-circle" : ($row['payment_status'] == 'failed' ? "bi-x-circle" : "bi-clock-history")) . "'></i> " . ucfirst($row['payment_status']) . "</span></td>";
        echo "<td><span class='badge shade-" . ($row['order_status'] == 'delivered' ? "green" : ($row['order_status'] == 'cancelled' ? "red" : "blue")) . " min-90'>" . ucfirst($row['order_status']) . "</span></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No orders found</td></tr>";
}

$conn->close();
