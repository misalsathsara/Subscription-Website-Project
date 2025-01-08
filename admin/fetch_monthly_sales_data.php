<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Include the database connection
include '../dbase.php';

if (!$conn) {
    die(json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]));
}

// Fetch monthly sales and revenue data
$query = "
    SELECT MONTHNAME(order_date) AS month, 
           SUM(total_price) AS total_sales, 
           (SELECT SUM(payment_amount) 
            FROM payments 
            WHERE YEAR(payment_date) = YEAR(CURDATE()) 
              AND MONTH(payment_date) = MONTH(order_date)) AS total_revenue
    FROM orders 
    WHERE YEAR(order_date) = YEAR(CURDATE()) 
    GROUP BY MONTH(order_date) 
    ORDER BY MONTH(order_date)";

$result = $conn->query($query);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'month' => $row['month'],
            'sales' => (float)$row['total_sales'],
            'revenue' => (float)$row['total_revenue'],
        ];
    }
}

$conn->close();

// If data is empty, return a message
if (empty($data)) {
    echo json_encode(['error' => 'No data available']);
} else {
    echo json_encode($data); // Return the fetched data
}
