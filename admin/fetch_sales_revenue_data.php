<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Include the database connection
include '../dbase.php'; // Adjust the path if necessary

if (!$conn) {
    die(json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]));
}

// Determine the date range based on the selected range
$range = $_GET['range'] ?? 'today';
$startDate = $endDate = date('Y-m-d'); // Default to today

switch ($range) {
    case 'yesterday':
        $startDate = $endDate = date('Y-m-d', strtotime('-1 day'));
        break;
    case '7 days':
        $startDate = date('Y-m-d', strtotime('-6 days')); // Include today
        break;
    case '15 days':
        $startDate = date('Y-m-d', strtotime('-14 days')); // Include today
        break;
    case '30 days':
        $startDate = date('Y-m-d', strtotime('-29 days')); // Include today
        break;
}

// Fetch sales and revenue data for the selected date range
$salesQuery = "
    SELECT DATE(order_date) AS date, SUM(total_price) AS total_sales 
    FROM orders 
    WHERE DATE(order_date) BETWEEN '$startDate' AND '$endDate' 
    GROUP BY DATE(order_date)
    ORDER BY DATE(order_date)";
$salesResult = $conn->query($salesQuery);

$salesData = [];
if ($salesResult) {
    while ($row = $salesResult->fetch_assoc()) {
        $salesData[$row['date']] = (float)$row['total_sales'];
    }
}

$revenueQuery = "
    SELECT DATE(payment_date) AS date, SUM(payment_amount) AS total_revenue 
    FROM payments 
    WHERE DATE(payment_date) BETWEEN '$startDate' AND '$endDate' 
    GROUP BY DATE(payment_date)
    ORDER BY DATE(payment_date)";
$revenueResult = $conn->query($revenueQuery);

$revenueData = [];
if ($revenueResult) {
    while ($row = $revenueResult->fetch_assoc()) {
        $revenueData[$row['date']] = (float)$row['total_revenue'];
    }
}

$conn->close();

// Combine sales and revenue data
$result = [];
foreach (range(0, (strtotime($endDate) - strtotime($startDate)) / 86400) as $offset) {
    $date = date('Y-m-d', strtotime($startDate . " +$offset days"));
    $result[] = [
        'month' => $date,
        'sales' => $salesData[$date] ?? 0,
        'revenue' => $revenueData[$date] ?? 0,
    ];
}

echo json_encode($result);
