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

// Pagination settings
$reviews_per_page = 5; // Number of reviews to display per page
$total_reviews_sql = "SELECT COUNT(*) AS total FROM c_reviews WHERE n_id = ?";
$total_reviews_stmt = $conn->prepare($total_reviews_sql);
$total_reviews_stmt->bind_param("s", $n_id);
$total_reviews_stmt->execute();
$total_result = $total_reviews_stmt->get_result();
$total_row = $total_result->fetch_assoc();
$total_reviews = $total_row['total'];
$total_pages = ceil($total_reviews / $reviews_per_page);

// Get current page number from URL, default is 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$current_page = max(1, min($current_page, $total_pages)); // Ensure current page is within bounds
$offset = ($current_page - 1) * $reviews_per_page;

// Retrieve customer reviews for the item with pagination
$review_sql = "SELECT c_id, rating, review_description FROM c_reviews WHERE n_id = ? LIMIT ?, ?";
$review_stmt = $conn->prepare($review_sql);
if (!$review_stmt) {
    die("Error preparing review query: " . $conn->error);
}

$review_stmt->bind_param("sii", $n_id, $offset, $reviews_per_page);
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
    /* Custom styles for product detail page */
    .container {
        max-width: 1100px;
    }
    .product-page {
        padding: 30px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
    .product-header {
        border-bottom: 2px solid #e0e0e0;
        padding-bottom: 15px;
        margin-bottom: 20px;
        text-align: center;
    }
    .product-header h2 {
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 10px;
    }
    .product-header .item-price {
        font-size: 2rem;
        color: #d9534f;
        font-weight: bold;
    }
    .product-image {
        border: 1px solid #e0e0e0;
        padding: 15px;
        background-color: #fff;
        border-radius: 8px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .product-image:hover {
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transform: scale(1.05);
    }
    .button-container {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin-top: 25px;
    }
    .btn-custom {
        padding: 12px 25px;
        border-radius: 25px;
        font-size: 1.1rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }
    .btn-custom:hover {
        transform: translateY(-3px);
    }
    .reviews-section {
        margin-top: 50px;
    }
    .reviews-section h3 {
        margin-bottom: 20px;
        text-align: center;
    }
    .review-item {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }
    .review-item:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }
    .star-rating {
        color: #ffcc00;
        font-size: 1.2rem;
    }
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }
    .pagination a {
        margin: 0 5px;
        padding: 10px 15px;
        border: 1px solid #007bff;
        color: #007bff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .pagination a:hover {
        background-color: #007bff;
        color: white;
    }
    .pagination .active {
        background-color: #007bff;
        color: white;
        border: 1px solid #007bff;
    }
</style>

<div class="container my-5">
    <div class="product-page">
        <div class="product-header">
            <h2><?php echo htmlspecialchars($item['name']); ?></h2>
            <p class="item-price">LKR <?php echo htmlspecialchars($item['price']); ?></p>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="img-fluid product-image" alt="<?php echo htmlspecialchars($item['name']); ?>">
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <p class="card-text"><strong>Type:</strong> <br><?php echo htmlspecialchars($item['type']); ?></p>
                        <p class="card-text"><strong>Description:</strong> <br><?php echo nl2br(htmlspecialchars($item['description'])); ?></p>
                        <p class="card-text"><strong>Average Rating:</strong> <br>
    <span class="star-rating2">
        <?php 
        // Get the average rating and ensure it's a float
        $avgRating = round(floatval($item['avg_rating']), 1); 
        $totalReviews = intval($item['total_reviews']);
        
        // Display the average rating
        echo $avgRating . ' / 5 (' . $totalReviews . ' reviews)'; 
        ?>
    </span>
</p>

<div class="star-rating">
    <?php 
    // Loop to display stars based on average rating
    for ($i = 1; $i <= 5; $i++): 
        // Determine if star should be filled or not
        $isFilled = $i <= $avgRating; 
    ?>
        <span class="fas fa-star <?php echo $isFilled ? 'checked' : ''; ?>"></span>
    <?php endfor; ?>
</div>

<style>
    .star-rating {
        color: #ddd; /* Default color for unfilled stars */
    }
    .star-rating .checked {
        color: #ffcc00; /* Color for filled stars */
    }
</style>

                        <div class="button-container mt-3">
                            <!-- Add to Cart Button -->
                            <form action="add_to_cart.php" method="POST" style="display:inline;">
                                <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                                <button type="submit" class="btn btn-primary btn-custom"><i class="fas fa-shopping-cart"></i> Add to Cart</button>
                            </form>

                            <!-- Add to Wishlist Button -->
                            <form action="add_to_wishlist.php" method="POST" style="display:inline;">
                                <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                                <button type="submit" class="btn btn-secondary btn-custom"><i class="fas fa-heart"></i> Add to Wishlist</button>
                            </form>

                            <!-- Buy Now Button -->
                            <form action="buy_now.php" method="POST" style="display:inline;">
                                <input type="hidden" name="n_id" value="<?php echo htmlspecialchars($item['n_id']); ?>">
                                <button type="submit" class="btn btn-success btn-custom"><i class="fas fa-dollar-sign"></i> Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="reviews-section">
    <h3>Customer Reviews</h3>

    <?php if (empty($reviews)): ?>
        <p>No reviews available for this item.</p>
    <?php else: ?>
        <?php foreach ($reviews as $review): ?>
            <div class="review-item">
                <div class="star-rating">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="fas fa-star <?php echo ($i <= intval($review['rating'])) ? 'checked' : ''; ?>"></span>
                    <?php endfor; ?>
                </div>
                <p><?php echo nl2br(htmlspecialchars($review['review_description'])); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<style>
    .star-rating {
        color: #ddd; /* Default color for unfilled stars */
    }
    .star-rating .checked {
        color: #ffcc00; /* Color for filled stars */
    }
</style>


            <!-- Pagination -->
            <div class="pagination">
                <?php if ($current_page > 1): ?>
                    <a href="?n_id=<?php echo htmlspecialchars($n_id); ?>&page=<?php echo $current_page - 1; ?>">« Prev</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?n_id=<?php echo htmlspecialchars($n_id); ?>&page=<?php echo $i; ?>" class="<?php echo ($i == $current_page) ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>

                <?php if ($current_page < $total_pages): ?>
                    <a href="?n_id=<?php echo htmlspecialchars($n_id); ?>&page=<?php echo $current_page + 1; ?>">Next »</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Item added to cart successfully!',
                        });
                    } else if (response.error === 'exists') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Already Exists!',
                            text: 'Item already exists in your cart.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error adding item to cart: ' + response.error,
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred. Please try again later.',
                    });
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
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Item added to wishlist successfully!',
                        });
                    } else if (response.error === 'exists') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Already Exists!',
                            text: 'Item already exists in your wishlist.',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error adding item to wishlist: ' + response.error,
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred. Please try again later.',
                    });
                }
            });
        });

        // Handle form submission for buy now
        $('form[action="buy_now.php"]').submit(function(e) {
            e.preventDefault(); // Prevent default form submission

            const form = $(this);
            $.ajax({
                type: form.attr('method'),
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Purchase Successful!',
                            text: 'You have successfully purchased the item!',
                        }).then(() => {
                            window.location.href = 'your_purchase_page.php'; // Redirect to purchase confirmation page
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error processing purchase: ' + response.error,
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An unexpected error occurred. Please try again later.',
                    });
                }
            });
        });
    });
</script>
