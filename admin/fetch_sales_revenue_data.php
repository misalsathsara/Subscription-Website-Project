<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');

// Include the database connection file
include '../dbase.php';  // Adjust the path if necessary

// Fetch monthly sales from orders
$salesQuery = "SELECT MONTHNAME(order_date) AS month, SUM(total_price) AS total_sales FROM orders WHERE YEAR(order_date) = YEAR(CURDATE()) GROUP BY MONTH(order_date) ORDER BY MONTH(order_date)";
$salesResult = $conn->query($salesQuery);
$salesData = [];
while ($row = $salesResult->fetch_assoc()) {
    $salesData[$row['month']] = (float) $row['total_sales'];
}

// Fetch monthly revenue from payments
$revenueQuery = "SELECT MONTHNAME(payment_date) AS month, SUM(payment_amount) AS total_revenue FROM payments WHERE YEAR(payment_date) = YEAR(CURDATE()) GROUP BY MONTH(payment_date) ORDER BY MONTH(payment_date)";
$revenueResult = $conn->query($revenueQuery);
$revenueData = [];
while ($row = $revenueResult->fetch_assoc()) {
    $revenueData[$row['month']] = (float) $row['total_revenue'];
}


$conn->close();

// Combine sales and revenue into months, ensuring all months are represented
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
$result = array_map(function($month) use ($salesData, $revenueData) {
    return [
        'month' => $month,
        'sales' => $salesData[$month] ?? 0,
        'revenue' => $revenueData[$month] ?? 0
    ];
}, $months);

echo json_encode($result);
?>
