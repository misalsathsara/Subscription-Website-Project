<?php
session_start();
include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('header2.php'); // Include logged-in header
} else {
    include('header.php'); // Include default header
}

// Retrieve cart items for the logged-in user
// Retrieve cart items for the logged-in user
$query = "SELECT c.id, i.name, i.price, i.image
          FROM cart c
          JOIN items i ON c.n_id = i.n_id
          WHERE c.username = ?";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$cartItems = [];
$totalAmount = 0;

while ($row = $result->fetch_assoc()) {
    $cartItems[] = $row;
    $totalAmount += $row['price'];
}

// Store the cart items in session
$_SESSION['cart_items'] = $cartItems;

$stmt->close();
$conn->close();

?>
<style>
    .card {
        transition: transform 0.3s ease;
        border: none; /* Remove default border */
    }

    .card:hover {
        transform: translateY(-10px); /* Slightly lift the card */
    }

    .card-title {
        font-weight: bold;
        color: #343a40; /* Darker color for better contrast */
    }

    .text-success {
        font-weight: bold; /* Make total amount bold */
    }

    .btn-primary {
        background-color: #007bff; /* Bootstrap primary color */
        border: none; /* Remove border */
        padding: 10px 20px; /* Adjust padding */
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(0,123,255,.5); /* Add shadow on focus */
        border-color: #007bff; /* Change border color on focus */
    }

    .alert {
        background-color: #e9ecef; /* Light gray background */
        color: #495057; /* Darker text */
    }


</style>

<div class="container my-5">
    <h1 class="text-center mb-4">Checkout</h1>

    <?php if (!empty($cartItems)) : ?>
        <div class="row">
            <?php foreach ($cartItems as $item) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm rounded-lg">
                        <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="text-muted mb-1">$<?php echo number_format($item['price'], 2); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-4">
            <h3>Total: <span class="text-success">$<?php echo number_format($totalAmount, 2); ?></span></h3>
        </div>

        <h4 class="mt-4">Billing Information</h4>
        <form action="process_checkout.php" method="POST" class="border p-4 rounded bg-light shadow-sm">
    <div class="mb-3">
        <label for="fullname" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="fullname" name="fullname" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Shipping Address</label>
        <textarea class="form-control" id="address" name="address" required></textarea>
    </div>
    <div class="mb-3">
        <label for="package_duration" class="form-label">Package Duration</label>
        <select class="form-select" id="package_duration" name="package_duration" required>
            <option value="" selected disabled>Select package duration</option>
            <option value="every week">Every Week</option>
            <option value="every two weeks">Every Two Weeks</option>
            <option value="every month">Every Month</option>
            <option value="every 2 months">Every 2 Months</option>
            <option value="every 3 months">Every 3 Months</option>
            <option value="every 4 months">Every 4 Months</option>
            <option value="every 5 months">Every 5 Months</option>
            <option value="every 6 months">Every 6 Months</option>
            <option value="every year">Every Year</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="received_time" class="form-label">Received Time</label>
        <select class="form-select" id="received_time" name="received_time" required>
            <option value="" selected disabled>Select received time</option>
            <option value="start of the week">Start of the Week</option>
            <option value="middle of the week">Middle of the Week</option>
            <option value="end of the week">End of the Week</option>
            <option value="start of the month">Start of the Month</option>
            <option value="middle of the month">Middle of the Month</option>
            <option value="end of the month">End of the Month</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary btn-lg w-100">Proceed to Payment</button>
</form>

    <?php else : ?>
        <div class="alert alert-info text-center" role="alert">
            <i class="fas fa-info-circle"></i> Your cart is empty.
        </div>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>
