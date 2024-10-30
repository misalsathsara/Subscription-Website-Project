<?php
session_start();
include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('header2.php'); // Include logged-in header
} else {
    include('header.php'); // Include default header
}

// Retrieve wishlist items for the logged-in user
$query = "SELECT w.id AS wishlist_id, w.n_id, i.name, i.price, i.image
          FROM wishlist w
          JOIN items i ON w.n_id = i.n_id
          WHERE w.username = ?";

$stmt = $conn->prepare($query);
if (!$stmt) {
    die("Error preparing the statement: " . $conn->error);
}

$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$wishlistItems = [];

while ($row = $result->fetch_assoc()) {
    $wishlistItems[] = $row;
}

$stmt->close();
$conn->close();
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Your Wishlist Items</h1>

    <?php if (!empty($wishlistItems)) : ?>
        <div class="row">
            <?php foreach ($wishlistItems as $item) : ?>
                <div class="col-md-4 mb-4"> <!-- Adjust column size as needed -->
                    <div class="card shadow-sm rounded-lg">
                        <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" class="card-img-top" alt="<?php echo htmlspecialchars($item['name']); ?>" style="height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title mb-1" style="font-size: 1rem;"><?php echo htmlspecialchars($item['name']); ?></h5>
                            <p class="text-muted mb-1">LKR <?php echo number_format($item['price'], 2); ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                            <form class="remove-from-wishlist-form" action="remove_from_wishlist.php" method="POST" style="display: inline;">
    <input type="hidden" name="wishlist_id" value="<?php echo $item['wishlist_id']; ?>">
    <button type="submit" class="btn btn-outline-danger btn-sm">
        <i class="fas fa-trash-alt"></i> Remove
    </button>
</form>
<form class="add-to-cart-form" action="add_to_cart.php" method="POST" style="display: inline;">
    <input type="hidden" name="wishlist_id" value="<?php echo $item['wishlist_id']; ?>"> <!-- Pass wishlist ID -->
    <input type="hidden" name="n_id" value="<?php echo $item['n_id']; ?>"> <!-- Pass item ID -->
    <button type="submit" class="btn btn-outline-success btn-sm">
        <i class="fas fa-shopping-cart"></i> Add to Cart
    </button>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else : ?>
        <div class="alert alert-info text-center" role="alert">
            <i class="fas fa-info-circle"></i> Your wishlist is empty.
        </div>
    <?php endif; ?>
</div>

<?php include('footer.php'); ?>


<script>
$(document).ready(function() {
    // Handle adding to cart
    $('form.add-to-cart-form').on('submit', function(e) {
        e.preventDefault(); // Prevent the default form submission

        const formData = $(this).serialize(); // Get form data

        $.ajax({
            url: 'add_to_cart.php', // The URL to send the request to
            type: 'POST', // The HTTP method to use
            data: formData, // The data to send
            dataType: 'json', // The type of data expected back from the server
            success: function(response) {
                if (response.success) {
                    // Show success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message, // Display the success message
                        showConfirmButton: true,
                        timer: 3000 // Auto-close after 3 seconds
                    }).then(() => {
                        location.reload(); // Reload the page after showing the alert
                    });
                } else {
                    // Show error message using JavaScript alert
                    alert(response.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('An unexpected error occurred: ' + textStatus);
            }
        });
    });

    // Handle removing from wishlist
    document.querySelectorAll('.remove-from-wishlist-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            const formData = new FormData(this);

            fetch('remove_from_wishlist.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message using SweetAlert
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        location.reload(); // Reload the page after showing the alert
                    });
                } else {
                    // Show error message using JavaScript alert
                    alert(data.error);
                }
            })
            .catch(error => {
                alert('An unexpected error occurred: ' + error.message);
            });
        });
    });
});
</script>
