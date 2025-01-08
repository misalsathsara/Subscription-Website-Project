<?php
// Include the database connection file
include '../dbase.php';

// Check if order_id is set
if (isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    // Query to fetch n_id values for the given order_id
    $query = "SELECT n_id FROM order_items WHERE order_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $nIds = [];
        while ($row = $result->fetch_assoc()) {
            $nIds[] = $row['n_id'];
        }

        // Fetch data for the relevant n_id values from the items table
        $nIdsPlaceholders = implode(',', array_fill(0, count($nIds), '?'));
        $queryItems = "SELECT * FROM items WHERE n_id IN ($nIdsPlaceholders)";
        $stmtItems = $conn->prepare($queryItems);

        // Bind parameters dynamically
        $stmtItems->bind_param(str_repeat('i', count($nIds)), ...$nIds);
        $stmtItems->execute();
        $itemsResult = $stmtItems->get_result();

        if ($itemsResult->num_rows > 0) {
            echo "<table class='table table-bordered'>";
            echo "<thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            while ($item = $itemsResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($item['name']) . "</td>";
                echo "<td>" . htmlspecialchars($item['type']) . "</td>";
                echo "<td>" . htmlspecialchars($item['description']) . "</td>";
                echo "<td>LKR " . number_format($item['price'], 2) . "</td>";
                echo "<td><img src='" . htmlspecialchars($item['image']) . "' alt='" . htmlspecialchars($item['name']) . "' style='max-width: 50px; max-height: 50px;'></td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No items found for the provided n_id values.";
        }

        $stmtItems->close();
    } else {
        echo "No n_id found for Order ID: " . $orderId;
    }

    // Fetch the shipping address and order status from the orders table
    $queryAddress = "SELECT address, order_status FROM orders WHERE id = ?";
    $stmtAddress = $conn->prepare($queryAddress);
    $stmtAddress->bind_param('i', $orderId);
    $stmtAddress->execute();
    $addressResult = $stmtAddress->get_result();

    if ($addressResult->num_rows > 0) {
        $order = $addressResult->fetch_assoc();
        if (in_array($order['order_status'], ['recived', 'processed'])) {
            echo "<div class='mt-4'>";
            echo "<h4>Shipping Address</h4>";
            echo "<p>" . htmlspecialchars($order['address']) . "</p>";
            echo "</div>";
        } else {
            // echo "<div class='mt-4 text-danger'>Shipping address is only available for orders with status 'received' or 'processed'.</div>";
        }
    } else {
        echo "No shipping address found for Order ID: " . $orderId;
    }

    // Close the statement and connection
    $stmt->close();
    $stmtAddress->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
