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
    <link rel="stylesheet" href="myStoreStyle.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        <button id="addItemBtn" class="add-item-button">Add Items</button>

        <div class="table-data">
    <div class="order">
        <div class="head">
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="itemsTableBody">
                <!-- Rows will be dynamically populated here -->
            </tbody>
        </table>
    </div>
</div>
    </main>
    <!-- MAIN -->
</section>
<!-- CONTENT -->

<!-- Modal  -->
<div id="itemModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Add New Item</h2>

            <div class="drag-drop-area" id="drop-area">
                <span>+</span>
                <input type="file" id="itemImage" accept="image/*" style="display: none;">
            </div>

            <input type="text" id="itemName" placeholder="Item Name">
            <select id="itemType">
                <option value="electronic">Electronic</option>
                <option value="beauty">Beauty</option>
                <option value="home appliance">Home Appliance</option>
            </select>
            <textarea id="itemDescription" placeholder="Item Description"></textarea>
            <input type="number" id="itemPrice" placeholder="Price">

            <button class="done-button" id="doneBtn">Done</button>
        </div>
    </div>



<!-- Modal Done -->

<!-- Update Modal -->
<div id="openUpdateModal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Update Item</h2>
        <input type="hidden" id="itemId" value="">
        <input type="text" id="itemName" placeholder="Item Name">
        <select id="itemType">
            <option value="electronic">Electronic</option>
            <option value="beauty">Beauty</option>
            <option value="home appliance">Home Appliance</option>
        </select>
        <input type="text" id="itemDescription" placeholder="Description">
        <input type="text" id="itemPrice" placeholder="Price">
        <button id="updateDoneBtn">Done</button>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('itemModal');
    const addItemBtn = document.getElementById('addItemBtn');
    const closeBtn = document.querySelector('.close-btn');
    const dropArea = document.getElementById('drop-area');
    const itemImageInput = document.getElementById('itemImage');

    // Open modal on button click
    addItemBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    // Close modal on close button click
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside modal content
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Drag and drop image functionality
    dropArea.onclick = function () {
        itemImageInput.click(); // Trigger file input click
    };

    itemImageInput.addEventListener('change', handleFileSelect);

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.style.backgroundColor = '#e3e3e3'; // Optional visual feedback on hover
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.style.backgroundColor = ''; // Reset background when leaving the drop area
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        const file = e.dataTransfer.files[0];
        itemImageInput.files = e.dataTransfer.files; // Assign the dropped file to the input
        handleFileSelect({ target: itemImageInput }); // Reuse the file input change handler
    });

    function handleFileSelect(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                dropArea.style.backgroundImage = `url(${e.target.result})`;
                dropArea.style.backgroundSize = 'cover';
                dropArea.style.backgroundPosition = 'center';
                dropArea.innerHTML = ''; // Remove the "+" sign
            };

            reader.readAsDataURL(file); // Read the image as a data URL
        }
    }

    document.getElementById('doneBtn').onclick = function () {
        const itemName = document.getElementById('itemName').value;
        const itemType = document.getElementById('itemType').value;
        const itemDescription = document.getElementById('itemDescription').value;
        const itemPrice = document.getElementById('itemPrice').value;
        const itemImage = itemImageInput.files[0];

        if (!itemName || !itemType || !itemDescription || !itemPrice || !itemImage) {
            Swal.fire('Error', 'Please fill all fields and upload an image.', 'error');
            return;
        }

        Swal.fire({
            title: 'Are you sure?',
            text: 'Do you want to add this item?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, add it!'
        }).then((result) => {
            if (result.isConfirmed) {
                const formData = new FormData();
                formData.append('itemName', itemName);
                formData.append('itemType', itemType);
                formData.append('itemDescription', itemDescription);
                formData.append('itemPrice', itemPrice);
                formData.append('itemImage', itemImage);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'upload.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        Swal.fire('Success', 'Item added successfully!', 'success');
                        modal.style.display = 'none'; // Close modal
                    } else {
                        Swal.fire('Error', 'There was an issue adding the item.', 'error');
                    }
                };
                xhr.send(formData); // Send the form data to the server
            }
        });
    };
});

</script>

<script>
    $(document).ready(function() {
    const modal = $('#updateModal');

    // Function to fetch items from the database
    function fetchItems() {
        $.ajax({
            url: 'fetch_items.php', // PHP script to fetch items
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const itemsTableBody = $('#itemsTableBody');
                itemsTableBody.empty(); // Clear existing rows

                data.forEach(item => {
                    const row = `
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.type}</td>
                            <td>${item.description}</td>
                            <td>${item.price}</td>
                            <td><button class="update-btn" data-id="${item.id}">Update</button></td>
                        </tr>
                    `;
                    itemsTableBody.append(row);
                });

                // Add click event for update buttons
                $('.update-btn').on('click', function() {
                    const itemId = $(this).data('id');
                    openUpdateModal(itemId);
                });
            },
            error: function(error) {
                console.error("Error fetching items:", error);
            }
        });
    }

    // Function to open the update modal and populate it with item data
    function openUpdateModal(itemId) {
        $.ajax({
            url: 'get_item.php', // PHP script to get specific item data
            method: 'GET',
            data: { id: itemId },
            dataType: 'json',
            success: function(item) {
                $('#itemId').val(item.id);
                $('#itemName').val(item.item_name);
                $('#itemType').val(item.type);
                $('#itemDescription').val(item.description);
                $('#itemPrice').val(item.price);
                modal.show(); // Show the modal
            },
            error: function(error) {
                console.error("Error fetching item:", error);
            }
        });
    }

    // Update item on button click
    $('#updateDoneBtn').on('click', function() {
        const itemId = $('#itemId').val();
        const itemName = $('#itemName').val();
        const itemType = $('#itemType').val();
        const itemDescription = $('#itemDescription').val();
        const itemPrice = $('#itemPrice').val();

        $.ajax({
            url: 'update.php', // PHP script to update the item
            method: 'POST',
            data: {
                id: itemId,
                item_name: itemName,
                type: itemType,
                description: itemDescription,
                price: itemPrice
            },
            success: function(response) {
                Swal.fire('Success', 'Updated successfully!', 'success');
                modal.hide(); // Hide modal
                fetchItems(); // Refresh items
            },
            error: function(error) {
                console.error("Error updating item:", error);
                Swal.fire('Error', 'Failed to update item.', 'error');
            }
        });
    });

    // Close modal
    $('.close-btn').on('click', function() {
        modal.hide();
    });

    // Fetch items on page load
    fetchItems();
});

</script>


<script src="script.js"></script>

</body>
</html>