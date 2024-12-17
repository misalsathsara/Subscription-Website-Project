<?php
include '../dbase.php'; // Database connection file

header('Content-Type: application/json');

try {
    $stmt = $conn->query("SELECT name, email, role FROM admin");
$admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($admins);

} catch (Exception $e) {
    echo json_encode([]);
}
?>
