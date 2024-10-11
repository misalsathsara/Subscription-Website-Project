<?php
session_start();
include 'dbase.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST['var1'];
    $uname = $data[0];
    $pwd = $data[1];

    $stmt = $conn->prepare("SELECT c_pwd, c_id FROM customers WHERE c_uname = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password, $c_id);
        $stmt->fetch();

        if (password_verify($pwd, $hashed_password)) {
            $_SESSION['username'] = $uname;
            $_SESSION['logged_in'] = true;
            $_SESSION['c_id'] = $c_id;

            // Perform the redirect
            header('Location: home.php');
            exit;  // Make sure to call exit after header
        } else {
            echo "Invalid username or password"; // Optional: Show this message
        }
    } else {
        echo "Invalid username or password"; // User not found
    }

    $stmt->close();
    $conn->close();
}
?>
