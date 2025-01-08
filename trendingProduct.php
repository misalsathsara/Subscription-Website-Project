<?php
// Database connection
include 'dbase.php'; // Make sure this contains your database connection

// Step 1: Get the top 4 trending product IDs from order_items
$trendingQuery = "
    SELECT n_id, COUNT(n_id) as total_count 
    FROM order_items 
    GROUP BY n_id 
    ORDER BY total_count DESC 
    LIMIT 4
";
$trendingResult = mysqli_query($conn, $trendingQuery);

// Step 2: Create an array to store trending product IDs
$trendingProductIds = [];
while ($row = mysqli_fetch_assoc($trendingResult)) {
    $trendingProductIds[] = $row['n_id'];
}

// Step 3: Fetch product details for the top 4 trending products
if (!empty($trendingProductIds)) {
    $productIdsString = implode(',', $trendingProductIds);
    $productQuery = "SELECT n_id, name, image, price FROM items WHERE n_id IN ($productIdsString)";
    $productResult = mysqli_query($conn, $productQuery);
} else {
    $productResult = [];
}

?>

<!-- Trending Products Section Start -->
<div class="container mt-5">
    <h2 class="text-center display-4 fw-bold text-primary section-heading" style="font-weight: 900;">Trending Products</h2>
    <br>
    <div class="row">
        <?php
        // Step 4: Loop through the results and display product cards
        if ($productResult && mysqli_num_rows($productResult) > 0):
            while ($item = mysqli_fetch_assoc($productResult)):
        ?>
                <!-- Product Card -->
                <div class="col-lg-3 col-md-4 col-sm-6 mb-5 d-flex justify-content-center">
                    <div class="card fancy-card border-0 rounded overflow-hidden shadow-sm text-center" style="transition: transform 0.5s ease, box-shadow 0.5s ease;">
                        <div class="card-img-wrapper position-relative">
                            <img src="admin/<?php echo $item['image']; ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="card-img-top fancy-card-img" style="object-fit: cover; height: 250px;">
                            <div class="card-img-overlay d-flex justify-content-center align-items-center overlay-effect" style="opacity: 0; transition: opacity 0.4s ease;">
                                <i class="fas fa-search fa-2x text-white"></i>
                            </div>
                        </div>
                        <div class="card-body px-4 py-3">
                            <h5 class="card-title mb-2 text-truncate fancy-title"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <div class="star-rating mb-3">
                                <?php
                                $rating = round($item['avg_rating']);
                                echo str_repeat('★', $rating) . str_repeat('☆', 5 - $rating);
                                ?>
                            </div>
                            <p class="card-text text-gradient fw-bold">Price: LKR <?php echo number_format($item['price'], 2); ?></p>
                            <div class="d-flex justify-content-around mt-3">
                                <button class="btn btn-outline-primary btn-sm fancy-btn" onclick="window.location.href='itemDetail.php?n_id=<?php echo $item['n_id']; ?>'">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <button class="btn btn-outline-success btn-sm fancy-btn" onclick="handleAddToCart('<?php echo $item['n_id']; ?>')">
                                    <i class="fas fa-cart-plus"></i>
                                </button>
                                <button class="btn btn-outline-danger btn-sm fancy-btn" onclick="handleAddToWishlist('<?php echo $item['n_id']; ?>')">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            endwhile;
        else:
            ?>
            <p class="text-center fw-bold">No trending products available right now.</p>
        <?php endif; ?>
    </div>
</div>


<style>
    /* Modern Fancy Card Styles */
    .fancy-card {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        border-radius: 15px;
        overflow: hidden;
        background: #ffffff;
    }

    .fancy-card-img {
        height: 250px;
        width: 350px;
        transition: transform 0.5s ease-in-out;
        filter: brightness(95%);
    }

    .card-img-wrapper:hover .fancy-card-img {
        transform: scale(1.08);
        filter: brightness(100%);
    }

    .overlay-effect {
        background-color: rgba(0, 0, 0, 0.4);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease;
    }

    .fancy-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .star-rating {
        color: gold;
        font-size: 1.2rem;
    }

    .fancy-btn {
        width: 10%;
        border-radius: 25px;
    }

    .fancy-select,
    .fancy-input {
        border-radius: 25px;
    }

    .filter-container {
        background-color: #f8f9fa;
        border-radius: 15px;
    }
</style>

<script>
    function handleAddToCart(n_id) {
        <?php if (!isset($_SESSION['username'])) { ?>
            showAlert('You need to log in to add items to your cart!');
        <?php } else { ?>
            $.ajax({
                url: 'add_to_cart.php',
                type: 'POST',
                data: {
                    n_id: n_id
                },
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert('Added to cart');
                    } else {
                        showAlert(response.error);
                    }
                },
                error: function() {
                    showAlert('An unexpected error occurred. Please try again later.');
                }
            });
        <?php } ?>
    }

    function handleAddToWishlist(n_id) {
        <?php if (!isset($_SESSION['username'])) { ?>
            showAlert('You need to log in to add items to your wishlist!');
        <?php } else { ?>
            $.ajax({
                url: 'add_to_wishlist.php',
                type: 'POST',
                data: {
                    n_id: n_id
                },
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert('Added to wishlist');
                    } else {
                        showAlert(response.error);
                    }
                },
                error: function() {
                    showAlert('An unexpected error occurred. Please try again later.');
                }
            });
        <?php } ?>
    }

    function showAlert(message) {
        swal({
            title: "Warning",
            text: message,
            icon: "warning",
            button: "OK",
        });
    }

    function showSuccessAlert(message) {
        swal({
            title: "Success",
            text: message,
            icon: "success",
            button: "OK",
        });
    }
</script>