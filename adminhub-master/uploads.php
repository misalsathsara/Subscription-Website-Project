<?php
// Database connection settings
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbname = "StoreAdmin";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
            $sql = "INSERT INTO items (name, description, type, price, image) VALUES ('$itemName', '$itemDescription', '$itemType', '$itemPrice', '$fileName')";

            if ($conn->query($sql) === TRUE) {
                // Output the success SweetAlert script on success
                echo "
                <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
            
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Item Added Successfully',
                        text: 'Your new item has been added!',
                        showConfirmButton: true,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        window.location.href = 'myStore.php'; // Redirect to the store after confirmation
                    });
                </script>";
            
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file format.";
    }
}

$conn->close();
?>
