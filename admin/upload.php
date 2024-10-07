<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "SubscriBuy";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload logic
if (isset($_FILES['itemImage']) && !empty($_POST['itemName'])) {
    $itemName = $_POST['itemName'];
    $itemType = $_POST['itemType'];
    $itemDescription = $_POST['itemDescription'];
    $itemPrice = $_POST['itemPrice'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["itemImage"]["name"]);
    move_uploaded_file($_FILES["itemImage"]["tmp_name"], $target_file);

    $sql = "INSERT INTO items (name, type, description, price, image) 
            VALUES ('$itemName', '$itemType', '$itemDescription', '$itemPrice', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
