<?php
include '../dbase.php';

// Set content type to JSON
header('Content-Type: application/json');

// Fetch all admins
$result = $conn->query("SELECT id, name, email, role FROM admin");

if ($result && $result->num_rows > 0) {
    $admins = [];
    while ($row = $result->fetch_assoc()) {
        $admins[] = $row;
    }
    echo json_encode($admins);
} else {
    echo json_encode([]);
}

$conn->close();
