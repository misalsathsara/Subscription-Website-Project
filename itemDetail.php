<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    include('header2.php');
} else {
    include('header.php');
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
        WHERE i.n_id = ?";
$stmt = $conn->prepare($sql);
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

<title><?php echo htmlspecialchars($item['name']); ?> - Details</title>

<div class="container1">
    <div class="row">
        <div class="col-md-6">
            <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($item['name']); ?>">
        </div>
        <div class="col-md-6">
            <h2><?php echo htmlspecialchars($item['name']); ?></h2>
            <p><strong>Category:</strong> <?php echo htmlspecialchars($item['type']); ?></p>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars($item['price']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($item['description']); ?></p>
            <p><strong>Rating:</strong> <span class="star-rating"><?php echo round($item['avg_rating'], 1); ?></span> / 5 (<?php echo $item['total_reviews']; ?> reviews)</p>
            <button class="btn btn-primary" onclick="handleAddToCart('<?php echo $n_id; ?>')"><i class="fas fa-cart-plus"></i> Add to Cart</button>
            <button class="btn btn-danger" onclick="handleAddToWishlist('<?php echo $n_id; ?>')"><i class="fas fa-heart"></i> Add to Wishlist</button>
        </div>
    </div>

    <div class="mt-5">
        <h4>Customer Reviews</h4>
        <div id="reviews">
            <?php if (!empty($reviews)) {
                foreach ($reviews as $review) {
                    echo "<div class='review-item'>";
                    echo "<strong>".htmlspecialchars($review['c_id'])."</strong> rated: <span class='star-rating'>" . str_repeat('★', $review['rating']) . "</span><br>";
                    echo "<p>".htmlspecialchars($review['review_description'])."</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews yet</p>";
            } ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
function handleAddToCart(n_id) {
    fetch('add_to_cart.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `n_id=${encodeURIComponent(n_id)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success', 'Item added to cart!', 'success');
        } else if (data.error === 'exists') {
            Swal.fire('Oops', 'Item already exists in your cart!', 'warning');
        } else {
            Swal.fire('Error', data.error || 'Something went wrong. Please try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        Swal.fire('Error', 'Network error. Please try again.', 'error');
    });
}

function handleAddToWishlist(n_id) {
    fetch('add_to_wishlist.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `n_id=${encodeURIComponent(n_id)}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire('Success', 'Item added to wishlist!', 'success');
        } else if (data.error === 'exists') {
            Swal.fire('Oops', 'Item already exists in your wishlist!', 'warning');
        } else {
            Swal.fire('Error', data.error || 'Something went wrong. Please try again.', 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        Swal.fire('Error', 'Network error. Please try again.', 'error');
    });
}
</script>

<?php include 'footer.php'; ?>
