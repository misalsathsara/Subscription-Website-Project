<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'dbase.php'; // Include your database connection file

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    include('header2.php');
} else {
    include('header.php');
}

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ensure we have a valid item ID
$n_id = $_GET['n_id'] ?? '';
if (empty($n_id)) {
    header("Location: index.php");
    exit;
}

// Prepared statement to fetch item details
$sql = "SELECT i.*, IFNULL(AVG(r.rating), 0) AS avg_rating, COUNT(r.c_id) AS total_reviews
        FROM items i
        LEFT JOIN c_reviews r ON i.n_id = r.n_id
        WHERE i.n_id = ?
        GROUP BY i.n_id";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Error preparing item detail query: " . $conn->error);
}

$stmt->bind_param("s", $n_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
} else {
    echo "<p>Item not found</p>";
    exit;
}

// Retrieve customer reviews for the item
$review_sql = "SELECT c_id, rating, review_description FROM c_reviews WHERE n_id = ?";
$review_stmt = $conn->prepare($review_sql);
if (!$review_stmt) {
    die("Error preparing review query: " . $conn->error);
}

$review_stmt->bind_param("s", $n_id);
$review_stmt->execute();
$review_result = $review_stmt->get_result();

$reviews = [];
if ($review_result->num_rows > 0) {
    while ($review_row = $review_result->fetch_assoc()) {
        $reviews[] = $review_row;
    }
}

$conn->close();
?>

<style>
    /* Custom styles for the page */
    .star-rating {
        color: gold;
    }
    .review-item {
        border: 1px solid #e0e0e0;
        padding: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
        background-color: #fff;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .review-item:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }
    .button-container {
        margin-top: 20px;
    }
    .item-header {
        border-bottom: 1px solid #e0e0e0;
        padding-bottom: 15px;
        animation: fadeIn 0.5s ease-in-out;
    }
    .item-price {
        font-size: 1.75rem;
        color: #d9534f; /* Bootstrap danger color */
    }
    .img-fluid {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        transition: transform 0.3s ease;
    }
    .img-fluid:hover {
        transform: scale(1.05);
    }
    .btn-custom {
        border-radius: 20px;
        padding: 10px 20px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
        transform: translateY(-2px);
    }
    .btn-secondary {
        background-color: #6c757d;
        border-color: #6c757d;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
        transform: translateY(-2px);
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
        transform: translateY(-2px);
    }

    /* Footer styles */
    footer {
        background-color: #f8f9fa;
        padding: 20px 0;
        margin-top: 20px;
    }
    footer .footer-container {
        text-align: center;
    }
    footer a {
        margin: 0 10px;
        color: #007bff;
    }

    /* Animation Keyframes */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['name']); ?>">
        </div>
        <div class="col-md-6 mb-4">
            <div class="item-header">
                <h2><?php echo htmlspecialchars($item['name']); ?></h2>
                <p><strong></strong> <?php echo htmlspecialchars($item['type']); ?></p>
                <p class="item-price"><strong></strong> $<?php echo htmlspecialchars($item['price']); ?></p>
                <p><strong></strong> <?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                <p><strong></strong> <span class="star-rating"><?php echo round($item['avg_rating'], 1); ?></span> / 5 (<?php echo $item['total_reviews']; ?> reviews)</p>
            </div>

            <div class="button-container">
                <!-- Add to Cart Button -->
                <form action="add_to_cart.php" method="POST" style="display:inline;">
                    <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['price']); ?>">
                    <button type="submit" class="btn btn-primary btn-custom"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                </form>

                <!-- Add to Wishlist Button -->
                <form action="add_to_wishlist.php" method="POST" style="display:inline;">
                    <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['price']); ?>">
                    <button type="submit" class="btn btn-secondary btn-custom"><i class="fas fa-heart"></i> Add to Wishlist</button>
                </form>

                <!-- Buy Now Button -->
                <form action="buy_now.php" method="POST" style="display:inline;">
                    <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($item['name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($item['price']); ?>">
                    <button type="submit" class="btn btn-success btn-custom"><i class="fas fa-dollar-sign"></i> Buy Now</button>
                </form>
            </div>
        </div>
    </div>

    <div class="reviews-section">
        <h3>Customer Reviews</h3>
        <?php if (!empty($reviews)): ?>
            <?php foreach ($reviews as $review): ?>
                <div class="review-item">
                    <p><strong>User ID:</strong> <?php echo htmlspecialchars($review['c_id']); ?></p>
                    <p><strong>Rating:</strong> <span class="star-rating"><?php echo htmlspecialchars($review['rating']); ?></span> / 5</p>
                    <p><strong>Review:</strong> <?php echo nl2br(htmlspecialchars($review['review_description'])); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No reviews yet.</p>
        <?php endif; ?>
    </div>
</div>

<!-- jQuery Script to handle form submission -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle form submission for adding to cart
        $('form[action="add_to_cart.php"]').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            const form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Item added to cart successfully!');
                        // Update cart count or display
                    } else if (response.error === 'exists') {
                        alert('Item already exists in your cart.');
                    } else {
                        alert('Error adding item to cart: ' + response.error);
                    }
                },
                error: function() {
                    alert('Error adding item to cart. Please try again.');
                }
            });
        });

        // Handle form submission for adding to wishlist
        $('form[action="add_to_wishlist.php"]').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            const form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        alert('Item added to wishlist successfully!');
                        // Update wishlist display here
                    } else {
                        alert('Error adding item to wishlist: ' + response.error);
                    }
                },
                error: function() {
                    alert('Error adding item to wishlist. Please try again.');
                }
            });
        });
    });
</script>

<?php include('footer.php'); ?>
