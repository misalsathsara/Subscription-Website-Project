<?php
$activePage = 'myStore';
include('admin-header.php');
?>

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

        <!-- ADD Iems Button -->
        <button id="addItemBtn" class="add-item-button">Add Items</button>


<!-- table section -->
<div class="table-data">
    <div class="order">
        <div class="head">
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="itemsTableBody">
                <?php include 'fetch_items.php'; ?> <!-- PHP code that fetches and displays data -->
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

            <!-- <input type="text" id="itemID" placeholder="Item ID"> -->
            <input type="text" id="itemName" placeholder="Item Name">
            <select id="itemType">
                <option value="electronic">Electronic</option>
                <option value="beauty">Beauty</option>
                <option value="home appliance">Home Appliance</option>
                <option value="health-and-wellness">Health & Wellness</option>
                <option value="fashion">Fashion</option>
                <option value="food-and-beverages">Food & Beverages</option>
                <option value="fitness">Fitness</option>
                <option value="entertainment">Entertainment</option>
                <option value="books-and-magazines">Books & Magazines</option>
                <option value="gaming">Gaming</option>
                <option value="pets">Pets</option>
                <option value="kids-and-toys">Kids & Toys</option>
                <option value="travel-and-adventure">Travel & Adventure</option>
                <option value="home-decor">Home Decor</option>
                <option value="automobile">Automobile</option>
                <option value="software">Software</option>
                <option value="education">Education</option>
                <option value="music">Music</option>
                <option value="groceries">Groceries</option>
                <option value="fruits-and-vegetables">Fruits & Vegetables</option>
                <option value="short-eats">Short Eats</option>
                <option value="snacks-and-beverages">Snacks & Beverages</option>
                <option value="daily-essentials">Daily Essentials</option>
                <option value="bakery-items">Bakery Items</option>
                <option value="dairy-products">Dairy Products</option>
                <option value="meat-and-seafood">Meat & Seafood</option>
                <option value="frozen-foods">Frozen Foods</option>
                <option value="prepared-meals">Prepared Meals</option>
            </select>

            <textarea id="itemDescription" placeholder="Item Description"></textarea>
            <input type="number" id="itemPrice" placeholder="Price">

            <button class="done-button" id="doneBtn">Done</button>
        </div>
    </div>



<!-- Modal Done -->

<!-- Update Modal -->
<!-- Update Modal -->
<div id="updateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Update Item</h2>

        <!-- Show the item image -->
        <!-- Drag and drop area for updating the image -->
        <!-- <div class="drag-drop-area" id="update-drop-area">
            <span>+</span>
            <input type="file" id="updateItemImage" accept="image/*" style="display: none;">
        </div> -->

        <!-- Other item fields -->
        <input type="hidden" id="updateItemID">

        <input type="text" id="updateItemName" placeholder="Item Name">
        <select id="updateItemType">
            <option value="electronic">Electronic</option>
            <option value="beauty">Beauty</option>
            <option value="home appliance">Home Appliance</option>
        </select>
        <textarea id="updateItemDescription" placeholder="Item Description"></textarea>
        <input type="number" id="updateItemPrice" placeholder="Price">

        <button class="done-button" id="updateBtn">Update</button>
    </div>
</div>

<?php
include 'admin-footer.php';
?>

<script>

function loadTableData() {
    fetch('fetch_items.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('itemsTableBody').innerHTML = data;
        });
}
document.addEventListener('click', function (e) {
    if (e.target && e.target.closest('.update-btn')) {
        const itemId = e.target.closest('.update-btn').getAttribute('data-id');
        
        // Fetch the item details
        fetch(`getItems.php?id=${itemId}`)
            .then(response => response.json())
            .then(data => {
                // Populate the modal fields with the item data
                // document.getElementById('updateItemImage').value = data.image;
                document.getElementById('updateItemName').value = data.name;
                document.getElementById('updateItemType').value = data.type;
                document.getElementById('updateItemDescription').value = data.description;
                document.getElementById('updateItemPrice').value = data.price;

                // Store the item ID in a variable
                document.getElementById('updateItemID').value = itemId; // Add a hidden input for item ID
                const modal = document.getElementById("updateModal");
                modal.style.display = "flex";  // Use flex to center it
            });
    }
});

// Close the modal when the close button is clicked
document.querySelectorAll('.close-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        document.getElementById('updateModal').style.display = 'none';
    });
});

// Update button click event
document.getElementById('updateBtn').addEventListener('click', function () {
    const itemId = document.getElementById('updateItemID').value; // Get item ID from the hidden input
    const updatedItem = {
        id: itemId,
        name: document.getElementById('updateItemName').value,
        type: document.getElementById('updateItemType').value,
        description: document.getElementById('updateItemDescription').value,
        price: document.getElementById('updateItemPrice').value
    };

    fetch('updateItem.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(updatedItem)
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            // Show SweetAlert for successful update
            Swal.fire('Updated!', 'Item has been successfully updated.', 'success');

            // Hide the modal
            document.getElementById('updateModal').style.display = 'none';

            // Reload the table
            loadTableData();  // You'll define this function to refresh the table
        } else {
            Swal.fire('Error!', 'Failed to update the item.', 'error');
        }
    });
});


document.addEventListener('click', function (e) {
    if (e.target && e.target.closest('.delete-btn')) {
        const itemId = e.target.closest('.delete-btn').getAttribute('data-id');

        // Confirmation via SweetAlert
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX request to delete the item
                fetch(`deleteItem.php?id=${itemId}`)
                    .then(response => response.json())
                    .then(result => {
                        if (result.status === 'success') {
                            Swal.fire('Deleted!', 'Item has been deleted.', 'success');

                            // Reload the table
                            loadTableData();  // You'll define this function to refresh the table
                        }
                    });
            }
        });
    }
});


// Call loadTableData on page load
document.addEventListener('DOMContentLoaded', loadTableData);


// Close modal functionality
document.querySelector('.close-btn').addEventListener('click', function() {
    document.getElementById('updateModal').style.display = 'none';
});



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
        //const itemID = document.getElementById('itemID').value;
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
        // formData.append('itemID', itemID);
        formData.append('itemName', itemName);
        formData.append('itemType', itemType);
        formData.append('itemDescription', itemDescription);
        formData.append('itemPrice', itemPrice);
        formData.append('itemImage', itemImage);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'upload.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status === 'success') {
                    Swal.fire('Success', response.message, 'success');
                    modal.style.display = 'none'; // Close modal
                } else {
                    Swal.fire('Error', response.message, 'error');
                }
            } else {
                Swal.fire('Error', 'There was an issue with the request.', 'error');
            }
        };
        xhr.send(formData); // Send the form data to the server
    }
});

    };
});

</script>
