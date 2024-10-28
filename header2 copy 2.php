
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubscriBuy - Buy Your Subscription Package</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

    <!-- Bootstrap JS Bundle (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>

    <!-- Navbar Start -->
    <style>
    /* Main navbar container */
    .navbar-custom {
        background-color: #ffffff;
        /* White background for clarity */
        border-bottom: 1px solid #e1e1e1;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 40px;
        /* Adjust according to the height of the contact-info section */
        z-index: 100;
        /* Ensure it stays on top of other content */
    }

    /* Contact info styling */
    .contact-info {
        background-color: #ffffff;
        /* Match the navbar background color */
        padding: 10px 20px;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        font-size: 14px;
        color: #333;
        border-bottom: none;
        /* Remove the bottom border */
        position: sticky;
        top: 0;
        /* Sticks to the top */
        z-index: 1010;
        /* Ensure it stays below the navbar but on top of other content */
    }

    .contact-info span {
        margin-left: 20px;
    }

    .contact-info i {
        color: #007bff;
        margin-right: 5px;
    }

    /* Navbar brand styling */
    .navbar-brand {
        font-size: 30px;
        font-weight: 700;
        color: #007bff;
        text-transform: uppercase;
    }

    /* Navbar links styling */
    .navbar-nav .nav-link {
        color: #333;
        font-size: 16px;
        font-weight: 500;
        padding: 10px 15px;
        transition: color 0.3s, background-color 0.3s, text-decoration 0.3s;
        /* Added transition for underline */
    }

    .navbar-nav .nav-link {
        color: #333;
        font-size: 16px;
        font-weight: 500;
        padding: 10px 15px;
        transition: color 0.3s, background-color 0.3s;
        position: relative;
        /* Required for the pseudo-element */
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
        background-color: #ffffff;
        /* Keep background color white on hover */
    }

    .navbar-nav .nav-link::after {
        content: "";
        display: block;
        position: absolute;
        left: 0;
        bottom: 0;
        width: 0;
        height: 2px;
        /* Thickness of the underline */
        background-color: #007bff;
        /* Color of the underline */
        transition: width 0.3s;
        /* Smooth slide-in effect */
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }



    .navbar-toggler {
        border: none;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='currentColor'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 6h16M4 12h16M4 18h16'/%3E%3C/svg%3E");
    }

    /* Dropdown menu styling */
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 10px;
    }

    .dropdown-item {
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .dropdown-item:hover {
        background-color: #f8f9fa;
        color: #007bff;
    }

    /* Search bar styling */
    .search-bar {
        display: flex;
        align-items: center;
        margin-left: 20px;
        /* Space between search bar and other elements */
    }

    .search-bar .form-control {
        border-radius: 30px;
        padding: 8px 15px;
        border: 1px solid #e1e1e1;
        box-shadow: none;
        transition: border-color 0.3s;
    }

    .search-bar .form-control:focus {
        border-color: #007bff;
    }

    .search-bar .btn {
        border-radius: 30px;
        background-color: #007bff;
        color: #ffffff;
        border: 1px solid #007bff;
        transition: background-color 0.3s, border-color 0.3s;
        margin-left: 10px;
        /* Adds space between search input and button */
    }

    .search-bar .btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

    /* Icon button styling */
    .icon-btn {
        font-size: 20px;
        /* Increased size for better visibility */
        color: #000000;
        /* Set color to black */
        transition: color 0.3s;
        margin-left: 20px;
        /* Space between icon buttons */
    }

    .icon-btn:hover {
        color: #333333;
        /* Slightly lighter black on hover */
    }

    /* Adjust alignment of icon buttons */
    .navbar-right {
        display: flex;
        align-items: center;
        margin-left: auto;
        /* Pushes icons to the right */
    }

    /* Add this CSS to your stylesheet */
.icon-btn {
    position: relative;
}

/* Updated CSS for a smaller cart count */
.cart-count {
    position: absolute;
    top: -5px;
    right: -9px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 3px 7px;
    font-size: 10px;
    font-weight: bold;
    min-width: 20px; /* Minimum width to keep count consistent */
    text-align: center;
}

.wish-count {
    position: absolute;
    top: -5px;
    right: -9px;
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 3px 7px;
    font-size: 10px;
    font-weight: bold;
    min-width: 20px; /* Minimum width to keep count consistent */
    text-align: center;
}


    @media (max-width: 767px) {
        .navbar-nav .nav-link {
            font-size: 14px;
        }

        .search-bar {
            margin-left: 0;
            /* Remove space for small screens */
            margin-top: 10px;
            /* Add space above search bar */
        }

        .icon-btn {
            font-size: 18px;
            /* Adjust size for small screens */
        }
    }
    </style>

    <div class="contact-info">
        <span><i class="fa fa-envelope"></i> info@example.com</span>
        <span><i class="fa fa-phone"></i> +1 234 567 890</span>
    </div>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.php">SubscriBuy</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productPage.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <div class="search-bar ms-auto">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
                <div class="navbar-right ms-3">

                <style>
    .icon-btn {
        position: relative;
        color: #333;
        transition: color 0.3s;
    }

    .icon-btn:hover {
        color: #0056b3; /* Change icon color on hover */
    }

    .dropdown-menu {
        min-width: 320px; /* Set a minimum width for the dropdown */
        border: none; /* Remove the border */
        border-radius: 12px; /* More rounded corners */
        background: linear-gradient(145deg, #ffffff, #e6e6e6); /* Gradient background */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2); /* Deeper shadow for depth */
        backdrop-filter: blur(10px); /* Blur effect for modern look */
    }

    .dropdown-item {
        padding: 15px 20px; /* Adjust padding for dropdown items */
        color: #333; /* Item text color */
        display: flex; /* Use flexbox for alignment */
        align-items: center; /* Center items vertically */
        border-radius: 8px; /* Rounded corners for items */
        transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover */
    }

    .dropdown-item:hover {
        background-color: rgba(0, 123, 255, 0.1); /* Light blue background on hover */
        transform: scale(1.02); /* Slight scale effect on hover */
        color: #0056b3; /* Change text color on hover */
    }

    .dropdown-item .item-icon {
        width: 45px; /* Increased width for icons */
        height: 45px; /* Increased height for icons */
        margin-right: 15px; /* Space between icon and text */
        border-radius: 8px; /* Rounded corners for icons */
        background-color: #f8f9fa; /* Light background for icons */
        padding: 5px; /* Padding for icons */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for icons */
    }

    .cart-count {
        position: absolute;
        top: -5px;
        right: -10px;
        font-size: 0.75rem;
    }

    /* Hide the default dropdown arrow */
    .dropdown-toggle::after {
        display: none; /* Remove arrow */
    }

    /* Style for the Proceed to Checkout link */
    .view-cart {
        font-weight: bold;
        color: #fff; /* White text color */
        text-decoration: none; /* Remove underline */
        background-color: #007bff; /* Button background color */
        border-radius: 8px; /* Rounded corners */
        padding: 12px 20px; /* Padding for spacing */
        margin: 10px 0; /* Margin for spacing */
        transition: background-color 0.3s; /* Transition for hover effect */
        display: inline-block; /* Center the button */
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.2); /* Shadow for button */
    }

    /* Additional styling for the cart item price */
    .item-price {
        font-weight: 600; /* Bold price */
        margin-left: auto; /* Push price to the right */
        color: #555; /* Subtle price color */
    }
    .delete-icon {
        margin-left: auto; /* Push icon to the right */
        color: #dc3545; /* Red color for the delete icon */
        cursor: pointer; /* Pointer cursor on hover */
        transition: color 0.3s; /* Smooth color transition */
    }

    .delete-icon:hover {
        color: #c82333; /* Darker red on hover */
    }
</style>

<!-- Shopping Cart Icon with Dropdown -->
<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle icon-btn" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-shopping-cart"></i>
        <?php if (count($cart_items) > 0) : ?>
            <span class="cart-count badge bg-danger"><?php echo count($cart_items); ?></span>
        <?php endif; ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="cartDropdown">
        <?php if (!empty($cart_items)) : ?>
            <?php foreach ($cart_items as $item) : ?>
                <li>
                    <a class="dropdown-item" href="#">
                        <img src="admin/<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="item-icon"> <!-- Add item icon -->
                        <span><?php echo htmlspecialchars($item['name']); ?></span>
                        <span class="item-price text-muted"><?php echo htmlspecialchars($item['price']); ?></span>
                        <i class="fa fa-trash delete-icon" 
                           onclick="window.location.href='remove_from_cart.php?id=<?php echo htmlspecialchars($item['id']); ?>';" 
                           title="Remove item"></i> <!-- Delete icon -->
                    </a>
                </li>
            <?php endforeach; ?>
            <li><hr class="dropdown-divider"></li>
            <li>
                <a class="dropdown-item text-center view-cart" href="show_cart.php">
                    Proceed to Checkout
                </a>
            </li>
        <?php else : ?>
            <li><a class="dropdown-item text-center" href="#">Your cart is empty</a></li>
        <?php endif; ?>
    </ul>
</div>





<!-- Wishlist Icon with Count -->
<a class="nav-link icon-btn" href="wishlist.php">
    <i class="fa fa-heart"></i>
    <?php if ($wish_count > 0) : ?>
        <span class="wish-count"><?php echo $wish_count; ?></span>
    <?php endif; ?>
</a>

<!-- User Profile Dropdown -->
<div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle icon-btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="user-profile.php"><i class="fa fa-user"></i> Profile</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> Orders</a></li>
        <li><a class="dropdown-item" href="wishlist.php"><i class="fa fa-heart"></i> Wishlist</a></li>
        <li><a class="dropdown-item" href="show_cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
        <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</div>



            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <script>
    // Function to fetch the updated cart count
    function updateCartCount() {
        // Make an AJAX request to getCartCount.php
        fetch('getCartCount.php')
            .then(response => response.json())
            .then(data => {
                // Update the cart count in the UI
                const cartCountElement = document.querySelector('.cart-count');
                const itemCount = data.item_count;

                if (itemCount > 0) {
                    // If item count is greater than 0, update the count or show the badge
                    if (cartCountElement) {
                        cartCountElement.textContent = itemCount;
                    } else {
                        // If the count element doesn't exist, create it
                        const cartIcon = document.querySelector('.fa-shopping-cart');
                        if (cartIcon) {
                            const span = document.createElement('span');
                            span.classList.add('cart-count');
                            span.textContent = itemCount;
                            cartIcon.parentElement.appendChild(span);
                        }
                    }
                } else {
                    // Remove the badge if the item count is 0
                    if (cartCountElement) {
                        cartCountElement.remove();
                    }
                }
            })
            .catch(error => {
                console.error('Error fetching cart count:', error);
            });
    }

    setInterval(updateCartCount, 100); // Update every 10 seconds
updateCartCount();

function updateWishCount() {
    // Make an AJAX request to get_wishlist_count.php
    fetch('get_wishlist_count.php')
        .then(response => response.json())
        .then(data => {
            console.log(data); // Log the response to check the structure

            // Update the wishlist count in the UI
            const wishCountElement = document.querySelector('.wish-count');
            const wishitemCount = data.wish_count;

            if (wishitemCount > 0) {
                // If item count is greater than 0, update the count or show the badge
                if (wishCountElement) {
                    wishCountElement.textContent = wishitemCount;
                } else {
                    // If the count element doesn't exist, create it
                    const wishIcon = document.querySelector('.fa-heart'); // Updated the selector
                    if (wishIcon) {
                        const span = document.createElement('span');
                        span.classList.add('wish-count');
                        span.textContent = wishitemCount;
                        wishIcon.parentElement.appendChild(span);
                    }
                }
            } else {
                // Remove the badge if the item count is 0
                if (wishCountElement) {
                    wishCountElement.remove();
                }
            }
        })
        .catch(error => {
            console.error('Error fetching wishlist count:', error);
        });
}

    setInterval(updateWishCount, 100); // Update every 10 seconds

    // Initial load
    updateWishCount();
</script>
