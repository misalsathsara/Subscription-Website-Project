<?php
include '../dbase.php'; // Include database connection

// Fetching messages from the database
$sql = "SELECT * FROM contact ORDER BY id DESC"; // Adjust table name if needed
$result = $conn->query($sql);
?>


<!-- Search Box -->
<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for email, subject or message..." 
       style="width: 250px; padding: 8px 12px; border-radius: 5px; border: 1px solid #ccc; font-size: 14px; 
       outline: none; transition: border-color 0.3s ease;" 
       onfocus="this.style.borderColor='#007bff';" onblur="this.style.borderColor='#ccc';">

<!-- Table Structure -->
<table id="messagesTable" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
    <!-- Table Header -->
    <thead>
        <tr style="background-color: #f4f4f4; text-align: left;">
            <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Email</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Subject</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Message</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
        </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        $rowNumber = 1; // Initialize a row counter
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$rowNumber}</td>"; // Use row counter
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['email']}</td>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['subject']}</td>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['message']}</td>";

            // Delete button
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>
                    <button class='delete-btn' data-id='" . htmlspecialchars($row['id']) . "' style='
                        padding: 8px 12px;
                        font-size: 14px;
                        color: #fff;
                        background-color: #f44336;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        transition: background-color 0.3s ease;'
                        onmouseover=\"this.style.backgroundColor='#d32f2f';\"
                        onmouseout=\"this.style.backgroundColor='#f44336';\">
                        Delete
                    </button>
                  </td>";
            echo "</tr>";

            $rowNumber++; // Increment the row counter
        }
    } else {
        echo "<tr><td colspan='5' style='text-align: center; padding: 10px;'>No messages found</td></tr>";
    }
    $conn->close();
    ?>
</tbody>

</table>

<script>
// Search function
function searchTable() {
    var input, filter, table, tr, td, i, j, txtValue;
    input = document.getElementById('searchInput');
    filter = input.value.toUpperCase();
    table = document.getElementById("messagesTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows (skipping the first header row)
    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        let found = false;

        // Check if any of the cells (ID, email, subject, or message) match the search filter
        for (j = 1; j < td.length - 1; j++) { // Skip the last column (Actions)
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }

        // Show or hide the row based on the search result
        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
