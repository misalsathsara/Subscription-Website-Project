<?php
header('Content-Type: application/json');
include '../dbase.php';  // Make sure this path correctly points to your database connection script

$query = "SELECT MONTHNAME(order_date) AS month, SUM(total_price) AS total_sales FROM orders GROUP BY MONTH(order_date) ORDER BY MONTH(order_date)";
$result = $conn->query($query);

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = [
        'month' => $row['month'],
        'sales' => (float) $row['total_sales']
    ];
}

$conn->close();
echo json_encode($data);
