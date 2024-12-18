<?php
$activePage = 'activeStatus';

// Include database connection
include('../dbase.php'); // Ensure this is the correct path
include('admin-header.php');

// Check database connection
if (!$conn) {
    die("Database connection failed.");
}
?>

<style>
    .badge {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 12px;
        font-size: 14px;
        color: #fff;
        text-align: center;
    }

    .badge.active {
        background-color: #28a745;
    }

    .badge.inactive {
        background-color: #dc3545;
    }
</style>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Active Users</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="index.php">Active Users</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-container">
        <table class="styled-table" id="usersTable">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will be filled by AJAX -->
            </tbody>
        </table>
    </div>
</main>

<?php
include 'admin-footer.php';
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function fetchUserStatus() {
        $.ajax({
            url: 'fetch_active_users.php', // Separate PHP file to fetch user data
            type: 'GET',
            success: function(response) {
                $('#usersTable tbody').html(response);
            }
        });
    }

    // Call the function on page load
    $(document).ready(function() {
        fetchUserStatus();
        
        // Set an interval to update the table every 5 seconds
        setInterval(fetchUserStatus, 5000);
    });
</script>
