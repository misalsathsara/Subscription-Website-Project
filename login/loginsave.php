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

            // Send a JSON response instead of redirecting
            echo json_encode(['status' => 'success', 'message' => 'Login successful!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid username or password']);
    }

    $stmt->close();
    $conn->close();
}

?>
