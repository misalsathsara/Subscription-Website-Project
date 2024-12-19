<?php
session_start();
include 'dbase.php'; // Include your database connection

// Check if the order ID is set in the session
if (!isset($_SESSION['order_id'])) {
    header("Location: index.php"); // Redirect if no order is found in session
    exit;
}

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    include('header2.php'); // Include logged-in header
} else {
    include('header.php'); // Include default header
}

$order_id = $_SESSION['order_id'];

// Fetch order details from the database
$order_query = "SELECT * FROM orders WHERE id = ?";
$order_stmt = $conn->prepare($order_query);
$order_stmt->bind_param("i", $order_id);
$order_stmt->execute();
$order_result = $order_stmt->get_result();

// Check if the order exists
if ($order_result->num_rows == 0) {
    echo "Order not found.";
    exit;
}

$order = $order_result->fetch_assoc();

// Fetch the items in the order
$item_query = "SELECT oi.*, o.total_price FROM order_items oi 
               JOIN orders o ON oi.order_id = o.id WHERE oi.order_id = ?";
$item_stmt = $conn->prepare($item_query);
$item_stmt->bind_param("i", $order_id);
$item_stmt->execute();
$item_result = $item_stmt->get_result();

$total_price = 0;
$items = [];
while ($item = $item_result->fetch_assoc()) {
    $total_price = $item['total_price'];
    $items[] = $item;
}

$item_stmt->close();
$order_stmt->close();
$conn->close();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link rel="stylesheet" href="style.css"> <!-- Make sure to include your stylesheet -->
    <style>
        .container {
            margin-top: 30px;
        }
        .order-details {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Order Summary</h1>
        
        <div class="order-details mb-4">
            <h3>Order ID: <?php echo $order['id']; ?></h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($order['fullname']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Duration:</strong> <?php echo htmlspecialchars($order['duration']); ?></p>
            <p><strong>Received Time:</strong> <?php echo htmlspecialchars($order['renieve']); ?></p>
            <p><strong>Total Price:</strong> LKR <?php echo number_format($total_price, 2); ?></p>
        </div>

        <h4 class="mt-4">Payment Details</h4>
        <form id="paymentForm" method="POST">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Select Payment Method:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="paypal">PayPal</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <div id="credit_card_fields" style="display: none;">
                <div class="mb-3">
                    <label for="card_number" class="form-label">Card Number:</label>
                    <input type="text" id="card_number" name="card_number" class="form-control" placeholder="Enter card number">
                </div>
                <div class="mb-3">
                    <label for="expiration_date" class="form-label">Expiration Date:</label>
                    <input type="text" id="expiration_date" name="expiration_date" class="form-control" placeholder="MM/YY">
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV:</label>
                    <input type="text" id="cvv" name="cvv" class="form-control" placeholder="CVV">
                </div>
            </div>

            <button type="button" id="submitBtn" class="btn btn-custom w-100 mt-3">Pay Now</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script>
        document.getElementById('payment_method').addEventListener('change', function() {
            var paymentMethod = this.value;
            var creditCardFields = document.getElementById('credit_card_fields');
            creditCardFields.style.display = paymentMethod === 'credit_card' ? 'block' : 'none';
        });

        $('#submitBtn').on('click', function () {
    var formData = $('#paymentForm').serialize();

    $.ajax({
        url: 'payment_process.php',
        method: 'POST',
        data: formData,
        success: function (response) {
            if (response.status === 'success') {
                Swal.fire({
                    icon: 'success',
                    title: 'Payment Successful',
                    text: response.message,
                    showConfirmButton: false,
                    timer: 3000
                })
                .then(() => {
                 window.location.reload ();
                });

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Payment Failed',
                    text: response.message,
                    confirmButtonText: 'Try Again'
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An unexpected error occurred. Please try again.',
                confirmButtonText: 'OK'
            });
        }
    });
});

    </script>

    <?php include 'footer.php'; ?>
</body>
</html>
