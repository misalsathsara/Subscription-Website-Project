<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    // If the user is logged in, include the logged-in header (header2.php)
    include('header2.php');
} else {
    // If the user is not logged in, include the default header (header.php)
    include('header.php');
}
?>

<?php
// Include the database connection
include 'dbase.php';

// Get the item ID from the URL
$n_id = $_GET['n_id'] ?? '';

// If no item ID is provided, redirect to the homepage
if (empty($n_id)) {
    header("Location: index.php");
    exit;
}

// Retrieve the item details from the database
$sql = "SELECT i.*, IFNULL(AVG(r.rating), 0) AS avg_rating, COUNT(r.c_id) AS total_reviews
        FROM items i
        LEFT JOIN c_reviews r ON i.n_id = r.n_id
        WHERE i.n_id = '$n_id'
        GROUP BY i.n_id";
$result = $conn->query($sql);

// Fetch the item details
if ($result->num_rows > 0) {
    $item = $result->fetch_assoc();
} else {
    echo "<p>Item not found</p>";
    exit;
}

// Retrieve customer reviews for the item
$review_sql = "SELECT c_id, rating, review_description FROM c_reviews WHERE n_id = '$n_id'";
$review_result = $conn->query($review_sql);

$reviews = [];
if ($review_result->num_rows > 0) {
    while ($review_row = $review_result->fetch_assoc()) {
        $reviews[] = $review_row;
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $item['name']; ?> - Details</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f9f9f9;
        }

        h2, h4 {
            color: #333;
            font-weight: 600;
        }

        .container1 {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 8px 30px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .img-fluid {
            width: 100%; 
            max-width: 600px; 
            height: auto; 
            border-radius: 10px;
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .img-fluid:hover {
            transform: scale(1.05);
        }

        .col-md-6 {
            margin-bottom: 20px;
        }

        .btn-primary, .btn-danger {
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: 600;
            transition: background-color 0.3s ease-in-out;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger:hover {
            background-color: #d9534f;
        }

        #reviews {
            overflow-y: auto;
            max-height: 200px;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background: #f8f9fa;
        }

        #reviews::-webkit-scrollbar {
            width: 8px;
        }

        #reviews::-webkit-scrollbar-thumb {
            background-color: #ddd;
            border-radius: 10px;
        }

        #reviews::-webkit-scrollbar-track {
            background-color: #f0f0f0;
            border-radius: 10px;
        }

        .star-rating {
            color: #FFD700;
        }

        .review-item {
            background: #f0f0f0;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .review-item p {
            margin: 0;
            color: #555;
        }

        .review-item strong {
            color: #333;
        }

        @media (max-width: 768px) {
            .container1 {
                margin-top: 20px;
            }
            .img-fluid {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container1">
        <div class="row">
            <div class="col-md-6">
                <img src="admin/<?php echo $item['image']; ?>" class="img-fluid" alt="<?php echo $item['name']; ?>">
            </div>
            <div class="col-md-6">
                <h2><?php echo $item['name']; ?></h2>
                <p><strong>Category:</strong> <?php echo $item['type']; ?></p>
                <p><strong>Price:</strong> $<?php echo $item['price']; ?></p>
                <p><strong>Description:</strong> <?php echo $item['description']; ?></p>
                <p><strong>Rating:</strong> <span class="star-rating"><?php echo round($item['avg_rating'], 1); ?></span> / 5 (<?php echo $item['total_reviews']; ?> reviews)</p>
                <button class="btn btn-primary" onclick="handleAddToCart('<?php echo $n_id; ?>')"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                <button class="btn btn-danger" onclick="handleAddToWishlist('<?php echo $n_id; ?>')"><i class="fas fa-heart"></i> Add to Wishlist</button>
            </div>
        </div>

        <div class="mt-5">
            <h4>Customer Reviews</h4>
            <div id="reviews">
                <?php
                if (!empty($reviews)) {
                    foreach ($reviews as $review) {
                        echo "<div class='review-item'>";
                        echo "<strong>{$review['c_id']}</strong> rated: <span class='star-rating'>" . str_repeat('★', $review['rating']) . "</span><br>";
                        echo "<p>{$review['review_description']}</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>No reviews yet</p>";
                }
                ?>
            </div>
        </div>
    </div>

          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function handleAddToCart(n_id) {
        <?php if (isset($_SESSION['username']) && !empty($_SESSION['username']) === true): ?>
            // AJAX call to add item to cart
            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
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
                Swal.fire('Error', 'Network error. Please try again.', 'error');
                console.error('Fetch error:', error);
            });
        <?php else: ?>
            Swal.fire('Please log in', 'You need to log in or register before adding items to your cart.', 'warning');
        <?php endif; ?>
    }

    function handleAddToWishlist(n_id) {
        <?php if (isset($_SESSION['username']) && !empty($_SESSION['username']) === true): ?>
            // AJAX call to add item to wishlist
            fetch('add_to_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
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
                Swal.fire('Error', 'Network error. Please try again.', 'error');
                console.error('Fetch error:', error);
            });
        <?php else: ?>
            Swal.fire('Please log in', 'You need to log in or register before adding items to your wishlist.', 'warning');
        <?php endif; ?>
    }
</script>

</body>
</html>
