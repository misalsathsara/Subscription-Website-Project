<?php
session_start();
include 'dbase.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Log received POST data
    error_log("Received POST data: " . print_r($_POST, true));

    // Validate and sanitize input data
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $country_code = isset($_POST['country_code']) ? trim($_POST['country_code']) : '';
    $tel = isset($_POST['tel']) ? trim($_POST['tel']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $tel2 = $country_code . $tel;

    // Log sanitized variables
    error_log("Name: $name, Username: $username, Email: $email, Phone: $tel2, Address: $address");

    // Check for empty fields
    if (empty($name) || empty($username) || empty($email) || empty($tel) || empty($address) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'All fields are required.']);
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format.']);
        exit();
    }

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT c_id FROM customers WHERE c_uname = ?");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Internal server error.']);
        exit();
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username already exists.']);
        $stmt->close();
        $conn->close();
        exit();
    }

    // Generate customer ID
    $sql2 = "SELECT c_id FROM customers ORDER BY c_id DESC LIMIT 1";
    $result = $conn->query($sql2);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_row();
        $last_c_id = (int)substr($row[0], 1);
        $c_id = "C" . str_pad($last_c_id + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $c_id = "C001";
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare statement for inserting the new user
    $stmt = $conn->prepare("INSERT INTO customers (c_id, c_name, c_email, c_tel, c_address, c_uname, c_pwd, active_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        echo json_encode(['success' => false, 'message' => 'Internal server error.']);
        exit();
    }
    $active_status = 0; // Default active_status value
    $stmt->bind_param("sssssssi", $c_id, $name, $email, $tel2, $address, $username, $hashed_password, $active_status);

    // Execute the statement and return success or failure
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registration successful!']);
    } else {
        error_log("Execute failed: " . $stmt->error);
        echo json_encode(['success' => false, 'message' => 'Registration failed: ' . $stmt->error]);
    }

    // Clean up
    $stmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
