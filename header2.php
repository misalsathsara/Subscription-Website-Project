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
                    <a class="nav-link icon-btn" href="#"><i class="fa fa-shopping-cart"></i></a>
                    <a class="nav-link icon-btn" href="#"><i class="fa fa-heart"></i></a>
                    <div class="nav-item dropdown">
    <a class="nav-link dropdown-toggle icon-btn" href="#" id="navbarDropdown" role="button"
        data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user"></i>
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item" href="user-profile.php"><i class="fa fa-user"></i> Profile</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> Orders</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
        <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
        <li><a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
    </ul>
</div>

                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->