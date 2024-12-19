<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Include Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 90%;
            margin-top: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #007bff;
            font-size: 2.5em;
            font-weight: 600;
        }

        .btn-dashboard {
            background-color: #007bff;
            color: white;
            padding: 12px 25px;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s, transform 0.3s;
            margin-bottom: 20px;
        }

        .btn-dashboard:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
            text-decoration: none;
        }

        .table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        .table th {
            background-color: #007bff;
            color: white;
            font-size: 16px;
        }

        .table td {
            background-color: #fff;
            color: #333;
            font-size: 14px;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }

        .table img {
            display: block;
            margin: auto;
            border-radius: 4px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            border-bottom: 1px solid #ddd;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
        }

        .action-btn {
            background-color: #28a745;
            color: white;
            font-size: 14px;
            padding: 8px 14px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
        }

        .action-btn:hover {
            background-color: #218838;
            cursor: pointer;
            transform: scale(1.05);
        }

        .action-btn:focus {
            outline: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="index.php" class="btn-dashboard"><i class="fas fa-tachometer-alt"></i> Go to Dashboard</a>
        <h2>Pending Orders</h2>
        <table id="pendingOrders" class="display table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include the database connection file
                include '../dbase.php';

                // Query to get the IDs where order_status is 'process'
                $query = "SELECT id FROM orders WHERE order_status = 'recived'";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                }

                // Loop through the results and add rows to the table
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td><button class='action-btn btn' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#nIdModal'><i class='fas fa-cogs'></i> Action</button></td>";
                    echo "</tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

   <!-- Modal -->
<div class="modal fade" id="nIdModal" tabindex="-1" role="dialog" aria-labelledby="nIdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nIdModalLabel">Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="nIdContent">Loading...</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="submitBtn" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function () {
    $('#pendingOrders').DataTable({
        serverSide: false, // Disable server-side processing
        processing: true,  // Show a processing indicator
        autoWidth: false,  // Disable automatic column width adjustment
        pageLength: 10,    // Number of rows per page
        responsive: true   // Enable responsive behavior for small screens
    });

        let currentOrderId;

        // Load details into the modal and store the current order ID
        $('.action-btn').on('click', function () {
            currentOrderId = $(this).data('id'); // Get the ID of the current order
            $.ajax({
                url: 'fetch_n_ids.php',
                method: 'POST',
                data: { order_id: currentOrderId },
                success: function (response) {
                    $('#nIdContent').html(response); // Load the response into the modal
                },
                error: function () {
                    $('#nIdContent').html('Failed to load data.');
                }
            });
        });

        // Handle the Submit button click
        // Handle the Submit button click
        $('#submitBtn').on('click', function () {
            if (!currentOrderId) {
                alert('No order selected.');
                return;
            }

            $.ajax({
                url: 'update_order_process.php',
                method: 'POST',
                data: { order_id: currentOrderId, status: 'processed' },
                success: function (response) {
                    if (response.trim() === 'success') {
                        alert('Order updated successfully!');
                        $('#nIdModal').modal('hide');
                        // Refresh the page after the user clicks OK on the alert
                        location.reload();
                    } else {
                        alert('Failed to update the order.');
                    }
                },
                error: function () {
                    alert('An error occurred while updating the order.');
                }
            });
        });

    });
</script>

</body>
</html>