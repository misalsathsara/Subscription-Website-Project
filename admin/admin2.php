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
        'payments' => ["SELECT COUNT(payment_id) AS total FROM payments", 'red', 'bi-pie-chart', 'Sales'],
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


// Fetch total sales
$salesQuery = "SELECT COUNT(id) AS total_sales FROM orders";
$salesResult = $conn->query($salesQuery);
$salesData = $salesResult->fetch_assoc();

// Fetch total earnings
$earningsQuery = "SELECT SUM(payment_amount) AS total_earnings FROM payments";
$earningsResult = $conn->query($earningsQuery);
$earningsData = $earningsResult->fetch_assoc();

// Fetch total revenue
// $revenueQuery = "SELECT SUM(revenue) AS total_revenue FROM financials";
// $revenueResult = $conn->query($revenueQuery);
// $revenueData = $revenueResult->fetch_assoc();

// Fetch new customers
$customersQuery = "SELECT COUNT(c_id) AS new_customers FROM customers WHERE date_registered >= DATE(NOW()) - INTERVAL 30 DAY";
$customersResult = $conn->query($customersQuery);
$customersData = $customersResult->fetch_assoc();

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
                                                        <h6>Overall Sales</h6>
                                                        <h5><?= $salesData['total_sales'] ?? '0'; ?> </h5>
                                                    </div>
                                                </div>
                                                <div class="reports-summary-block">
                                                    <i class="bi bi-circle-fill text-success me-2"></i>
                                                    <div class="d-flex flex-column">
                                                        <h6>Overall Earnings</h6>
                                                        <h5><?= $earningsData['total_earnings'] ?? '0'; ?> Millions</h5>
                                                    </div>
                                                </div>
                                                <!-- <div class="reports-summary-block">
                                                    <i class="bi bi-circle-fill text-danger me-2"></i>
                                                    <div class="d-flex flex-column">
                                                        <h6>Overall Revenue</h6>
                                                        <h5><?= $revenueData['total_revenue'] ?? '0'; ?> Millions</h5>
                                                    </div>
                                                </div> -->
                                                <div class="reports-summary-block">
                                                    <i class="bi bi-circle-fill text-warning me-2"></i>
                                                    <div class="d-flex flex-column">
                                                        <h6>New Customers</h6>
                                                        <h5><?= $customersData['new_customers'] ?? '0'; ?>k</h5>
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
														</div>
													</div>
													<div class="col-12">
														<div id="revenueGraph2"></div>
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
										<div class="num-stats">
											<h2>2100</h2>
											<h6 class="text-truncate">12% higher than last month.</h6>
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
							<div class="col-sm-6 col-12">
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
							</div>
							<div class="col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Notifications</div>
									</div>
									<div class="card-body">
										<div class="scroll370">
											<ul class="user-messages">
												<li>
													<div class="customer shade-blue">MK</div>
													<div class="delivery-details">
														<span class="badge shade-blue">Sales</span>
														<h5>Marie Kieffer</h5>
														<p>Thanks for choosing Apple product, further if you have any questions please contact sales
															team.</p>
													</div>
												</li>
												<li>
													<div class="customer shade-blue">ES</div>
													<div class="delivery-details">
														<span class="badge shade-blue">Marketing</span>
														<h5>Ewelina Sikora</h5>
														<p>Boost your sales by 50% with the easiest and proven marketing tool for customer enggement
															&amp; motivation.</p>
													</div>
												</li>
												<li>
													<div class="customer shade-blue">TN</div>
													<div class="delivery-details">
														<span class="badge shade-blue">Business</span>
														<h5>Teboho Ncube</h5>
														<p>Use an exclusive promo code HKYMM50 and get 50% off on your first order in the new year.
														</p>
													</div>
												</li>
												<li>
													<div class="customer shade-blue">CJ</div>
													<div class="delivery-details">
														<span class="badge shade-blue">Admin</span>
														<h5>Carla Jackson</h5>
														<p>Befor inviting the administrator, you must create a role that can be assigned to them.
														</p>
													</div>
												</li>
												<li>
													<div class="customer shade-red">JK</div>
													<div class="delivery-details">
														<span class="badge shade-red">Security</span>
														<h5>Julie Kemp</h5>
														<p>Your security subscription has expired. Please renew the subscription.</p>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6 col-12">
								<div class="card">
									<div class="card-header">
										<div class="card-title">Activity</div>
									</div>
									<div class="card-body">

										<div class="scroll370">
											<div class="activity-container">
												<div class="activity-block">
													<div class="activity-user">
														<img src="assets/images/user.png" alt="Activity User">
													</div>
													<div class="activity-details">
														<h4>Lilly Desmet</h4>
														<h5>3 hours ago</h5>
														<p>Sent invoice ref. #23457</p>
														<span class="badge shade-green">Sent</span>
													</div>
												</div>
												<div class="activity-block">
													<div class="activity-user">
														<img src="assets/images/user3.png" alt="Activity User">
													</div>
													<div class="activity-details">
														<h4>Jennifer Wilson</h4>
														<h5>7 hours ago</h5>
														<p>Paid invoice ref. #23459</p>
														<span class="badge shade-red">Payments</span>
													</div>
												</div>
												<div class="activity-block">
													<div class="activity-user">
														<img src="assets/images/user4.png" alt="Activity User">
													</div>
													<div class="activity-details">
														<h4>Elliott Hermans</h4>
														<h5>1 day ago</h5>
														<p>Paid invoice ref. #23473</p>
														<span class="badge shade-green">Paid</span>
													</div>
												</div>
												<div class="activity-block">
													<div class="activity-user">
														<img src="assets/images/user5.png" alt="Activity User">
													</div>
													<div class="activity-details">
														<h4>Sophie Michiels</h4>
														<h5>3 day ago</h5>
														<p>Paid invoice ref. #26788</p>
														<span class="badge shade-green">Sent</span>
													</div>
												</div>
												<div class="activity-block">
													<div class="activity-user">
														<img src="assets/images/user2.png" alt="Activity User">
													</div>
													<div class="activity-details">
														<h4>Ilyana Maes</h4>
														<h5>One week ago</h5>
														<p>Paid invoice ref. #34546</p>
														<span class="badge shade-red">Invoice</span>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
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
    $(document).ready(function() {
    fetchSalesRevenueData();

    function fetchSalesRevenueData() {
        $.ajax({
            url: 'fetch_sales_revenue_data.php', // Ensure this path is correct
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                console.log('Data fetched successfully:', data);
                var months = data.map(item => item.month);
                var salesData = data.map(item => item.sales);
                var revenueData = data.map(item => item.revenue);
                renderChart(months, salesData, revenueData);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching data: ' + textStatus, errorThrown);
            }
        });
    }

    function renderChart(months, salesData, revenueData) {
        var options = {
            chart: {
                height: 317,
                type: 'area',
                toolbar: {
                    show: false,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            series: [{
                name: 'Sales',
                data: salesData
            }, {
                name: 'Revenue',
                data: revenueData
            }],
            grid: {
                borderColor: '#e0e6ed',
                strokeDashArray: 5,
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
                    bottom: 10,
                    left: 0
                }, 
            },
            xaxis: {
                categories: months,
            },
            yaxis: {
                labels: {
                    show: false,
                }
            },
            colors: ['#4267cd', '#32b2fa'],
            markers: {
                size: 0,
                opacity: 0.1,
                colors: ['#4267cd', '#32b2fa'],
                strokeColor: "#ffffff",
                strokeWidth: 2,
                hover: {
                    size: 7,
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#revenueGraph2"), options);
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
</style>

</html>