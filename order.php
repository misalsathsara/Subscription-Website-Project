<?php
session_start();

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
    <link rel="stylesheet" href="order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .order-item-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }

        .order-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            padding: 15px;
        }

        .order-item p {
            margin: 5px 0;
        }

        .item-list {
            margin-top: 10px;
        }

        .item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .item img {
            width: 100px;
            height: 100px;
            border-radius: 5px;
            margin-right: 10px;
            object-fit: cover;
        }

        .item p {
            margin: 0;
            font-size: 14px;
        }

        .order-status {
            margin-top: 10px;
            padding: 8px;
            font-size: 14px;
            border-radius: 5px;
            text-align: center;
        }

        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }

        .status-recived {
            background-color: #f8d7da;
            color:rgb(97, 18, 208);
        }
    </style>
</head>

<body>
<?php
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('dbase.php');

    $queryOrders = "
        SELECT id, payment_status, order_status 
        FROM orders 
        WHERE c_id = (SELECT c_id FROM customers WHERE c_uname = ?) ";
    $stmtOrders = $conn->prepare($queryOrders);
    $stmtOrders->bind_param("s", $username);
    $stmtOrders->execute();
    $resultOrders = $stmtOrders->get_result();

    $pendingOrderIDs = [];
    $orderStatus = [];
    if ($resultOrders->num_rows > 0) {
        while ($row = $resultOrders->fetch_assoc()) {
            $pendingOrderIDs[] = $row['id'];
            $orderStatus[$row['id']] = $row['order_status'];
        }
    }

    if (!empty($pendingOrderIDs)) {
        $orderIDsPlaceholders = implode(',', array_fill(0, count($pendingOrderIDs), '?'));
        $queryOrderItems = "
            SELECT order_id, n_id 
            FROM order_items 
            WHERE order_id IN ($orderIDsPlaceholders)";
        $stmtOrderItems = $conn->prepare($queryOrderItems);
        $types = str_repeat('i', count($pendingOrderIDs));
        $stmtOrderItems->bind_param($types, ...$pendingOrderIDs);
        $stmtOrderItems->execute();
        $resultOrderItems = $stmtOrderItems->get_result();

        $orderItems = [];
        $allNIDs = [];
        while ($row = $resultOrderItems->fetch_assoc()) {
            $orderItems[$row['order_id']][] = $row['n_id'];
            $allNIDs[] = $row['n_id'];
        }

        if (!empty($allNIDs)) {
            $nIDsPlaceholders = implode(',', array_fill(0, count($allNIDs), '?'));
            $queryItems = "
                SELECT n_id, name, type, description, price, image 
                FROM items 
                WHERE n_id IN ($nIDsPlaceholders)";
            $stmtItems = $conn->prepare($queryItems);
            $types = str_repeat('i', count($allNIDs));
            $stmtItems->bind_param($types, ...$allNIDs);
            $stmtItems->execute();
            $resultItems = $stmtItems->get_result();

            $itemDetails = [];
            while ($row = $resultItems->fetch_assoc()) {
                $itemDetails[$row['n_id']] = $row;
            }

            echo "<div class='order-item-list'>";
            foreach ($orderItems as $order_id => $n_ids) {
                echo "<div class='order-item'>";
                echo "<p><strong>Order ID:</strong> $order_id</p>";
                echo "<p class='order-status status-" . strtolower($orderStatus[$order_id]) . "'>Status: " . ucfirst($orderStatus[$order_id]) . "</p>";
                echo "<div class='item-list'>";
                foreach ($n_ids as $n_id) {
                    if (isset($itemDetails[$n_id])) {
                        $item = $itemDetails[$n_id];
                        echo "<div class='item'>";
                        echo "<img src='admin/" . htmlspecialchars($item['image']) . "' alt='" . htmlspecialchars($item['name']) . "' class='item-image'>";
                        echo "<div>";
                        echo "<p><strong>Name:</strong> " . htmlspecialchars($item['name']) . "</p>";
                        echo "<p><strong>Type:</strong> " . htmlspecialchars($item['type']) . "</p>";
                        // echo "<p><strong>Description:</strong> " . htmlspecialchars($item['description']) . "</p>";
                        echo "<p><strong>Price:</strong> $" . number_format($item['price'], 2) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<p>No items found for the pending orders.</p>";
        }
    } else {
        echo "<p>No pending orders found for this customer.</p>";
    }
} else {
    echo "<p>Please log in to view your orders.</p>";
}
?>

</body>

</html>
