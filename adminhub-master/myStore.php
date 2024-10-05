<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="mystorestyle.css">

	<title>AdminHub</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="index.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="myStore.php">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">My Store</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Analytics</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
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
    <!-- NAVBAR -->

    <!-- MAIN -->
    <main>
        <div class="head-title">
            <div class="left">
                <h1>My Store</h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="">My Store</a>
                    </li>
                    <li><i class='bx bx-chevron-right'></i></li>
                    <li>
                        <a class="active" href="index.php">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="box-info">
            <li>
                <i class='bx bxs-calendar-check'></i>
                <span class="text">
                    <h3>1020</h3>
                    <p>New Order</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-group'></i>
                <span class="text">
                    <h3>2834</h3>
                    <p>Visitors</p>
                </span>
            </li>
            <li>
                <i class='bx bxs-dollar-circle'></i>
                <span class="text">
                    <h3>$2543</h3>
                    <p>Total Sales</p>
                </span>
            </li>
        </ul>

        <!-- ADD Iems Button -->
        <div class="container">
            <button type="button" class="btn-primary" id="add-item-btn">
                Add Item
            </button>
        </div>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <i class='bx bx-search'></i>
                    <i class='bx bx-filter'></i>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Date Order</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="ordersTableBody">
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Doe</p>
                            </td>
                            <td>01-10-2021</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>Jane Doe</p>
                            </td>
                            <td>02-10-2021</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>Mike Smith</p>
                            </td>
                            <td>03-10-2021</td>
                            <td><span class="status process">Process</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>John Johnson</p>
                            </td>
                            <td>04-10-2021</td>
                            <td><span class="status pending">Pending</span></td>
                        </tr>
                        <tr>
                            <td>
                                <img src="img/people.png">
                                <p>Emily Davis</p>
                            </td>
                            <td>05-10-2021</td>
                            <td><span class="status completed">Completed</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<!-- Modal -->
<div class="modal" id="addItemModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add New Item</h5>
                <span class="modal-close" id="closeModal">&times;</span>
            </div>
            <div class="modal-body">
                <form id="addItemForm" action="uploads.php" method="POST" enctype="multipart/form-data">
                    <!-- Image Drag and Drop -->
                    <div class="form-group text-center">
                        <div class="drag-drop-zone" id="drop-zone">
                            <i class="plus-icon">+</i>
                            <p>Drag & Drop Image Here</p>
                        </div>
                        <input type="file" id="file-input" name="imageFile" class="form-control d-none">
                    </div>

                    <!-- Name Input -->
                    <div class="form-group mt-3">
                        <label for="itemName">Item Name</label>
                        <input type="text" class="input-field" id="itemName" name="itemName" placeholder="Enter item name">
                    </div>

                    <!-- Description Input -->
                    <div class="form-group mt-3">
                        <label for="itemDescription">Description</label>
                        <textarea class="input-field" id="itemDescription" name="itemDescription" rows="3" placeholder="Enter description"></textarea>
                    </div>

                    <!-- Type Input -->
                    <div class="form-group mt-3">
                        <label for="itemType">Type</label>
                        <select class="input-field" id="itemType" name="itemType">
                            <option value="home-appliance">Home Appliance</option>
                            <option value="beauty">Beauty</option>
                            <option value="electronic">Electronic</option>
                            <option value="food-items">Food Items</option>
                        </select>
                    </div>

                    <!-- Price Input -->
                    <div class="form-group mt-3">
                        <label for="itemPrice">Price</label>
                        <input type="number" class="input-field" id="itemPrice" name="itemPrice" placeholder="Enter price">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-secondary" id="cancel-btn">Cancel</button>
                        <button type="submit" class="btn-primary">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal" id="successModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Success!</h5>
                <span class="modal-close" id="closeSuccessModal">&times;</span>
            </div>
            <div class="modal-body">
                <p>Item has been added successfully.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-primary" id="success-ok-btn">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const modal = document.getElementById("addItemModal");
    const openModalBtn = document.getElementById("add-item-btn");
    const closeModalBtn = document.getElementById("closeModal");
    const cancelModalBtn = document.getElementById("cancel-btn");

    // Open modal with SweetAlert notification
    openModalBtn.onclick = function() {
        modal.style.display = "block";
        modal.classList.add("modal-open-animation");
        // Swal.fire({
        //     icon: 'info',
        //     title: 'Add New Item',
        //     text: 'You can now add a new item. Fill out the details below.',
        //     timer: 2000, // Auto close after 2 seconds
        //     showConfirmButton: false
        // });
    };

    // Close modal with SweetAlert when clicking on the close icon or cancel button
    function closeModal() {
        modal.classList.add("modal-close-animation");
        setTimeout(() => {
            modal.style.display = "none";
            modal.classList.remove("modal-open-animation", "modal-close-animation");

            // SweetAlert for modal closing
            Swal.fire({
                icon: 'warning',
                title: 'Action Canceled',
                text: 'You have closed the item form.',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            });
        }, 300); // Match animation duration
    }

    closeModalBtn.onclick = closeModal;
    cancelModalBtn.onclick = closeModal;

    // Close modal when clicking outside the modal content
    window.onclick = function(event) {
        if (event.target == modal) {
            closeModal();
        }
    };

    // JavaScript for drag and drop with SweetAlert notifications
    const dropZone = document.getElementById('drop-zone');
    const fileInput = document.getElementById('file-input');

    dropZone.addEventListener('click', () => {
        fileInput.click();
        Swal.fire({
            icon: 'info',
            title: 'Choose File',
            text: 'Select an image to upload.',
            timer: 1500, // Auto close after 1.5 seconds
            showConfirmButton: false
        });
    });

    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.classList.add('dragover');
    });

    dropZone.addEventListener('dragleave', () => {
        dropZone.classList.remove('dragover');
    });

    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        fileInput.files = e.dataTransfer.files;
        dropZone.classList.remove('dragover');

        // Show SweetAlert on successful drop of the file
        Swal.fire({
            icon: 'success',
            title: 'File Uploaded',
            text: 'File has been added successfully.',
            timer: 2000, // Auto close after 2 seconds
            showConfirmButton: false
        });
    });
</script>

<script src="script.js"></script>

</body>
</html>