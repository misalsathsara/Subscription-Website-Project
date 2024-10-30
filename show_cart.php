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

$stmt->close();
$conn->close();
?>

    <div class="container my-5">
        <h1 class="text-center mb-4">Your Cart Items</h1>

        <?php if (!empty($cartItems)) : ?>
            <div class="row">
                <?php foreach ($cartItems as $item) : ?>
                    <div class="col-md-4 mb-4"> <!-- Changed from col-md-6 to col-md-4 for smaller cards -->
                        <div class="card shadow-sm rounded-lg">
                            <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>" style="height: 150px; object-fit: cover;"> <!-- Reduced image height -->
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title mb-1" style="font-size: 1rem;"><?php echo htmlspecialchars($item['name']); ?></h5> <!-- Reduced font size -->
                                        <p class="text-muted mb-1">LKR <?php echo number_format($item['price'], 2); ?></p>
                                    </div>
                                    <form action="remove_from_cart.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="cart_id" value="<?php echo $item['id']; ?>">
                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i> Remove
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-4">
                <h3>Total: <span class="text-success">LKR <?php echo number_format($totalAmount, 2); ?></span></h3>
                <a href="checkout.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-shopping-cart"></i> Proceed to Checkout
                </a>
            </div>
        <?php else : ?>
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle"></i> Your cart is empty.
            </div>
        <?php endif; ?>
    </div>


    <?php include('footer.php'); ?>
