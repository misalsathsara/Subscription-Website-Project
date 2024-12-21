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
            <th style="padding: 10px; border: 1px solid #ddd;">Status</th>
            <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
        </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
    <?php
    if ($result->num_rows > 0) {
        $rowNumber = 1; // Initialize a row counter
        while ($row = $result->fetch_assoc()) {
            $status = $row['seen'] ? "Seen" : "Unseen";

            echo "<tr>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$rowNumber}</td>"; // Use row counter
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['email']}</td>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['subject']}</td>";
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>{$row['message']}</td>";

// Status column with button
echo "<td style='padding: 10px; border: 1px solid #ddd; text-align: center;'>
        <button class='toggle-btn' data-id='{$row['id']}' data-seen='{$row['seen']}' style='
            padding: 8px 16px; /* Equal padding for both buttons */
            font-size: 14px;
            color: #fff;
            background-color: " . ($row['seen'] ? '#007bff' : '#4caf50') . "; /* Blue for Seen, Green for Unseen */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            min-width: 80px; /* Set a minimum width to ensure buttons are of equal size */
            height: 36px; /* Set a fixed height */
            display: inline-block; /* Ensure the button sizes are consistent */
            transition: background-color 0.3s ease;'>
            " . ($row['seen'] ? 'Seen' : 'Unseen') . "
        </button>
      </td>";




            // Delete button
            echo "<td style='padding: 10px; border: 1px solid #ddd;'>
                    <button class='delete-btn' data-id='{$row['id']}' style='
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
        echo "<tr><td colspan='6' style='text-align: center; padding: 10px;'>No messages found</td></tr>";
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

    for (i = 1; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        let found = false;

        for (j = 1; j < td.length - 1; j++) {
            if (td[j]) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    found = true;
                    break;
                }
            }
        }

        if (found) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}


// Toggle Seen/Unseen
const toggleButtons = document.querySelectorAll('.toggle-btn');
toggleButtons.forEach(button => {
    button.addEventListener('click', function() {
        const messageId = this.dataset.id;
        const seenStatus = this.dataset.seen;

        fetch('update_seen.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: messageId, seen: seenStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the button text and dataset
                const newSeenStatus = seenStatus == 1 ? 0 : 1;
                this.textContent = newSeenStatus == 1 ? 'Seen' : 'Unseen';
                this.dataset.seen = newSeenStatus;

                // Update the button color
                this.style.backgroundColor = newSeenStatus == 1 ? '#007bff' : '#4caf50'; // Blue for Seen, Green for Unseen
            } else {
                alert('Failed to update status.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred.');
        });
    });
});

</script>
