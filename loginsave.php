<?php
session_start();

// Include your database connection file
include 'dbase.php'; // Ensure you have a file named db.php for your database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate input fields
    if (empty($username) || empty($password)) {
        echo json_encode(['success' => false, 'message' => 'Both fields are required.']);
    } else {
        // Prepare SQL statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT c_pwd FROM customers WHERE c_uname = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the user exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['c_pwd'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Successful login, set session variable and success message
                $_SESSION['username'] = $username; // Store the username in session
                $_SESSION['success_message'] = "Login successful!"; // Set success message

                // Update the active_status in the database
                $update_stmt = $conn->prepare("UPDATE customers SET active_status = 1 WHERE c_uname = ?");
                $update_stmt->bind_param("s", $username);
                $update_stmt->execute();

                echo json_encode(['success' => true]);
            } else {
                // Invalid credentials
                echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
            }
        } else {
            // User not found
            echo json_encode(['success' => false, 'message' => 'Invalid username or password.']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
