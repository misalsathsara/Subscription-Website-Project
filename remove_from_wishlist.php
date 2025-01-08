<?php
session_start();
include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    if (isset($_POST['wishlist_id'])) {
        $wishlist_id = $_POST['wishlist_id'];

        // Remove item from the wishlist
        $removeQuery = "DELETE FROM wishlist WHERE id = ?";
        $stmt = $conn->prepare($removeQuery);
        $stmt->bind_param("i", $wishlist_id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Item removed from wishlist.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to remove item from wishlist.']);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid request.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'User not logged in.']);
}

$conn->close();
