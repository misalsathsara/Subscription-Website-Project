<?php
session_start();
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('dbase.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $order_id = $_POST['order_id'];
        $n_id = $_POST['n_id'];
        $rating = $_POST['rating'];
        $review_description = $_POST['review_description'];

        // Get customer ID from username
        $queryCustomer = "SELECT c_id FROM customers WHERE c_uname = ?";
        $stmtCustomer = $conn->prepare($queryCustomer);
        $stmtCustomer->bind_param("s", $username);
        $stmtCustomer->execute();
        $resultCustomer = $stmtCustomer->get_result();

        if ($resultCustomer->num_rows === 1) {
            $c_id = $resultCustomer->fetch_assoc()['c_id'];

            // Insert review into the database
            $queryInsertReview = "
                INSERT INTO c_reviews (c_id, n_id, rating, review_description)
                VALUES (?, ?, ?, ?)";
            $stmtInsertReview = $conn->prepare($queryInsertReview);
            $stmtInsertReview->bind_param("ssis", $c_id, $n_id, $rating, $review_description);

            if ($stmtInsertReview->execute()) {
                // Return success response
                echo "success";
            } else {
                // Return error message if the insertion fails
                echo "Failed to insert review. Error: " . $stmtInsertReview->error;
            }
        } else {
            echo "Invalid customer.";
        }
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "Please log in to submit reviews.";
}
