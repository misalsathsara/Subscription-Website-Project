<?php
include '../dbase.php'; // Include the mysqli database connection

header('Content-Type: application/json');

try {
    // Execute the query
    $stmt = $conn->query("SELECT name, email, role FROM admin");

    if (!$stmt) {
        throw new Exception("Query error: " . $conn->error);
    }

    // Fetch results into an array
    $admins = [];
    while ($row = $stmt->fetch_assoc()) {
        $admins[] = $row;
    }

    // Return the results in JSON format
    echo json_encode($admins);

} catch (Exception $e) {
    // Handle query errors
    echo json_encode(['error' => $e->getMessage()]);
}
?>
