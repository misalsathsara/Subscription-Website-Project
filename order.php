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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">

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
    background-color: #f2c531;
    color: #856404;
}

.status-cancelled {
    background-color:rgb(237, 116, 103);
    color: #721c24;
}
.status-returned {
    background-color: #fb839f;
    color: #721c24;
}

.status-recived {
    background-color: #72aaf8;
    color: rgb(16, 13, 21);
}

.status-processed {
    background-color:rgb(154, 247, 191);
    color: rgb(20, 60, 43);
}

.status-shipped {
    background-color: #59c5ed;
    color: rgb(15, 42, 55);
}

.status-delivered {
    background-color: #57fa75;
    color: rgb(24, 60, 54);
}

.status-reviewed {
    background-color:rgb(191, 135, 255);
    color: rgb(24, 60, 54);
}

.status-DeliveredConfirmed {
    background-color:rgb(65, 141, 248);
    color: rgb(24, 60, 54);
}

.action-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.action-buttons button {
    padding: 5px 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
}

.cancel-btn {
    background-color: #ffcccc;
    color: #d80000;
}

.return-btn {
    background-color: #cce5ff;
    color: #004085;
}

.review-btn {
    background-color: #e2e3e5;
    color: #383d41;
}

/* Modal Background */
.modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7); /* Dark background with opacity */
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    animation: fadeIn 0.3s ease-out;
}

/* Modal Content */
.modal-content {
    background: #fff; /* Clean white background */
    padding: 30px;
    border-radius: 8px;
    width: 450px;
    max-width: 90%;
    position: relative;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1); /* Professional shadow */
    color: #333; /* Dark text for readability */
    animation: slideDown 0.3s ease-out;
    font-family: 'Arial', sans-serif; /* Professional font */
}

/* Close Button */
.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 18px;
    cursor: pointer;
    color: #888;
    background: none;
    border: none;
    padding: 5px;
    transition: color 0.3s ease;
}

.close-btn:hover {
    color: #f44336; /* Red color on hover */
}

/* Modal Title */
.modal-content h2 {
    margin-top: 0;
    font-size: 22px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
    color: #333; /* Dark text for professionalism */
}

/* Form Labels */
.modal-content label {
    display: block;
    margin-top: 10px;
    font-size: 14px;
    font-weight: 500;
    color: #555;
}

/* Form Inputs */
.modal-content input,
.modal-content textarea {
    width: 100%;
    padding: 12px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    color: #333;
    transition: border-color 0.3s ease;
}

.modal-content input:focus,
.modal-content textarea:focus {
    border-color: #007BFF; /* Blue border on focus */
}

/* Button */
.modal-content button {
    width: 100%;
    padding: 12px;
    margin-top: 20px;
    background: #007BFF; /* Professional blue color */
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}

.modal-content button:hover {
    background: #0056b3; /* Darker blue on hover */
}

/* Animations */
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

@keyframes slideDown {
    from {
        transform: translateY(-20px);
    }
    to {
        transform: translateY(0);
    }
}

/* Responsive for smaller screens */
@media (max-width: 500px) {
    .modal-content {
        width: 90%;
        padding: 20px;
    }

    .modal-content h2 {
        font-size: 18px;
    }

    .modal-content button {
        padding: 10px;
    }
}

    </style>
</head>

<body>
<?php
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('dbase.php');

    $queryOrders = "
        SELECT id, payment_status, order_status, order_date, tracking_id 
        FROM orders 
        WHERE c_id = (SELECT c_id FROM customers WHERE c_uname = ?) ";
    $stmtOrders = $conn->prepare($queryOrders);
    $stmtOrders->bind_param("s", $username);
    $stmtOrders->execute();
    $resultOrders = $stmtOrders->get_result();

    $pendingOrderIDs = [];
    $orderStatus = [];
    $orderDates = [];
    $trackingIDs = [];
    if ($resultOrders->num_rows > 0) {
        while ($row = $resultOrders->fetch_assoc()) {
            $pendingOrderIDs[] = $row['id'];
            $orderStatus[$row['id']] = $row['order_status'];
            $orderDates[$row['id']] = $row['order_date'];
            $trackingIDs[$row['id']] = $row['tracking_id'];
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
                echo "<div class='order-item' id='order-card-$order_id'>"; // Added unique ID
                echo "<p><strong>Order ID:</strong> $order_id</p>";
                echo "<p class='order-status status-" . strtolower($orderStatus[$order_id]) . "'>Status: " . ucfirst($orderStatus[$order_id]) . "</p>";
                
                // Display tracking ID for shipped or delivered orders
            
                echo "<div class='item-list'>";
                foreach ($n_ids as $n_id) {
                    if (isset($itemDetails[$n_id])) {
                        $item = $itemDetails[$n_id];
                        echo "<div class='item'>";
                        echo "<img src='admin/" . htmlspecialchars($item['image']) . "' alt='" . htmlspecialchars($item['name']) . "' class='item-image'>";
                        echo "<div>";
                        echo "<p><strong>Name:</strong> " . htmlspecialchars($item['name']) . "</p>";
                        echo "<p><strong>Type:</strong> " . htmlspecialchars($item['type']) . "</p>";
                        echo "<p><strong>Price:</strong> LKR " . number_format($item['price'], 2) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                echo "</div>";
                $currentTime = strtotime(date('Y-m-d H:i:s'));
                $orderTime = strtotime($orderDates[$order_id]);
                $timeDifference = $currentTime - $orderTime;
            
                echo "<div class='action-buttons'>";
                if (in_array(strtolower($orderStatus[$order_id]), ['pending', 'recived', 'processed'])) {
                    if ($timeDifference <= 86400) {
                        echo "<button class='cancel-btn' onclick='updateOrderStatus($order_id, \"cancelled\")'>Cancel</button>";
                    }
                }
                
            
                if (strtolower($orderStatus[$order_id]) === 'delivered') {
                    echo "<button class='return-btn' onclick='updateOrderStatus($order_id, \"returned\")'>Return</button>";
                    echo "<button class='return-btn' onclick='updateOrderStatus($order_id, \"DeliveredConfirmed\")'>Confirm</button>";
                    echo "<button class='review-btn' onclick='openReviewModal($order_id, \"$n_id\")'>Add Reviews</button>";
                }
                echo "</div>";
                if (in_array(strtolower($orderStatus[$order_id]), ['shipped', 'delivered'])) {
                    $trackingID = $trackingIDs[$order_id] ?? 'N/A';
                    echo "<p><strong>Tracking ID:</strong> " . htmlspecialchars($trackingID) . "</p>";
                }
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

<!-- Review Modal -->
<div id="reviewModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close-btn" onclick="closeReviewModal()">&times;</span>
        <h2>Add Review</h2>
        <form id="reviewForm">
            <input type="hidden" id="reviewOrderID" name="order_id">
            <input type="hidden" id="reviewNID" name="n_id">
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required>
            <label for="reviewDescription">Review:</label>
            <textarea id="reviewDescription" name="review_description" rows="4" required></textarea>
            <button type="button" onclick="submitReview(<?php echo $order_id; ?>, '<?php echo $n_id; ?>')">Submit</button>




        </form>
    </div>
</div>


<script>
    function updateOrderStatus(orderId, status) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_order_status.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                location.reload();
            }
        };
        xhr.send(`order_id=${orderId}&status=${status}`);
    }

    function openReviewModal(orderId, nId) {
        document.getElementById('reviewOrderID').value = orderId;
        document.getElementById('reviewNID').value = nId;
        document.getElementById('reviewModal').style.display = 'flex';
    }

    function closeReviewModal() {
        document.getElementById('reviewModal').style.display = 'none';
    }

    function submitReview(orderId, nId) {
    const rating = document.getElementById('rating').value;
    const reviewDescription = document.getElementById('reviewDescription').value;

    // Submit review using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit_review.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText.trim() === "success") {
                // Review added successfully, update the order status
                const updateStatusXHR = new XMLHttpRequest();
                updateStatusXHR.open('POST', 'r_update.php', true);
                updateStatusXHR.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                updateStatusXHR.onreadystatechange = function () {
                    if (updateStatusXHR.readyState === 4 && updateStatusXHR.status === 200) {
                        alert('Review added successfully, and order status updated to reviewed.');
                        closeReviewModal(); // Assuming you have a function to close the modal
                        document.querySelector(`.order-item[data-order-id="${orderId}"]`).remove(); // Remove the order card
                    } else if (updateStatusXHR.readyState === 4) {
                        alert('Failed to update order status.');
                    }
                };
                updateStatusXHR.send(`order_id=${orderId}&status=reviewed`);
            } else {
                alert('Failed to add review. Please try again.');
            }
        }
    };
    xhr.send(`order_id=${orderId}&n_id=${nId}&rating=${rating}&review_description=${encodeURIComponent(reviewDescription)}`);
}

</script>


</body>

</html>
