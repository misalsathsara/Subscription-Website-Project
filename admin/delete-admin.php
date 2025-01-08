<?php
include '../dbase.php';

// Set content type to JSON
header('Content-Type: application/json');

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');

// Read and decode incoming JSON data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $adminId = (int)$data['id']; // Ensure the ID is an integer

    // Debug log
    file_put_contents('delete-debug.log', "Deleting Admin ID: $adminId\n", FILE_APPEND);

    // Verify the admin exists
    $checkStmt = $conn->prepare("SELECT id FROM admin WHERE id = ?");
    $checkStmt->bind_param("i", $adminId);
    $checkStmt->execute();
    $result = $checkStmt->get_result();

    if ($result->num_rows > 0) {
        // Proceed with deletion
        $deleteStmt = $conn->prepare("DELETE FROM admin WHERE id = ?");
        $deleteStmt->bind_param("i", $adminId);

        if ($deleteStmt->execute()) {
            echo json_encode(["success" => true, "message" => "Admin deleted successfully."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error: " . $deleteStmt->error]);
        }
        $deleteStmt->close();
    } else {
        echo json_encode(["success" => false, "message" => "No admin found with the provided ID."]);
    }
    $checkStmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid request. No ID provided."]);
}

$conn->close();
