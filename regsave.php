<?php
session_start();
include 'dbase.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log received POST data
    error_log(print_r($_POST, true));

    // Validate and retrieve the form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $country_code = isset($_POST['country_code']) ? $_POST['country_code'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $tel2 = $country_code . $tel;

    // Log the variables
    error_log("Name: $name, Username: $username, Email: $email, Phone: $tel2, Address: $address");

    // Check for empty fields
    if (empty($name) || empty($username) || empty($email) || empty($tel) || empty($address) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT c_id FROM customers WHERE c_uname = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already exists.']);
        exit();
    }

    // Generate customer ID
    $sql2 = "SELECT c_id FROM customers ORDER BY c_id DESC LIMIT 1";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        $row = $result->fetch_row();
        $last_c_id = (int)substr($row[0], 1); 
        $c_id = "C" . str_pad($last_c_id + 1, 3, '0', STR_PAD_LEFT); 
    } else {
        $c_id = "C001"; 
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare statement for inserting the new user
    $stmt = $conn->prepare("INSERT INTO customers (c_id, c_name, c_email, c_tel, c_address, c_uname, c_pwd) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $c_id, $name, $email, $tel2, $address, $username, $hashed_password);

    // Execute the statement and return success or failure
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registration successful!']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Registration failed: ' . $stmt->error]);
    }

    // Clean up
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
