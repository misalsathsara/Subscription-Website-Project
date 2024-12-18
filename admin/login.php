<?php
session_start();
$errorMessage = '';

// Include the database connection file
require_once '../dbase.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Use prepared statements with mysqli to prevent SQL injection
    $query = "SELECT * FROM admin WHERE name = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("s", $username); // Bind the username parameter
        $stmt->execute(); // Execute the query
        $result = $stmt->get_result(); // Get the result set

        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            // Verify the password using password_verify
            if (password_verify($password, $admin['password'])) {
                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['adminname'] = $admin['name'];
                // Redirect to the index page
                header('Location: index.php');
                exit;
            } else {
                $errorMessage = 'Invalid password!';
            }
        } else {
            $errorMessage = 'Invalid username!';
        }

        $stmt->close(); // Close the statement
    } else {
        $errorMessage = 'Query preparation failed: ' . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .login-container {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1.2s ease-in-out;
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            text-align: center;
            color: #333;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }

        .login-container div {
            margin-bottom: 1rem;
        }

        .login-container label {
            display: block;
            font-size: 1rem;
            color: #555;
            margin-bottom: 0.3rem;
        }

        .login-container input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s ease;
        }

        .login-container input:focus {
            border: 1px solid #66a6ff;
            outline: none;
            box-shadow: 0 0 5px rgba(102, 166, 255, 0.5);
        }

        .login-container button {
            width: 100%;
            padding: 0.8rem;
            font-size: 1rem;
            background: linear-gradient(90deg, #66a6ff, #89f7fe);
            border: none;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .login-container button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 166, 255, 0.4);
        }

        .login-container .error {
            color: red;
            font-size: 0.9rem;
            margin-bottom: 1rem;
            text-align: center;
            animation: shake 0.5s ease-in-out;
        }

        /* Keyframes for animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes shake {
            0%, 100% {
                transform: translateX(0);
            }
            20%, 60% {
                transform: translateX(-5px);
            }
            40%, 80% {
                transform: translateX(5px);
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <form action="login.php" method="POST">
            <h2>Login</h2>
            <?php if ($errorMessage): ?>
                <p class="error"><?= $errorMessage ?></p>
            <?php endif; ?>
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
