<?php
$activePage = 'dashboard';
include('admin-header.php');
?>

<?php
// Include the database connection
include '../dbase.php';

// Query to count pending orders
$query = "SELECT COUNT(*) AS pending_count FROM orders WHERE order_status = 'pending'";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Fetch the count
$pending_count = 0;
if ($row = $result->fetch_assoc()) {
    $pending_count = $row['pending_count'];
}

// Query to count pending orders
$query = "SELECT COUNT(*) AS processing_count FROM orders WHERE order_status = 'processing'";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Fetch the count
$processing_count = 0;
if ($row = $result->fetch_assoc()) {
    $processing_count = $row['processing_count'];
}

// Query to count pending orders
$query = "SELECT COUNT(*) AS shipped_count FROM orders WHERE order_status = 'shipped'";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Fetch the count
$shipped_count = 0;
if ($row = $result->fetch_assoc()) {
    $shipped_count = $row['shipped_count'];
}

// Query to count pending orders
$query = "SELECT COUNT(*) AS delivered_count FROM orders WHERE order_status = 'delivered'";
$result = $conn->query($query);

// Check for query errors
if (!$result) {
    die("Query Failed: " . $conn->error);
}

// Fetch the count
$delivered_count = 0;
if ($row = $result->fetch_assoc()) {
    $delivered_count = $row['delivered_count'];
}

// Debugging: Output the query result
// echo "Pending Count: " . $pending_count; // Uncomment this for debugging

$query = "SELECT COUNT(c_id) AS customer_count FROM customers";
$result = $conn->query($query);

// Fetch the count
$customer_count = 0;
if ($result && $row = $result->fetch_assoc()) {
    $customer_count = $row['customer_count'];
}

// Get the current month and year
$current_month = date('m'); // Current month (e.g., 08)
$current_year = date('Y');  // Current year (e.g., 2024)

// Query to calculate total sales for the current month where payment_status = 'paid'
$query = "
    SELECT SUM(total_price) AS total_sales 
    FROM orders 
    WHERE payment_status = 'paid' 
    AND MONTH(order_date) = $current_month 
    AND YEAR(order_date) = $current_year
";

$result = $conn->query($query);

// Fetch the total sales
$total_sales = 0;
if ($result && $row = $result->fetch_assoc()) {
    $total_sales = $row['total_sales'] ? $row['total_sales'] : 0; // Handle NULL values
}

$query = "SELECT id, fullname, address, duration, renieve, payment_status, order_date FROM orders";
$result = $conn->query($query);

?>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <!-- Google Fonts for Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Custom CSS for Professional Styling -->
    <style>
        h3 {
            text-align: left;
            font-size: 1.5rem;
            color: #333;
            margin: 10px 0;
        }

        .table-container {
            width: 100%;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 12px;
            /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); */
            padding: 20px;
        }

        table {
            width: 100%;
            /* border-collapse: collapse; */
        }

        th {
            background-color: #f1f8f6; /* Green background */
            color: black;
            font-weight: 600;
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Light background for even rows */
        }

        tr:hover {
            background-color: #f1f8f6; /* Hover effect */
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }

        .status {
            font-weight: bold;
            text-transform: capitalize;
        }

        .status.pending {
            color: #ff9800;
        }

        .status.paid {
            color: #4caf50;
        }

        .status.failed {
            color: #f44336;
        }

        .total-price {
            font-weight: bold;
            color: #007BFF;
        }

        .icon {
            margin-right: 8px;
        }

        /* DataTables Search Box and Pagination */
        .dataTables_filter input {
            width: 300px;
            padding: 8px;
            margin-right: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .dataTables_length select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .dataTables_paginate {
            padding: 10px 0;
            text-align: right;
        }

        .dataTables_paginate .paginate_button {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin: 0 5px;
            padding: 6px 12px;
        }

        .dataTables_paginate .paginate_button:hover {
            background-color: #45a049;
            transition: 0.3s ease-in-out;
        }

        /* Responsive Table */
        @media screen and (max-width: 768px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }

        .mouse {
    cursor: pointer; /* Changes the cursor to a hand when hovering */
}

.mouse a {
    text-decoration: none; /* Remove default underline from the link */
    color: inherit; /* Keep the text color the same as the rest of the list item */
}

.mouse a:hover {
    color: #007BFF; /* Change color on hover to indicate it's clickable */
    transition: color 0.3s ease; /* Smooth color transition */
}

.todocompleted {
    border-left: 20px solid #7DF9FF; /* Adds a 10px border with blue color */
    border-radius: 5px; /* Optional: gives the border rounded corners */
    padding: 10px; /* Optional: adds padding inside the list item */
}

.todopending {
    border-left: 20px solid #FF7F7F; /* Adds a 10px border with blue color */
    border-radius: 5px; /* Optional: gives the border rounded corners */
    padding: 10px; /* Optional: adds padding inside the list item */
}

.todoprocess {
    border-left: 20px solid #90EE90; /* Adds a 10px border with blue color */
    border-radius: 5px; /* Optional: gives the border rounded corners */
    padding: 10px; /* Optional: adds padding inside the list item */
}

.todoshipent {
    border-left: 20px solid #FFFF00; /* Adds a 10px border with blue color */
    border-radius: 5px; /* Optional: gives the border rounded corners */
    padding: 10px; /* Optional: adds padding inside the list item */
}

    </style>

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>Dashboard</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="#">Dashboard</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="#">Home</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn-download">
                <i class='bx bxs-cloud-download'></i>
                <span class="text">Download PDF</span>
            </a>
        </div>

        <ul class="box-info">
        <li>
            <i class='bx bxs-calendar-check'></i>
            <span class="text">
                <h3><?php echo $pending_count; ?></h3>
                <p>New Order</p>
            </span>
        </li>

        <li>
            <i class='bx bxs-group'></i>
            <span class="text">
                <h3><?php echo $customer_count; ?></h3>
                <p>Users</p>
            </span>
        </li>
        <li>
            <i class='bx bxs-dollar-circle'></i>
            <span class="text">
                <h3>LKR <?php echo number_format($total_sales, 2); ?></h3>
                <p>Total Sales</p>
            </span>
        </li>
        </ul>

        <div class="table-data">
<div class="table-container">
    <table id="ordersTable" class="display">
    <h3><i class="fa-solid fa-clipboard-list"></i> Orders Table</h3>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Full Name</th>
                <!-- <th>Email</th> -->
                <th>Address</th>
                <th>Duration</th>
                <th>Renieve</th>
                <!-- <th>Total Price</th> -->
                <th>Payment Status</th>
                <!-- <th>Transaction ID</th> -->
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id']); ?></td>
                    <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                    <!-- <td><i class="fa-solid fa-envelope icon"></i><?php echo htmlspecialchars($row['email']); ?></td> -->
                    <td><?php echo htmlspecialchars($row['address']); ?></td>
                    <td><?php echo htmlspecialchars($row['duration'] ?? 'N/A'); ?></td>
                    <td><?php echo htmlspecialchars($row['renieve'] ?? 'N/A'); ?></td>
                    <!-- <td class="total-price">$<?php echo number_format($row['total_price'], 2); ?></td> -->
                    <td class="status <?php echo strtolower($row['payment_status']); ?>">
                        <?php echo htmlspecialchars($row['payment_status']); ?>
                    </td>
                    <!-- <td><?php echo htmlspecialchars($row['transaction_id'] ?? 'N/A'); ?></td> -->
                    <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
            <div class="todo">
                <div class="head">
                    <h3>Todos</h3>
                </div>
                <ul class="todo-list" id="todoList">
                    <li class="todopending mouse" onclick="window.location.href='pending.php';">
                    <p>Pending Process &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <span style="background-color: #FF7F7F; padding: 5px 10px 5px 10px; border-radius: 5px"> count  <?php echo $pending_count; ?></span></p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>

                    <li class="todoprocess mouse" onclick="window.location.href='process.php';">
                        <p>Processing Items &nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <span style="background-color: #90EE90; padding: 5px 10px 5px 10px; border-radius: 5px"> count  <?php echo $processing_count; ?></span></p></p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>

                    <li class="todoshipent mouse" onclick="window.location.href='shipment.php';">
                        <p>Shipped Items 
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <span style="background-color: #FFFF00; padding: 5px 10px 5px 10px; border-radius: 5px"> count  <?php echo $shipped_count; ?></span></p></p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>

                    <li class="todocompleted mouse" onclick="window.location.href='delivered.php';">
                        <p>Delivered &nbsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;    
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <span style="background-color: #7DF9FF; padding: 5px 10px 5px 10px; border-radius: 5px"> count  <?php echo $delivered_count; ?></span></p></p>
                        <i class='bx bx-dots-vertical-rounded'></i>
                    </li>

                </ul>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
<!-- jQuery (Required for DataTables) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTables -->
<script>
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            responsive: true,
            "paging": true,
            "ordering": true,
            "info": true,
            "searching": true,
            "language": {
                "search": "Search Orders:",
                "lengthMenu": "Show _MENU_ entries"
            }
        });
    });
</script>
</body>
</html>