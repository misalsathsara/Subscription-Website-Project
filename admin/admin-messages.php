<?php

$activePage = 'message';
include('admin-header.php'); // Reuse admin header
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>User Messages</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="admin-messages.php">Messages</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <table>
                 <?php include 'fetch_messages.php'; ?> <!-- Fetch messages dynamically -->
            </table>
        </div>
    </div>
</main>
<?php
include 'admin-footer.php';
?>

<script>
// Delete button functionality
document.addEventListener('click', function (e) {
    if (e.target && e.target.classList.contains('delete-btn')) {
        const messageId = e.target.getAttribute('data-id');

        // Confirmation before delete
        if (confirm('Are you sure you want to delete this message?')) {
            fetch(`delete_message.php?id=${messageId}`)
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        alert('Message deleted successfully.');
                        location.reload(); // Reload the page to reflect changes
                    } else {
                        alert('Failed to delete the message.');
                    }
                });
        }
    }
});
</script>

