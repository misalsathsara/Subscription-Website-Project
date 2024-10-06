<?php
include "dbase.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Start output buffering
    ob_start();

    $itemName = $_POST['itemName'];
    $itemDescription = $_POST['itemDescription'];
    $itemType = $_POST['itemType'];
    $itemPrice = $_POST['itemPrice'];

    // Handle the file upload
    $targetDir = "uploads/";
    $fileName = basename($_FILES["imageFile"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

    $allowedTypes = array("jpg", "png", "jpeg", "gif");

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["imageFile"]["tmp_name"], $targetFilePath)) {
            // Insert item data into the database
            $sql = "INSERT INTO items (name, description, type, price, image) VALUES ('$itemName', '$itemDescription', '$itemType', '$itemPrice', '$fileName')";

            if ($conn->query($sql) === TRUE) {
                // Redirect to myStore.php upon success
                header("Location: myStore.php");
                exit();
            } else {
                // Display database error message
                echo "Error adding item: " . $conn->error;
            }
        } else {
            // Display file upload error
            echo "Error uploading file.";
        }
    } else {
        // Display invalid file format error
        echo "Invalid file format. Only JPG, PNG, JPEG, and GIF files are allowed.";
    }

    // Flush output
    ob_end_flush();
}

// Close the connection
$conn->close();
?>
