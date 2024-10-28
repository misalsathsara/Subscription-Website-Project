<?php
include '../dbase.php';

// Fetch items from the database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start building the HTML table rows
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='" . htmlspecialchars($row['image']) . "' alt='Item Image' style='width: 50px; height: 50px;'></td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['type']) . "</td>";
        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
        echo "<td>" . htmlspecialchars($row['price']) . "</td>";
        
        echo "<td>
                <button class='update-btn' data-id='" . htmlspecialchars($row['n_id']) . "'>Update</button>
                <button class='delete-btn' data-id='" . htmlspecialchars($row['n_id']) . "'>Delete</button>
              </td>";
        echo "</tr>";
    }

} else {
    echo "<tr><td colspan='6'>No items found.</td></tr>";
}

$conn->close();
?>
