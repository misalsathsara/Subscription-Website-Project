<?php
include('../dbase.php'); // Ensure this is the correct path

// Check database connection
if (!$conn) {
    die("Database connection failed.");
}

// Fetch all users from the database
$query = "SELECT c_uname, active_status FROM customers";
$result = $conn->query($query);

// Check if there are users
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['c_uname']) . "</td>
                <td>";

        if ($row['active_status'] == 1) {
            echo "<span class='badge active'>Active</span>";
        } else {
            echo "<span class='badge inactive'>Inactive</span>";
        }

        echo "</td></tr>";
    }
} else {
    echo "<tr><td colspan='2'>No users found.</td></tr>";
}
