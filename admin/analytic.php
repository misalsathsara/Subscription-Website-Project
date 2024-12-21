<?php include('admin-header.php');
include '../dbase.php'; ?>
<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Best Bootstrap Admin Dashboards">
		<meta name="author" content="Bootstrap Gallery" />
		<link rel="canonical" href="https://www.bootstrap.gallery/">
		<meta property="og:url" content="https://www.bootstrap.gallery">
		<meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
		<meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
		<meta property="og:type" content="Website">
		<meta property="og:site_name" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="assets/images/favicon.svg">

		<!-- Title -->
		<title>Bootstrap Admin Dashboards</title>


		<!-- *************
			************ Common Css Files *************
		************ -->

		<!-- Animated css -->
		<link rel="stylesheet" href="assets/css/animate.css">

		<!-- Bootstrap font icons css -->
		<link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css">

		<!-- Main css -->
		<link rel="stylesheet" href="assets/css/main.min.css">


		<!-- *************
			************ Vendor Css Files *************
		************ -->

		<!-- Scrollbar CSS -->
		<link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

	</head>

	<body>

			
			<div >

				
			

			

						<!-- Row start -->
<div class="row">
    <?php
    

    // Array to hold the SQL queries and their respective style classes and icons
    $queries = [
        'sales' => ["SELECT COUNT(id) AS total FROM orders", 'red', 'bi-pie-chart', 'Sales'],
        'customers' => ["SELECT COUNT(c_id) AS total FROM customers", 'blue', 'bi-emoji-smile', 'Customers'],
        'items' => ["SELECT COUNT(n_id) AS total FROM items", 'yellow', 'bi-box-seam', 'Products'],
        'revenue' => ["SELECT SUM(payment_amount) AS total FROM payments", 'green', 'bi-handbag', 'Revenue']
    ];

    foreach ($queries as $key => $data) {
        $result = $conn->query($data[0]);
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="col-xxl-3 col-sm-6 col-12">
                <div class="stats-tile">
                    <div class="sale-icon shade-<?= $data[1] ?>">
                        <i class="bi <?= $data[2] ?>"></i>
                    </div>
                    <div class="sale-details">
                        <h3 class="text-<?= $data[1] ?>"><?= $row['total'] ?></h3>
                        <p><?= $data[3] ?></p>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    // $conn->close(); // Close the database connection
    ?>
</div>
<!-- Row end -->
<?php
// Fetch total sales for the current month
$salesQueryCurrent = "SELECT COUNT(id) AS total_sales FROM orders WHERE MONTH(order_date) = MONTH(CURDATE()) AND YEAR(order_date) = YEAR(CURDATE())";
$salesResultCurrent = $conn->query($salesQueryCurrent);
$salesDataCurrent = $salesResultCurrent->fetch_assoc();

// Fetch total sales for the previous month
$salesQueryPrevious = "SELECT COUNT(id) AS total_sales FROM orders WHERE MONTH(order_date) = MONTH(CURDATE()) - 1 AND YEAR(order_date) = YEAR(CURDATE())";
$salesResultPrevious = $conn->query($salesQueryPrevious);
$salesDataPrevious = $salesResultPrevious->fetch_assoc();

// Default to 0 if no data is found
$salesCurrent = $salesDataCurrent['total_sales'] ?? 0;
$salesPrevious = $salesDataPrevious['total_sales'] ?? 0;

// Calculate the gap between current month and previous month
$salesGap = $salesCurrent - $salesPrevious;

$conn->close();
?>




						<!-- Row start -->
						<div class="row">
							<div class="col-xxl-9  col-sm-12 col-12">

								<div class="card">
									<div class="card-body">

										<!-- Row start -->
										<div class="row">
											<div class="col-xxl-3 col-sm-4 col-12">
												<div class="reports-summary">
                                                <div class="reports-summary-block">
                <i class="bi bi-circle-fill text-primary me-2"></i>
                <div class="d-flex flex-column">
                    <h6>Current Month Sales</h6>
                    <h5><?= $salesCurrent ?> LKR</h5>
                </div>
            </div>
            <!-- Display total sales for the previous month -->
            <div class="reports-summary-block">
                <i class="bi bi-circle-fill text-success me-2"></i>
                <div class="d-flex flex-column">
                    <h6>Previous Month Sales</h6>
                    <h5><?= $salesPrevious ?> LKR</h5>
                </div>
            </div>
            <!-- Display the gap between current and previous month sales -->
            <div class="reports-summary-block">
                <i class="bi bi-circle-fill text-warning me-2"></i>
                <div class="d-flex flex-column">
                    <h6>Sales Difference</h6>
                    <h5><?= $salesGap ?> LKR</h5>
                </div>
            </div>

													<button class="btn btn-info download-reports">View Reports</button>
												</div>
											</div>
											<div class="col-xxl-9 col-sm-8 col-12">
												<div class="row">
													<div class="col-12">
													<div class="graph-day-selection mt-2" role="group">
														<button type="button" class="btn active">Today</button>
														<button type="button" class="btn">Yesterday</button>
														<button type="button" class="btn">7 days</button>
														<button type="button" class="btn">15 days</button>
														<button type="button" class="btn">30 days</button>
														<button type="button" class="btn">Monthly Sales</button>
													</div>

													</div>
													<div class="col-12">
														<div id="revenueGraph2"></div>
														<div id="revenueGraph3"></div>
													</div>
												</div>
											</div>
										</div>
										<!-- Row end -->

									</div>
								</div>

                                    </div>
                                    <div class="col-xxl-3  col-sm-12 col-12">
                                    <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Sales</div>
                                </div>

                                <div class="card-body">
                                <div id="salesGraph2" class="auto-align-graph"></div>

                                    <!-- Display the gap -->
                                    <div class="num-stats">
                                        <h2><?= number_format($salesGap); ?> LKR</h2> <!-- Display the gap (difference) -->
                                        <h6 class="text-truncate">
                                            <?php if ($salesGap > 0) { ?>
                                                <?= number_format($salesGap); ?> LKR higher than last month.
                                            <?php } elseif ($salesGap < 0) { ?>
                                                <?= number_format(abs($salesGap)); ?> LKR lower than last month.
                                            <?php } else { ?>
                                                No change in sales compared to last month.
                                            <?php } ?>
                                        </h6> <!-- Display the gap message -->
                                    </div>
                                </div>
                            </div>

							</div>
					    </div>
						<!-- Row end -->

					<!-- Row start -->
                    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Orders</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table v-middle">
                            <thead>
                                <tr>
                                     <th>Customer</th>
            <th>Order ID</th>
            <th>Ordered Placed</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Order Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include 'fetch_orders.php'; // Ensure this path points to your PHP fetch script ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Row end -->

						<!-- Row start -->
						<div class="row">
							<!-- <div class="col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Transactions</div>
									</div>
									<div class="card-body">
										<div class="scroll370">
											<div class="transactions-container">
												<div class="transaction-block">
													<div class="transaction-icon shade-blue">
														<i class="bi bi-credit-card"></i>
													</div>
													<div class="transaction-details">
														<h4>Visa Card</h4>
														<p class="text-truncate">Laptop Ordered</p>
													</div>
													<div class="transaction-amount text-blue">$1590</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-green">
														<i class="bi bi-paypal"></i>
													</div>
													<div class="transaction-details">
														<h4>Paypal</h4>
														<p class="text-truncate">Payment Received</p>
													</div>
													<div class="transaction-amount text-green">$310</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-blue">
														<i class="bi bi-pin-map"></i>
													</div>
													<div class="transaction-details">
														<h4>Travel</h4>
														<p class="text-truncate">Yosemite Trip</p>
													</div>
													<div class="transaction-amount text-blue">$4900</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-blue">
														<i class="bi bi-bag-check"></i>
													</div>
													<div class="transaction-details">
														<h4>Shopping</h4>
														<p class="text-truncate">Bill Paid</p>
													</div>
													<div class="transaction-amount text-blue">$285</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-green">
														<i class="bi bi-boxes"></i>
													</div>
													<div class="transaction-details">
														<h4>Bank</h4>
														<p class="text-truncate">Investment</p>
													</div>
													<div class="transaction-amount text-green">$150</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-green">
														<i class="bi bi-paypal"></i>
													</div>
													<div class="transaction-details">
														<h4>Paypal</h4>
														<p class="text-truncate">Amount Received</p>
													</div>
													<div class="transaction-amount text-green">$790</div>
												</div>
												<div class="transaction-block">
													<div class="transaction-icon shade-blue">
														<i class="bi bi-credit-card-2-front"></i>
													</div>
													<div class="transaction-details">
														<h4>Credit Card</h4>
														<p class="text-truncate">Online Shopping</p>
													</div>
													<div class="transaction-amount text-red">$280</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Tasks</div>
									</div>
									<div class="card-body">
										<div id="taskGraph"></div>
										<ul class="task-list-container">
											<li class="task-list-item">
												<div class="task-icon shade-blue">
													<i class="bi bi-clipboard-plus"></i>
												</div>
												<div class="task-info">
													<h5 class="task-title">New</h5>
													<p class="amount-spend">12</p>
												</div>
											</li>
											<li class="task-list-item">
												<div class="task-icon shade-green">
													<i class="bi bi-clipboard-check"></i>
												</div>
												<div class="task-info">
													<h5 class="task-title">Done</h5>
													<p class="amount-spend">15</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div> -->
							<?php
// Include your database connection file
include '../dbase.php';

// Fetch recent order details
$queryOrders = "
SELECT 
    o.id AS order_id, 
    o.fullname AS customer_name, 
    o.total_price, 
    o.payment_status, 
    o.transaction_id, 
    o.order_date, 
    i.name AS item_name, 
    i.type AS item_type, 
    i.description AS item_description
FROM 
    orders o 
JOIN 
    order_items oi ON o.id = oi.order_id
JOIN 
    items i ON oi.item_id = i.n_id
ORDER BY 
    o.order_date DESC
LIMIT 5;


";

$resultOrders = $conn->query($queryOrders);

// Fetch recent activity details
$queryActivity = "SELECT * FROM c_reviews ORDER BY c_id DESC LIMIT 5";
$resultActivity = $conn->query($queryActivity);
?>

<div class="col-sm-6 col-12">
    <div class="card1">
        <div class="card-header">
            <div class="card1-title">Activity</div>
        </div>
        <div class="card-body">
            <div class="scroll370">
                <?php if ($resultOrders && $resultOrders->num_rows > 0) { ?>
                    <ul>
                        <?php while ($order = $resultOrders->fetch_assoc()) { ?>
                            <li>
                                <strong>Order ID:</strong> <?php echo htmlspecialchars($order['order_id']); ?><br>
                                Customer: <?php echo htmlspecialchars($order['customer_name']); ?><br>
                                Order Date: <?php echo htmlspecialchars($order['order_date']); ?><br>
                                Total Amount: $<?php echo number_format($order['total_price'], 2); ?><br>
                            </li>
                            <hr>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>No recent orders available.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<div class="col-sm-6 col-12">
    <div class="card1">
        <div class="card-header">
            <div class="card1-title">Notifications</div>
        </div>
        <div class="card-body">
            <div class="scroll370">
                <?php if ($resultActivity && $resultActivity->num_rows > 0) { ?>
                    <ul>
                        <?php while ($activity = $resultActivity->fetch_assoc()) { ?>
                            <li>
                                <strong>Review ID:</strong> <?php echo htmlspecialchars($activity['c_id']); ?><br>
                                Rating: <?php echo htmlspecialchars($activity['rating']); ?><br>
                                Review: <?php echo htmlspecialchars($activity['review_description']); ?><br>
                            </li>
                            <hr>
                        <?php } ?>
                    </ul>
                <?php } else { ?>
                    <p>No recent activity available.</p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>

						</div>
						<!-- Row end -->

					</div>
					

					<!-- App Footer start -->
					<div class="app-footer">
						<span>© Arise admin 2023</span>
					</div>
					<!-- App footer end -->

			
			

		</div>
		

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.bundle.min.js"></script>
		<script src="assets/js/modernizr.js"></script>
		<script src="assets/js/moment.js"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Overlay Scroll JS -->
		<script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
		<script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

		<!-- Apex Charts -->
		<script src="assets/vendor/apex/apexcharts.min.js"></script>
		<script src="assets/vendor/apex/custom/sales/salesGraph.js"></script>
		<script src="assets/vendor/apex/custom/sales/revenueGraph.js"></script>
		<script src="assets/vendor/apex/custom/sales/taskGraph.js"></script>

		<!-- Main Js Required -->
		<script src="assets/js/main.js"></script>

	</body>

    <script >
        $(".graph-day-selection button").on('click', function() {
    $(this).siblings().removeClass('active');
    $(this).addClass('active');

    // Fetch data based on the button clicked
    var period = $(this).text().toLowerCase(); // 'today', 'yesterday', etc.

    $.ajax({
        url: 'fetch_graph_data.php',
        type: 'GET',
        data: { period: period },
        success: function(response) {
            // Assume response is the new data for the graph
            chart.updateSeries([{
                data: response.sales
            }]);
        }
    });
});

    </script>
    <!-- revenueGraph -->

<script>
$(document).ready(function () {
    let chart = null; // Declare chart globally
    let isLoading = false; // Prevent concurrent AJAX calls

    // Initial fetch for "Today"
    fetchSalesRevenueData('today');

    // Handle button clicks for day selection
    $('.graph-day-selection button').on('click', function () {
        $('.graph-day-selection button').removeClass('active');
        $(this).addClass('active');
        const range = $(this).text().toLowerCase();

        if (range === 'monthly sales') {
            fetchMonthlySalesData();
        } else {
            fetchSalesRevenueData(range);
        }
    });

    function fetchSalesRevenueData(range) {
        if (isLoading) return;
        isLoading = true;

        $.ajax({
            url: 'fetch_sales_revenue_data.php',
            type: 'GET',
            data: { range: range },
            dataType: 'json',
            success: function (data) {
                isLoading = false;
                console.log('Fetched data:', data);
                const months = data.map(item => item.month);
                const salesData = data.map(item => item.sales);
                const revenueData = data.map(item => item.revenue);
                renderChart(months, salesData, revenueData);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                isLoading = false;
                console.error('Error fetching data:', textStatus, errorThrown);
            },
        });
    }

    function fetchMonthlySalesData() {
        if (isLoading) return;
        isLoading = true;

        $.ajax({
            url: 'fetch_monthly_sales_data.php', // New endpoint for monthly sales
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                isLoading = false;
                console.log('Monthly sales data:', data);
                const months = data.map(item => item.month);
                const salesData = data.map(item => item.sales);
                renderChart(months, salesData, []);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                isLoading = false;
                console.error('Error fetching monthly sales data:', textStatus, errorThrown);
            },
        });
    }

    function renderChart(months, salesData, revenueData) {
        if (chart) {
            chart.destroy();
        }

        if (!document.querySelector("#revenueGraph2")) {
            console.error("Chart container not found!");
            return;
        }

        const options = {
            chart: {
                height: 317,
                type: 'area',
                toolbar: { show: false },
            },
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            series: [
                { name: 'Sales', data: salesData },
                { name: 'Revenue', data: revenueData.length ? revenueData : null },
            ],
            grid: {
                borderColor: '#e0e6ed',
                strokeDashArray: 5,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: false } },
                padding: { top: 0, right: 0, bottom: 10, left: 0 },
            },
            xaxis: { categories: months },
            yaxis: { labels: { show: true } },
            colors: ['#4267cd', '#32b2fa'],
            markers: {
                size: 0,
                opacity: 0.1,
                colors: ['#4267cd', '#32b2fa'],
                strokeColor: '#ffffff',
                strokeWidth: 2,
                hover: { size: 7 },
            },
        };

        chart = new ApexCharts(document.querySelector("#revenueGraph2"), options);
        chart.render();
    }
});

</script>

<!-- monthly sales -->
 <script>
	$(document).ready(function () {
    let chart = null; // Declare chart globally
    let isLoading = false; // Prevent concurrent requests

    // Handle button clicks for day selection (Today, Yesterday, etc.)
    $('.graph-day-selection button').on('click', function () {
        $('.graph-day-selection button').removeClass('active');
        $(this).addClass('active');
        const range = $(this).text().toLowerCase();

        if (range === 'monthly sales') {
            fetchMonthlySalesData(); // Fetch and render monthly sales
        } else {
            fetchSalesRevenueData(range); // Fetch data for other date ranges (today, yesterday, etc.)
        }
    });

    // Fetch monthly sales data
    function fetchMonthlySalesData() {
        if (isLoading) return; // Prevent multiple AJAX requests
        isLoading = true;

        $.ajax({
            url: 'fetch_monthly_sales_data.php', // PHP script to fetch monthly sales data
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                isLoading = false;
                console.log('Fetched monthly sales data:', data); // Log data

                // If no data is available, return early
                if (!Array.isArray(data) || data.length === 0) {
                    console.error('Invalid or empty data received for monthly sales');
                    return;
                }

                const months = data.map(item => item.month); // X-axis months
                const salesData = data.map(item => item.sales); // Sales data
                const revenueData = data.map(item => item.revenue); // Revenue data

                renderMonthlyChart(months, salesData, revenueData); // Render chart for monthly sales
            },
            error: function (jqXHR, textStatus, errorThrown) {
                isLoading = false;
                console.error('Error fetching monthly sales data:', textStatus, errorThrown);
            },
        });
    }

    // Render the monthly sales chart
    function renderMonthlyChart(months, salesData, revenueData) {
        if (chart) {
            chart.destroy(); // Destroy the previous chart if it exists
        }

        const options = {
            chart: {
                height: 317,
                type: 'area',
                toolbar: { show: false },
            },
            dataLabels: { enabled: false },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            series: [
                { name: 'Sales', data: salesData },
                { name: 'Revenue', data: revenueData },
            ],
            grid: {
                borderColor: '#e0e6ed',
                strokeDashArray: 5,
                xaxis: { lines: { show: true } },
                yaxis: { lines: { show: false } },
                padding: { top: 0, right: 0, bottom: 10, left: 0 },
            },
            xaxis: { categories: months }, // Display months as x-axis labels
            yaxis: { labels: { show: true } },
            colors: ['#4267cd', '#32b2fa'],
            markers: {
                size: 0,
                opacity: 0.1,
                colors: ['#4267cd', '#32b2fa'],
                strokeColor: '#ffffff',
                strokeWidth: 2,
                hover: { size: 7 },
            },
        };

        chart = new ApexCharts(document.querySelector("#revenueGraph2"), options);
        chart.render();
    }
});


 </script>




    <!-- salesgraph -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            fetchSalesData();

            function fetchSalesData() {
                $.ajax({
                    url: 'fetch_sales_data.php', // Adjust this URL to where your PHP script is located
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        let months = data.map(item => item.month);
                        let sales = data.map(item => item.sales);
                        renderChart(months, sales);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error('Error fetching data:', textStatus, errorThrown);
                    }
                });
            }

            function renderChart(months, sales) {
                var options = {
                    chart: {
                        height: 235,
                        width: '75%',
                        type: 'bar',
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: '60%',
                            borderRadius: 8,
                        },
                    },
                    dataLabels: {
                        enabled: false
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ['#435EEF']
                    },
                    series: [{
                        name: 'Sales',
                        data: sales
                    }],
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        categories: months,
                    },
                    yaxis: {
                        show: false,
                    },
                    fill: {
                        colors: ['#4267cd'],
                    },
                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return "$" + val + " sales";
                            }
                        }
                    },
                    grid: {
                        show: false,
                        xaxis: {
                            lines: {
                                show: true
                            }
                        },   
                        yaxis: {
                            lines: {
                                show: false,
                            } 
                        },
                        padding: {
                            top: 0,
                            right: 0,
                            bottom: -10,
                            left: 0
                        },
                    },
                    colors: ['#ffffff'],
                }
                var chart = new ApexCharts(document.querySelector("#salesGraph2"), options);
                chart.render();
            }
        });
    </script>



<style>
    .table-responsive {
        max-height: 400px; /* Adjust this value based on your needs */
        overflow-y: auto;
        display: block;
    }
    .table {
        width: 100%;
        margin-bottom: 0; /* Remove margin to handle overflow correctly */
    }
    thead th {
        position: sticky;
        top: 0;
        background-color: #fff; /* Optional: Change to match your design */
        z-index: 10;
    }

	.card1 {
	margin-left: 10px;
    border: none; /* Remove border */
    border-radius: 15px; /* Smooth rounded corners */
    background: linear-gradient(145deg, #ffffff, #f8f9fa); /* Subtle gradient for modern look */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1), 0 4px 10px rgba(0, 0, 0, 0.05); /* Depth with layered shadows */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Hover effect animations */
}

.card1:hover {
   
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15), 0 6px 12px rgba(0, 0, 0, 0.1); /* Enhanced hover shadow */
}

.card1 .card-header {
    padding: 15px; /* Padding for header */
    border-bottom: 1px solid #dcdcdc; /* Subtle separator */
    background: #f8f9fa; /* Light background for header */
    border-radius: 15px 15px 0 0; /* Round top corners */
}

.card1 .card1-title {
    font-size: 22px; /* Larger font for title */
    font-weight: 700; /* Bold for emphasis */
    color: #34495e; /* Rich modern text color */
    text-transform: uppercase; /* Uppercase for modern feel */
    letter-spacing: 1px; /* Elegance through spacing */
    margin: 0;
}

.card1 .card-body {
    padding: 20px; /* Inner padding */
}

.scroll370 {
    max-height: 400px; /* Limit height */
    overflow-y: auto; /* Enable vertical scrolling */
    padding: 15px; /* Inner padding */
    border-radius: 10px; /* Smooth rounded corners */
    background: #ffffff; /* Clean white background */
    box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.05); /* Inset shadow for depth */
}

.scroll370 ul {
    list-style-type: none; /* Remove bullets */
    padding: 0;
    margin: 0;
}

.scroll370 ul li {
    margin-bottom: 18px; /* Space between list items */
    line-height: 1.8; /* Readable line height */
    padding: 12px 18px; /* Inner padding for each item */
    background: #f9f9f9; /* Subtle background color */
    border-radius: 8px; /* Rounded corners for items */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05); /* Light shadow */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Smooth hover effect */
}

.scroll370 ul li:hover {
    background-color: #e6f7ff; /* Soft blue highlight on hover */
    transform: scale(1.02); /* Slight zoom effect */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Enhanced shadow on hover */
}

.scroll370 ul li strong {
    font-weight: 600; /* Strong emphasis for labels */
    color: #2c3e50; /* Modern text color */
}

.scroll370 ul li:last-child {
    border-bottom: none; /* Remove border from last item */
}

.scroll370 p {
    font-size: 16px; /* Text size for no data message */
    color: #7f8c8d; /* Muted text color */
    text-align: center; /* Center align the text */
    margin: 20px 0; /* Add space around */
}

</style>

</html>