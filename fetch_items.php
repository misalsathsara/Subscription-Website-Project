<?php
// fetch_items.php
$host = 'localhost:3308';
$db = 'SubscriBuy';
$user = 'root';  // replace with your database user
$pass = '';      // replace with your database password

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch items with their average rating
$sql = "SELECT i.*, 
               IFNULL(AVG(r.rating), 0) AS avg_rating, 
               COUNT(r.c_id) AS total_reviews 
        FROM items i 
        LEFT JOIN c_reviews r ON i.n_id = r.n_id
        GROUP BY i.n_id";

$result = $conn->query($sql);

$items = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Fetch reviews for each item
        $review_sql = "SELECT c_id, rating, review_description FROM c_reviews WHERE n_id = '".$row['n_id']."'";
        $review_result = $conn->query($review_sql);

        $reviews = [];
        if ($review_result->num_rows > 0) {
            while ($review_row = $review_result->fetch_assoc()) {
                $reviews[] = $review_row;
            }
        }

        $row['reviews'] = $reviews;
        $items[] = $row;
    }
}

$conn->close();

echo json_encode($items);
?>
