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
        <span><i class="fa fa-envelope"></i> info@subscribuy.com</span>
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
                    <a class="nav-link icon-btn" href="#" data-bs-toggle="modal" data-bs-target="#authModal">
                        <i class="fa fa-user"></i>
                    </a>

                    
                    <!-- <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle icon-btn" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> Orders</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <style>
        .error-message {
            display: none;
            color: red;
        }

        .custom-btn:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .custom-input:focus {
            border-color: #007bff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.2);
            transition: box-shadow 0.3s ease-in-out;
        }

        /* Initially hide the register form, as we want the login form to show first */
        #registerForm {
            display: none;
        }
    </style>

<!-- Integrated Modal for Login and Registration -->
<div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4">
            <div class="modal-header border-0">
                <h5 class="modal-title text-primary fw-bold" id="authModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- Login Form -->
                <div id="loginForm" class="auth-form">
                    <div class="login-container p-4 text-center">
                        <div class="illustration mb-4">
                            <img src="Images/p2.jpg" alt="Illustration" class="img-fluid rounded-circle border border-3 border-primary shadow-lg" style="max-width: 100px;">
                        </div>
                        <h2 class="text-primary fw-bold mb-4">Login to Your Account</h2>
                        <form action="" method="POST" id="lform">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control custom-input rounded-pill px-4 py-2 shadow-sm" placeholder="Username" name="username" required>
                            </div>
                            <div class="form-group mb-4">
                                <input type="password" class="form-control custom-input rounded-pill px-4 py-2 shadow-sm" placeholder="Password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary custom-btn btn-block rounded-pill shadow-sm px-4 py-2" style="background: linear-gradient(135deg, #007bff, #00c6ff); border: none;">Login</button>

                            <p class="forgot-password mt-4 mb-1"><a href="#" class="text-secondary">Forgot Password?</a></p>
                            <p class="register mt-2">
                                Don't have an account? 
                                <a href="#" class="text-primary fw-bold" id="showRegisterForm">Register Now</a>
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Registration Form -->
                <div id="registerForm" class="auth-form" style="display: none;">
                    <div class="registration-container p-4">
                        <h2 class="text-primary fw-bold mb-4">Create Your Account</h2>
                        <form id="regform">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" id="reg-username" name="username" placeholder="Your username" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="reg-password" name="password" placeholder="Set a password" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="confirm-password">Re-enter Password:</label>
                                    <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
                                </div>
                            </div>
                            <div class="error-message" id="password-error">Passwords do not match!</div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Your email address" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="country-code">Country Code:</label>
                                    <select class="form-control" id="country-code" name="country-code" required></select>
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="tel">Phone Number:</label>
                                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="Phone number" maxlength="9" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Your address" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary custom-btn btn-block rounded-pill shadow-sm px-4 py-2" id="submit-btn">Register</button>
                        </form>
                        <p class="mt-3">
                            Already have an account? 
                            <a href="#" class="text-primary fw-bold" id="showLoginForm">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS & jQuery (CDN) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        // Show Register Form
        $('#showRegisterForm').click(function(e) {
            e.preventDefault();
            $('#loginForm').hide();   // Hide the login form
            $('#registerForm').show(); // Show the registration form
            $('#authModalLabel').text('Register');  // Change modal title to 'Register'
        });

        // Show Login Form
        $('#showLoginForm').click(function(e) {
            e.preventDefault();
            $('#registerForm').hide(); // Hide the registration form
            $('#loginForm').show();   // Show the login form
            $('#authModalLabel').text('Login');   // Change modal title to 'Login'
        });

        // Validate registration form
        $('#submit-btn').click(function(event) {
            event.preventDefault();

            var password = $("#reg-password").val();
            var confirmPassword = $("#confirm-password").val();

            if (password !== confirmPassword) {
                $("#password-error").show();
            } else {
                $("#password-error").hide();
                // Submit the registration form (via AJAX or traditional form submission)
                alert('Registration form submitted successfully!');
            }
        });
    });
</script>
