<?php
// Database connection
$host = 'localhost:3308';
$db = 'SubscriBuy';
$user = 'root';  // replace with your database user
$pass = '';      // replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get filter values from the query parameters
$category = $_GET['category'] ?? '';
$minPrice = $_GET['minPrice'] ?? '';
$maxPrice = $_GET['maxPrice'] ?? '';

// Base SQL query
$sql = "SELECT i.*, 
               IFNULL(AVG(r.rating), 0) AS avg_rating, 
               COUNT(r.c_id) AS total_reviews 
        FROM items i 
        LEFT JOIN c_reviews r ON i.n_id = r.n_id
        WHERE 1";

// Apply category filter if it's set
if (!empty($category)) {
    $sql .= " AND i.type = '$category'";
}

// Apply price range filter if both min and max prices are set
if (!empty($minPrice) && !empty($maxPrice)) {
    $sql .= " AND i.price BETWEEN $minPrice AND $maxPrice";
} elseif (!empty($minPrice)) {
    $sql .= " AND i.price >= $minPrice";
} elseif (!empty($maxPrice)) {
    $sql .= " AND i.price <= $maxPrice";
}

// Group the results by item
$sql .= " GROUP BY i.n_id";

$result = $conn->query($sql);

$items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Fetch reviews for each item
        $review_sql = "SELECT c_id, rating, review_description 
                       FROM c_reviews 
                       WHERE n_id = '".$row['n_id']."'";
        $review_result = $conn->query($review_sql);

        $reviews = [];
        if ($review_result->num_rows > 0) {
            while ($review_row = $review_result->fetch_assoc()) {
                $reviews[] = $review_row;
            }
        }

        // Add reviews to the item
        $row['reviews'] = $reviews;
        $items[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the items data as JSON
header('Content-Type: application/json');
echo json_encode($items);
?>
