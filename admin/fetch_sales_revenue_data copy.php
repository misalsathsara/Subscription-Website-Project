<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Include database connection
include '../dbase.php';

if (!$conn) {
    die(json_encode(['error' => 'Database connection failed: ' . mysqli_connect_error()]));
}

// Get the range from the request (default to 'today')
$range = $_GET['range'] ?? 'today';

// Determine the date range for the query
switch ($range) {
    case 'yesterday':
        $startDate = date('Y-m-d', strtotime('yesterday'));
        $endDate = $startDate;
        break;
    case '7':
        $startDate = date('Y-m-d', strtotime('-7 days'));
        $endDate = date('Y-m-d');
        break;
    case '15':
        $startDate = date('Y-m-d', strtotime('-15 days'));
        $endDate = date('Y-m-d');
        break;
    case '30':
        $startDate = date('Y-m-d', strtotime('-30 days'));
        $endDate = date('Y-m-d');
        break;
    case 'today':
    default:
        $startDate = date('Y-m-d');
        $endDate = $startDate;
        break;
}

// Fetch sales and revenue data within the date range
$query = "
    SELECT DATE(order_date) AS date, SUM(total_price) AS sales 
    FROM orders 
    WHERE order_date BETWEEN '$startDate' AND '$endDate'
    GROUP BY DATE(order_date)
    ORDER BY DATE(order_date)";
$result = $conn->query($query);

$data = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            'date' => $row['date'],
            'sales' => (float)$row['sales']
        ];
    }
}

$conn->close();

// Output the data as JSON
echo json_encode($data);
?>
