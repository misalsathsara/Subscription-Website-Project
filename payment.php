<?php
session_start(); // Start the session
include 'dbase.php'; // Include your database connection

// Check if the order ID is set in the session
if (!isset($_SESSION['order_id'])) {
    header("Location: index.php"); // Redirect if no order is found in session
    exit;
}

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // If the user is logged in, include the logged-in header (header2.php)
    include('header2.php');
} else {
    // If the user is not logged in, include the default header (header.php)
    include('header.php');
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
$item_query = "SELECT oi.*, i.name, i.price FROM order_items oi 
               JOIN items i ON oi.item_id = i.n_id WHERE oi.order_id = ?";
$item_stmt = $conn->prepare($item_query);
$item_stmt->bind_param("i", $order_id);
$item_stmt->execute();
$item_result = $item_stmt->get_result();

// Initialize total price
$total_price = 0;
$items = [];

while ($item = $item_result->fetch_assoc()) {
    $total_price += $item['price'];
    $items[] = $item;
}

$item_stmt->close();
$order_stmt->close();
$conn->close();
?> 
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
        .order-items {
            list-style-type: none;
            padding: 0;
        }
        .order-items li {
            background-color: #fff;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
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
        
        <!-- Order Details Section -->
        <div class="order-details mb-4">
            <h3>Order ID: <?php echo $order['id']; ?></h3>
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($order['fullname']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($order['email']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
            <p><strong>Duration:</strong> <?php echo htmlspecialchars($order['duration']); ?></p>
            <p><strong>Received Time:</strong> <?php echo htmlspecialchars($order['renieve']); ?></p>
            <p><strong>Total Price:</strong> $<?php echo number_format($total_price, 2); ?></p>
        </div>

        <!-- Items List -->
        <h4>Items in your Order</h4>
        <ul class="order-items">
            <?php foreach ($items as $item) { ?>
                <li>
                    <strong><?php echo htmlspecialchars($item['item_name']); ?></strong>
                    - $<?php echo number_format($item['price'], 2); ?>
                </li>
            <?php } ?>
        </ul>

        <!-- Payment Method Form -->
        <h4 class="mt-4">Payment Details</h4>
        <form action="payment_process.php" method="POST">
            <div class="mb-3">
                <label for="payment_method" class="form-label">Select Payment Method:</label>
                <select name="payment_method" id="payment_method" class="form-select" required>
                    <option value="paypal">PayPal</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <!-- Credit Card Details (hidden by default) -->
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

            <button type="submit" name="pay_now" class="btn btn-custom w-100 mt-3">Pay Now</button>
        </form>
    </div>

    <!-- SweetAlert2 Script -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>
    // Show credit card fields when selected
    document.getElementById('payment_method').addEventListener('change', function() {
        var paymentMethod = this.value;
        var creditCardFields = document.getElementById('credit_card_fields');
        if (paymentMethod === 'credit_card') {
            creditCardFields.style.display = 'block';
        } else {
            creditCardFields.style.display = 'none';
        }
    });

    // Check if payment is successful, if so show SweetAlert and redirect
    <?php if (isset($_GET['payment_status']) && $_GET['payment_status'] == 'success') { ?>
        Swal.fire({
            title: 'Payment Successful!',
            text: 'Your payment has been processed successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'user-profile.php';
            }
        });
    <?php } ?>
</script>

    
    <?php
  include 'footer.php';
?>
