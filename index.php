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
</head>
</head>
<body>

<!-- Navbar Start -->
<style>
  /* Main navbar container */
  .navbar-custom {
    background-color: #ffffff; /* White background for clarity */
    border-bottom: 1px solid #e1e1e1;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    position: sticky;
    top: 40px; /* Adjust according to the height of the contact-info section */
    z-index: 1020; /* Ensure it stays on top of other content */
  }

  /* Contact info styling */
  .contact-info {
    background-color: #ffffff; /* Match the navbar background color */
    padding: 10px 20px;
    display: flex;
    justify-content: flex-end;
    align-items: center;
    font-size: 14px;
    color: #333;
    border-bottom: none; /* Remove the bottom border */
    position: sticky;
    top: 0; /* Sticks to the top */
    z-index: 1010; /* Ensure it stays below the navbar but on top of other content */
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
    transition: color 0.3s, background-color 0.3s;
  }

  .navbar-nav .nav-link:hover {
    color: #ffffff;
    background-color: #007bff;
    border-radius: 5px;
  }

  .navbar-nav .nav-link.active {
    color: #ffffff;
    background-color: #007bff;
    border-radius: 5px;
    font-weight: 700;
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
    margin-left: 20px; /* Space between search bar and other elements */
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
    margin-left: 10px; /* Adds space between search input and button */
  }

  .search-bar .btn:hover {
    background-color: #0056b3;
    border-color: #0056b3;
  }

  /* Icon button styling */
  .icon-btn {
    font-size: 20px; /* Increased size for better visibility */
    color: #000000; /* Set color to black */
    transition: color 0.3s;
    margin-left: 20px; /* Space between icon buttons */
  }

  .icon-btn:hover {
    color: #333333; /* Slightly lighter black on hover */
  }

  /* Adjust alignment of icon buttons */
  .navbar-right {
    display: flex;
    align-items: center;
    margin-left: auto; /* Pushes icons to the right */
  }

  @media (max-width: 767px) {
    .navbar-nav .nav-link {
      font-size: 14px;
    }

    .search-bar {
      margin-left: 0; /* Remove space for small screens */
      margin-top: 10px; /* Add space above search bar */
    }

    .icon-btn {
      font-size: 18px; /* Adjust size for small screens */
    }
  }
</style>

<div class="contact-info">
  <span><i class="fa fa-envelope"></i> info@example.com</span>
  <span><i class="fa fa-phone"></i> +1 234 567 890</span>
</div>

<nav class="navbar navbar-expand-lg navbar-custom">
  <div class="container">
    <a class="navbar-brand" href="#">SubscriBuy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blogs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
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
          <a class="nav-link dropdown-toggle icon-btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-user"></i>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-list"></i> Orders</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            <li><a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</nav>
<!-- Navbar End -->





<!-- Hero Section Start -->
<div class="hero-section bg-light-blue" style="position: relative;">
  <div class="container h-100">
    <div class="row align-items-center h-100">
      <!-- Hero Text Section -->
      <div class="col-xl-5 col-lg-6 col-md-12">
        <div class="hero-content py-4 py-lg-4"> <!-- Adjusted padding -->
          <h1 class="text-primary display-4 fw-bold">Welcome to SubscriBuy</h1>
          <p class="text-secondary mb-3 lead"> <!-- Adjusted bottom margin -->
            Explore top-quality Subscription Packages and enjoy exclusive deals, all in one place.
          </p>
          <a href="pages/shop.html" class="btn btn-primary btn-lg me-2">Shop Now</a> <!-- Adjusted margin -->
          <a href="pages/deals.html" class="btn btn-outline-primary btn-lg">View Deals</a>
        </div>
      </div>
      <!-- Hero Image Section -->
      <div class="col-xl-7 col-lg-6 col-md-12 text-lg-right text-center">
        <img src="./Images/food_prev_ui.png" alt="E-commerce Products" class="img-fluid hero-img">
      </div>
    </div>
  </div>
</div>

<!-- CSS Styles -->
<style>
  /* Light Blue Background */
  .bg-light-blue {
    background-color: #f0f8ff; /* Light blue background for a clean, minimalist look */
  }

  /* Hero Section Layout */
  .hero-section {
    min-height: 85vh; /* Adjusted min-height */
    display: flex;
    align-items: center;
    background-size: cover;
    background-position: center;
  }

  /* Hero Content Styling */
  .hero-content {
    margin-top: 0; /* Ensure no extra top margin */
  }

  .hero-content h1 {
    font-size: 5rem; /* Adjusted font size */
    font-weight: 700;
    color: #0046ff; /* Primary Blue */
    line-height: 1.2;
    margin-bottom: 1rem; /* Adjusted bottom margin */
  }

  .hero-content p {
    font-size: 1.1rem; /* Adjusted font size */
    color: #606060; /* Neutral grey for the text */
    margin-bottom: 1rem; /* Adjusted bottom margin */
  }

  /* Button Customizations */
  .btn-primary {
    background-color: #0046ff;
    color: white;
    border: none;
    padding: 0.75rem 1.25rem; /* Adjusted padding */
    font-size: 1rem; /* Adjusted font size */
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0033cc; /* Slightly darker blue on hover */
  }

  .btn-outline-primary {
    border: 2px solid #0046ff;
    color: #0046ff;
    padding: 0.75rem 1.25rem; /* Adjusted padding */
    font-size: 1rem; /* Adjusted font size */
    transition: background-color 0.3s ease;
  }

  .btn-outline-primary:hover {
    background-color: #0046ff;
    color: white;
  }

  /* Hero Image */
  .hero-img {
    width: 100%; /* Full width */
    max-width: 700px; /* Adjusted max width */
    margin-top: 0; /* Removed top margin */
    height: auto; /* Maintain aspect ratio */
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Adjusted shadow */
  }

  /* Responsive Design */
  @media (max-width: 767.98px) {
    .hero-content h1 {
      font-size: 2.5rem; /* Adjusted font size for mobile */
    }

    .hero-content p {
      font-size: 1rem; /* Adjusted font size for mobile */
    }
  }
</style>
<!-- Hero Section End -->

<!-- Stat Start -->
<!-- CSS Styles -->
<style>
  .section-heading {
    color: #0046ff; /* Primary Blue */
  }

  .section-content p {
    color: #606060; /* Neutral grey for the text */
  }

  .counter-box {
    border-top: 2px solid #0046ff; /* Primary Blue border */
    padding-top: 1rem;
    margin-top: 3rem;
    margin-bottom: 2.5rem;
    text-align: center;
  }

  .counter-box h1 {
    color: #0046ff; /* Primary Blue for counter text */
  }

  .counter-box p {
    color: #606060; /* Neutral grey for labels */
  }

  .text-uppercase {
    text-transform: uppercase;
  }
</style>

<div class="container my-5">
  <!-- Heading and Description in One Line -->
  <div class="row mb-4 align-items-center">
    <div class="col-md-6">
      <h1 class="display-4 fw-bold section-heading">Our Global Reach</h1>
      <p class="lead section-content">
      SubscriBuy offers subscription packages tailored for both rural and urban areas, providing people with reliable and high-quality services.
      </p>
    </div>
    <!-- Counters in One Line -->
    <div class="col-md-6">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="counter-box">
            <h1 class="display-3 fw-bold mb-0">100+</h1>
            <p class="text-uppercase">Products</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="counter-box">
            <h1 class="display-3 fw-bold mb-0">20+</h1>
            <p class="text-uppercase">Subscriptions</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="counter-box">
            <h1 class="display-3 fw-bold mb-0">50+</h1>
            <p class="text-uppercase">Customers</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="counter-box">
            <h1 class="display-3 fw-bold mb-0">50+</h1>
            <p class="text-uppercase">Reviews</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Stat End -->


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