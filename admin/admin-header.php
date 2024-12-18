
<!-- Admin header -->
<?php
$activePage = isset($activePage) ? $activePage : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="myStoreStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<title>SubscriBuy AdminHub</title>
</head>
<body>
<section id="sidebar">
	<a href="#" class="brand">
		<i class='bx bxs-smile'></i>
		<span class="text">SubscriBuy</span>
	</a>
	<ul class="side-menu top">
		<li class="<?= $activePage === 'dashboard' ? 'active' : '' ?>">
			<a href="index.php">
				<i class='bx bxs-dashboard'></i>
				<span class="text">Dashboard</span>
			</a>
		</li>
		<li class="<?= $activePage === 'myStore' ? 'active' : '' ?>">
			<a href="myStore.php">
				<i class='bx bxs-shopping-bag-alt'></i>
				<span class="text">My Store</span>
			</a>
		</li>
		<li>
			<a href="#">
				<i class='bx bxs-doughnut-chart'></i>
				<span class="text">Analytics</span>
			</a>
		</li>
		<li class="<?= $activePage === 'message' ? 'active' : '' ?>">
			<a href="admin-messages.php">
				<i class='bx bxs-message-dots'></i>
				<span class="text">Message</span>
			</a>
		</li>
		<li class="<?= $activePage === 'activeStatus' ? 'active' : '' ?>">
			<a href="activeUsers.php">
				<i class='bx bxs-group'></i>
				<span class="text">Active Users</span>
			</a>
		</li>
	</ul>
	<ul class="side-menu">
		<li>
			<a href="admin.php">
				<i class='bx bxs-cog'></i>
				<span class="text">Settings</span>
			</a>
		</li>
		<li>
			<a href="logout.php" class="logout">
				<i class='bx bxs-log-out-circle'></i>
				<span class="text">Logout</span>
			</a>
		</li>
	</ul>
</section>
<section id="content">
    <nav>
        <i class='bx bx-menu'></i>
        <a href="#" class="nav-link">Categories</a>
        <form action="#">
            <div class="form-input">
                <input type="search" placeholder="Search...">
                <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
            </div>
        </form>
        <input type="checkbox" id="switch-mode" hidden>
        <label for="switch-mode" class="switch-mode"></label>
        <a href="#" class="notification">
            <i class='bx bxs-bell'></i>
            <span class="num">8</span>
        </a>
        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
