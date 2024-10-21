<?php
session_start();
include 'dbase.php'; // Assuming this file contains the DB connection logic

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect username and password from POST request
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare SQL query to fetch the user details
    $stmt = $conn->prepare("SELECT c_uname, c_pwd FROM customers WHERE c_uname = ?");
    $stmt->bind_param("s", $username);  // Bind the username parameter to the query
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Fetch the result and verify the password
        $stmt->bind_result($db_username, $db_password);
        $stmt->fetch();

        // Verify the hashed password
        if (password_verify($password, $db_password)) {
            // Success: Login successful, store the username in session
            $_SESSION['username'] = $db_username;
            header('Location: index.php'); // Redirect to dashboard or home page
            exit();
        } else {
            // Failure: Invalid password
            alert('Invalid password or username');
            // header('Location: login.php?error=invalid_credentials');
            exit();
        }
    } else {
        // Failure: Username not found
        alert('Not user found');
        // header('Location: login.php?error=user_not_found');
        exit();
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, deny access
    header('Location: login.php');
    exit();
}
?>
