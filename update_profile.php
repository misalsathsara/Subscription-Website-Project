<?php
session_start();
include 'dbase.php';

if (isset($_POST['c_name'], $_POST['c_email'], $_POST['c_tel'], $_POST['c_address']) && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_tel = $_POST['c_tel'];
    $c_address = $_POST['c_address'];

    // Update user details in the database
    $stmt = $conn->prepare("UPDATE customers SET c_name = ?, c_email = ?, c_tel = ?, c_address = ? WHERE c_uname = ?");
    $stmt->bind_param("sssss", $c_name, $c_email, $c_tel, $c_address, $username);

    if ($stmt->execute()) {
        header('Location: user-profile.php?update=success');
    } else {
        echo "Error updating profile.";
    }

    $stmt->close();
    $conn->close();
} else {
    header('Location: user-profile.php');
    exit();
}
?>
