<?php
include '../dbase.php'; // Include your database connection

// Ensure the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the JSON input
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['id']) && isset($data['seen'])) {
        $id = (int)$data['id']; // Cast ID to integer
        $seen = (int)$data['seen'] === 1 ? 0 : 1; // Toggle status

        // Prepare and execute the database update
        $sql = "UPDATE contact SET seen = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param('ii', $seen, $id);

            if ($stmt->execute()) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Failed to update record']);
            }

            $stmt->close();
        } else {
            echo json_encode(['success' => false, 'error' => 'Failed to prepare SQL statement']);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Invalid input data']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

$conn->close();
