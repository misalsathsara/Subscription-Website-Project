<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
</head>
<body>

<!-- navbar start -->
<style>
    /* Styling for the main navbar */
    .main-navbar {
        border-bottom: 2px solid #f1f1f1;
        font-family: 'Poppins', sans-serif;
    }

    .brand-name {
        font-size: 24px;
        font-weight: bold;
        color: #007BFF;
    }

    .contact-info span {
        color: #555;
        font-size: 14px;
    }

    .contact-info span i {
        color: #007BFF;
        margin-right: 5px;
    }

    /* Flexbox to align items properly */
    .navbar-collapse {
        display: flex;
        justify-content: space-between;
        width: 100%;
    }

    .navbar-nav-left {
        margin-left: 0;
        padding-left: 0;
        display: flex;
        justify-content: flex-start;
    }

    .navbar-nav-right {
        margin-left: auto;
        display: flex;
        justify-content: flex-end;
    }

    /* Navbar link hover effect */
    .navbar-nav .nav-link {
        font-size: 16px;
        color: #333;
        font-weight: 500;
        padding-right: 20px;
        padding-left: 10px;
        position: relative;
        transition: color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
        color: #007BFF;
    }

    /* Hover underline effect */
    .navbar-nav .nav-link::after {
        content: '';
        display: block;
        width: 0;
        height: 2px;
        background: #007BFF;
        transition: width 0.3s ease-in-out;
        position: absolute;
        bottom: -2px;
        left: 0;
    }

    .navbar-nav .nav-link:hover::after {
        width: 100%;
    }

    /* Styling for buttons and icons */
    .nav .nav-link i {
        color: #007BFF;
        font-size: 18px;
        margin-right: 5px;
        transition: transform 0.3s ease, color 0.3s ease;
    }

    .nav .nav-link:hover i {
        transform: scale(1.2);
        color: #0056b3;
    }

    /* Dropdown styling */
    .dropdown-menu {
        border: none;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu a {
        color: #333;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown-menu a:hover {
        background-color: #007BFF;
        color: white;
    }

    /* Search bar styling */
    .input-group .form-control {
        border: 2px solid #e1e1e1;
        border-right: 0;
        padding: 8px;
        font-size: 14px;
        transition: border-color 0.3s ease;
    }

    .input-group .form-control:focus {
        border-color: #007BFF;
        box-shadow: none;
    }

    .input-group .btn {
        background-color: #007BFF;
        color: white;
        border: 2px solid #007BFF;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .input-group .btn:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="main-navbar shadow-sm fixed-top bg-white">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                    <h5 class="brand-name">SubscriBuy</h5>
                </div>
                <div class="col-md-10">
                    <div class="d-flex justify-content-end">
                        <div class="contact-info me-3">
                            <span><i class="fa fa-envelope"></i> info@example.com</span>
                            <span class="ms-4"><i class="fa fa-phone"></i> +1 234 567 890</span>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center mt-2">
                        <form role="search" class="w-50">
                            <div class="input-group">
                                <input type="search" placeholder="Search your product" class="form-control" />
                                <button class="btn" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex align-items-center mt-2">
                        <nav class="navbar navbar-expand-lg w-100">
                            <div class="container-fluid">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left-aligned navigation items -->
                                    <ul class="navbar-nav navbar-nav-left mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">All Categories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">New Arrivals</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Featured Products</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Electronics</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Fashions</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Accessories</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Appliances</a>
                                        </li>
                                    </ul>
                                    <!-- Right-aligned icons (Cart, Wishlist, Profile) -->
                                    <ul class="navbar-nav navbar-nav-right">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="fa fa-shopping-cart"></i> Cart (0)
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">
                                                <i class="fa fa-heart"></i> Wishlist (0)
                                            </a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-user"></i> Username
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> My Orders</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> My Wishlist</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> My Cart</a></li>
                                                <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- navbar End -->

    <section class="hero-section">
        <div class="hero-content">
            <h1>Discover the Best Packages for Your Needs</h1>
            <p>Subscribe to our weekly or monthly packages and get your essentials delivered right to your door.</p>
            <a href="#" class="cta-button">Explore Packages</a>
        </div>
        <img src="hero-banner.jpg" alt="Hero Image" class="hero-img">
    </section>

    <section class="featured-packages">
        <h2>Featured Packages</h2>
        <div class="package-grid">
            <div class="package-card">
                <img src="package1.jpeg" alt="Package 1">
                <h3>Weekly Essentials</h3>
                <p>Perfect for a quick top-up of your weekly needs.</p>
                <a href="package-details.html" class="cta-button" onclick="navigateToDetails('Weekly Essentials')">View Details</a>
            </div>
            <div class="package-card">
                <img src="package2.jpeg" alt="Package 2">
                <h3>Monthly Mega Pack</h3>
                <p>Everything you need for a whole month.</p>
                <a href="package-details.html" class="cta-button" onclick="navigateToDetails('Monthly Mega Pack')">View Details</a>
            </div>
            <!-- Add more packages as needed -->
        </div>
    </section>

    <section class="categories">
        <h2>Browse by Categories</h2>
        <ul class="category-list">
            <li><a href="#">Groceries</a></li>
            <li><a href="#">Personal Care</a></li>
            <li><a href="#">Home Essentials</a></li>
            <li><a href="#">Pet Supplies</a></li>
            <!-- Add more categories as needed -->
        </ul>
    </section>

    <section class="features">
        <h2>Our Features</h2>
        <div class="feature-grid">
            <div class="feature-card">
                <img src="fast-delivery.svg" alt="Fast Delivery">
                <h3>Fast Delivery</h3>
                <p>Get your packages delivered quickly and efficiently.</p>
            </div>
            <div class="feature-card">
                <img src="flexible-subscriptions.svg" alt="Flexible Subscriptions">
                <h3>Flexible Subscriptions</h3>
                <p>Choose from weekly or monthly subscription plans.</p>
            </div>
            <div class="feature-card">
                <img src="quality-products.svg" alt="Quality Products">
                <h3>Quality Products</h3>
                <p>We only offer the best quality products in our packages.</p>
            </div>
            <!-- Add more features as needed -->
        </div>
    </section>

    <section class="testimonial">
        <h2>What Our Customers Say</h2>
        <div class="testimonial-slider">
            <div class="testimonial-slide">
                <p>"The best subscription service I've used. Highly recommend!"</p>
                <span>- Jane Doe</span>
            </div>
            <div class="testimonial-slide">
                <p>"Fast delivery and excellent customer service. Love it!"</p>
                <span>- John Smith</span>
            </div>
            <!-- Add more testimonials as needed -->
        </div>
    </section>

    <!-- footer Start -->
    <div class="my-5">
  <footer class="text-center text-white" style="background-color: #3f51b5; width: 100vw;">
    <div class="container py-5">
      <!-- Section: Links -->
      <section class="mt-5">
        <div class="row text-center d-flex justify-content-center pt-3">
          <!-- Column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white footer-link">About us</a>
            </h6>
          </div>
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white footer-link">Products</a>
            </h6>
          </div>
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white footer-link">Awards</a>
            </h6>
          </div>
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white footer-link">Help</a>
            </h6>
          </div>
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white footer-link">Contact</a>
            </h6>
          </div>
        </div>
      </section>

      <hr class="my-5 text-white" />

      <!-- Section: Text -->
      <section class="mb-5">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <p style="font-size: 16px; color: #ddd;">
              We offer innovative and award-winning products that are trusted by people all over the world. Our commitment is to deliver excellence with every interaction. Have questions? Our team is here to help!
            </p>
          </div>
        </div>
      </section>

      <!-- Section: Social Media -->
      <section class="text-center mb-5">
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="text-white me-4 social-link">
          <i class="fab fa-github"></i>
        </a>
      </section>
    </div>

    <!-- Copyright Section -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
      © 2024 Copyright:
      <a class="text-white" href="#">developerFOUR</a>
    </div>
  </footer>
</div>

<!-- Additional CSS for hover effects and better typography -->
<style>
  /* Footer links hover effect */
  .footer-link {
    color: #ffffff;
    transition: color 0.3s ease, text-shadow 0.3s ease;
  }

  .footer-link:hover {
    color: #FFEB3B; /* Matches the header with a slight yellow accent */
    text-shadow: 0px 0px 10px rgba(255, 255, 255, 0.7);
  }

  /* Social Media icons hover effect */
  .social-link {
    font-size: 24px;
    transition: transform 0.3s ease, color 0.3s ease;
  }

  .social-link:hover {
    color: #FFEB3B; /* Matches the header with yellow accent */
    transform: scale(1.2); /* Slight zoom effect */
  }

  /* Footer text color for better readability */
  footer p {
    color: #ddd;
    line-height: 1.8;
  }

  footer hr {
    border-top: 1px solid #ffffff66;
  }

  footer .container {
    padding: 20px 0;
  }
</style>

 <!-- footer end -->

    <script src="home.js"></script>
    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>