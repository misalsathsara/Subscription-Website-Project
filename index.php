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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Include Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    

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
    transition: color 0.3s, background-color 0.3s, text-decoration 0.3s; /* Added transition for underline */
  }

  .navbar-nav .nav-link {
  color: #333;
  font-size: 16px;
  font-weight: 500;
  padding: 10px 15px;
  transition: color 0.3s, background-color 0.3s;
  position: relative; /* Required for the pseudo-element */
}

.navbar-nav .nav-link:hover {
  color: #007bff;
  background-color: #ffffff; /* Keep background color white on hover */
}

.navbar-nav .nav-link::after {
  content: "";
  display: block;
  position: absolute;
  left: 0;
  bottom: 0;
  width: 0;
  height: 2px; /* Thickness of the underline */
  background-color: #007bff; /* Color of the underline */
  transition: width 0.3s; /* Smooth slide-in effect */
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

<!-- Trending Products Section Start -->
<div class="container mt-5">
  <h2 class="text-center display-4 fw-bold text-primary section-heading" style="font-weight: 900;">Trending Products</h2>
  <div class="divider mb-4"></div>
  <div id="trendingCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="row">
          <!-- Product Item -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-hover shadow border-0 rounded-lg overflow-hidden">
              <img src="./Images/beauty pack.jpg" class="card-img-top img-hover-effect" alt="Product 1">
              <div class="card-body">
                <h4 class="card-title text-dark font-weight-bold">Product 1</h4>
                <div class="rating mb-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-muted">By Author 1</p>
                <p class="card-text font-weight-bold text-dark">$19.99</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                <button class="btn btn-primary btn-hover-effect">
                  <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-outline-primary btn-hover-effect">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Repeat for other products -->
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-hover shadow border-0 rounded-lg overflow-hidden">
              <img src="./Images/beauty pack.jpg" class="card-img-top img-hover-effect" alt="Product 2">
              <div class="card-body">
                <h4 class="card-title text-dark font-weight-bold">Product 2</h4>
                <div class="rating mb-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star"></i>
                </div>
                <p class="text-muted">By Author 2</p>
                <p class="card-text font-weight-bold text-dark">$29.99</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                <button class="btn btn-primary btn-hover-effect">
                  <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-outline-primary btn-hover-effect">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-hover shadow border-0 rounded-lg overflow-hidden">
              <img src="./Images/beauty pack.jpg" class="card-img-top img-hover-effect" alt="Product 3">
              <div class="card-body">
                <h4 class="card-title text-dark font-weight-bold">Product 3</h4>
                <div class="rating mb-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-muted">By Author 3</p>
                <p class="card-text font-weight-bold text-dark">$39.99</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                <button class="btn btn-primary btn-hover-effect">
                  <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-outline-primary btn-hover-effect">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-hover shadow border-0 rounded-lg overflow-hidden">
              <img src="./Images/beauty pack.jpg" class="card-img-top img-hover-effect" alt="Product 4">
              <div class="card-body">
                <h4 class="card-title text-dark font-weight-bold">Product 4</h4>
                <div class="rating mb-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-muted">By Author 4</p>
                <p class="card-text font-weight-bold text-dark">$49.99</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                <button class="btn btn-primary btn-hover-effect">
                  <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-outline-primary btn-hover-effect">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="row">
          <div class="col-md-3 col-sm-6 mb-4">
            <div class="card card-hover shadow border-0 rounded-lg overflow-hidden">
              <img src="./Images/beauty pack.jpg" class="card-img-top img-hover-effect" alt="Product 5">
              <div class="card-body">
                <h4 class="card-title text-dark font-weight-bold">Product 5</h4>
                <div class="rating mb-2">
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                  <i class="fas fa-star-half-alt text-warning"></i>
                </div>
                <p class="text-muted">By Author 5</p>
                <p class="card-text font-weight-bold text-dark">$59.99</p>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                <button class="btn btn-primary btn-hover-effect">
                  <i class="fas fa-shopping-cart"></i> Add to Cart
                </button>
                <button class="btn btn-outline-primary btn-hover-effect">
                  <i class="fas fa-heart"></i>
                </button>
              </div>
            </div>
          </div>
          <!-- Additional Product Items... -->
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#trendingCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#trendingCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<style>
.card-hover {
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  border-radius: 20px; /* Increased roundness for elegance */
}

.card-hover:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15); /* Softer shadow for a floating effect */
}

.img-hover-effect {
  transition: transform 0.3s ease-in-out, filter 0.3s ease-in-out;
  border-radius: 20px 20px 0 0; /* Rounded corners for the image */
}

.img-hover-effect:hover {
  transform: scale(1.1);
  filter: brightness(0.85); /* Darken image slightly on hover */
}

.btn-hover-effect {
  transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
}

.btn-hover-effect:hover {
  background-color: #0056b3; /* Darker shade for the button hover */
  color: #fff; /* Change text color on hover */
}

.divider {
  border-top: 3px solid #007bff; /* Thicker line for a more sophisticated look */
  width: 100px; /* Width of the divider */
  margin: 0 auto; /* Center the divider */
}

.rating .fas {
  margin-right: 2px;
}

.text-primary {
  color: #007bff; /* Primary blue color for headings */
}

/* Global Styles */
body {
  font-family: 'Arial', sans-serif;
  background-color: #f8f9fa; /* Light background for contrast */
}

h2 {
  font-weight: bold; /* Bold for headings */
}

.text-muted {
  font-size: 0.9em; /* Slightly smaller text for muted content */
}

.card-footer {
  background-color: #ffffff; /* White footer for a clean look */
  transition: background-color 0.3s ease-in-out; /* Smooth transition for hover */
}

.card-footer:hover {
  background-color: #f1f1f1; /* Light gray background on hover */
}
</style>
<!-- Trending Products Section End -->

<!-- Banner Start -->
<div class="banner-section bg-blue">
  <div class="container">
    <!-- Hero Section -->
    <div class="row align-items-center no-gutters">
      <!-- Text Content Column -->
      <div class="col-xl-5 col-lg-6 col-md-12">
        <div class="banner-content py-5 py-lg-0">
          <h1 class="text-white display-4 fw-bold banner-heading">
            Welcome to SubscriBuy
          </h1>
          <p class="text-white-50 mb-4 lead banner-subtext">
            Hand-picked clean and fresh items, packaged for rural and urban areas.
          </p>
          <!-- Call to Action Buttons -->
          <a href="" class="btn btn-white text-blue me-3">View Products</a>
        </div>
      </div>
      <!-- Image Column -->
      <div class="col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
        <img src="./Images/banner_man.png" alt="Hero Image" class="img-fluid banner-image">
      </div>
    </div>
  </div>
</div>
<!-- Banner End -->

<style>
  .banner-section {
    background-color: #0d6efd; /* Your preferred blue */
    /* padding: 60px 0; */
    position: relative;
    overflow: hidden;
  }

  /* Adding a subtle gradient overlay to make text more readable */
  .banner-section::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /* background: linear-gradient(90deg, rgba(13, 110, 253, 0.9) 50%, rgba(13, 110, 253, 0.6) 100%); */
    z-index: 1;
  }

  /* Content Styling */
  .banner-content {
    position: relative;
    z-index: 2;
  }

  .banner-heading {
    font-size: 3.5rem;
    letter-spacing: 1px;
    line-height: 1.2;
    animation: fadeInDown 1.5s ease-in-out;
  }

  .banner-subtext {
    font-size: 1.2rem;
    line-height: 1.5;
    animation: fadeIn 2s ease-in-out;
  }

  /* Button Styling */
  .btn-white {
    background-color: #ffffff;
    color: #0d6efd;
    border: 2px solid #0d6efd;
    padding: 12px 30px;
    font-size: 1.1rem;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .btn-white:hover {
    background-color: #f8f9fa;
    color: #0d6efd;
    border-color: #0d6efd;
    transform: translateY(-3px); /* Hover effect to elevate the button slightly */
  }

  /* Image Styling */
  .banner-image {
    width: 100%;
    height: auto;
    animation: slideInRight 2s ease-in-out;
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .banner-heading {
      font-size: 2.5rem;
    }

    .banner-subtext {
      font-size: 1rem;
    }

    .btn-white {
      font-size: 1rem;
      padding: 10px 20px;
    }
  }

  /* Animation Effects */
  @keyframes fadeInDown {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @keyframes fadeIn {
    0% {
      opacity: 0;
    }
    100% {
      opacity: 1;
    }
  }

  @keyframes slideInRight {
    0% {
      opacity: 0;
      transform: translateX(50px);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }
</style>




<!-- Bank Section Start -->
<section class="scrolling-logos light">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="scrolling-logos-heading">Meet Partners</h2>
    </div>
    <div class="logos-wrapper">
      <div class="logos d-flex justify-content-center align-items-center text-center">
        <img src="./Images/Commercial-Bank.png" alt="Commercial Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/hnb.png" alt="HNB" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/logo-dfccbank.png" alt="DFCC Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/Nations_Trust_Bank_logo.png" alt="Nations Trust Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/ndb.png" alt="NDB" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/sampath bank.png" alt="Sampath Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/boc.png" alt="boc Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/helapay.png" alt="helapay" class="scrolling-logo img-fluid px-5 my-4" />
        <!-- Repeat logos to create a continuous effect -->
        <img src="./Images/Commercial-Bank.png" alt="Commercial Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/hnb.png" alt="HNB" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/logo-dfccbank.png" alt="DFCC Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/Nations_Trust_Bank_logo.png" alt="Nations Trust Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/ndb.png" alt="NDB" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/sampath bank.png" alt="Sampath Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/boc.png" alt="boc Bank" class="scrolling-logo img-fluid px-5 my-4" />
        <img src="./Images/helapay.png" alt="helapay" class="scrolling-logo img-fluid px-5 my-4" />
      </div>
    </div>
  </div>
</section>

<!-- Additional Styles -->
<style>
  .scrolling-logos {
    background-color: #f6f6f6;
    overflow: hidden;
    padding: 60px 0;
  }

  @media (min-width: 768px) {
    .scrolling-logos {
      padding: 80px 0;
    }
  }

  .scrolling-logos-heading {
    font-weight: bold;
    font-size: 25px;
    color: #28303b;
  }

  @media (min-width: 768px) {
    .scrolling-logos-heading {
      font-size: 35px;
    }
  }

  .logos-wrapper {
    overflow: hidden; /* Ensure logos stay within the container */
  }

  .logos {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    width: max-content; /* Ensure logos are wide enough for the container */
    animation: scroll-left 40s linear infinite; /* Slowed down the animation duration */
  }

  .scrolling-logo {
    max-height: 50px;
  }

  @keyframes scroll-left {
    0% {
      transform: translateX(0); /* Start at the original position */
    }
    100% {
      transform: translateX(-50%); /* Move to the left by 50% to slow down and create a smoother loop */
    }
  }
</style>
<!-- Bank Section End -->


<!-- Footer Start -->
<footer class="py-5 footer" style="background-color: #ffffff; color: #003366;">
  <div class="container">
    <div class="row gy-4 text-center">
        <div class="col-6">
      <!-- About Company -->
      <div class=" col-12 d-flex flex-column align-items-center">
        <div class="mb-4">
          <a class="navbar-brand" href="#" style="color: #003366; font-weight: bold; font-size: 1.5rem; text-decoration: none;">SubscriBuy</a>
        </div>
        <p class="mb-4" style="color: #6c757d; font-size: 1.5rem; line-height: 1.6; padding-bottom: 70px">
          SubscriBuy connects founders and marketers with experienced mentors who genuinely enjoy helping others succeed.
        </p>
        <!-- Social Media Icons -->
        <div class="fs-4 d-flex justify-content-center gap-3">
          <a href="#!" class="text-primary" style="font-size: 1.5rem;">
            <i class="fa-brands fa-instagram"></i>
          </a>
          <a href="#!" class="text-primary" style="font-size: 1.5rem;">
            <i class="fa-brands fa-facebook-f"></i>
          </a>
          <a href="#!" class="text-primary" style="font-size: 1.5rem;">
            <i class="fa-brands fa-twitter"></i>
          </a>
          <a href="#!" class="text-primary" style="font-size: 1.5rem;">
            <i class="fa-brands fa-youtube"></i>
          </a>
        </div>
      </div>
     
      </div>
      <div class="col-6">
        <div class="map-container">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158786.11820556315!2d80.23346309839567!3d7.873054974239631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259b9d0905fb9%3A0x8c1bcd6d6cbd2fd7!2sSri%20Lanka!5e0!3m2!1sen!2sus!4v1630604520588!5m2!1sen!2sus" loading="lazy"></iframe>
        </div>
      </div>

    </div>
     <!-- Support Links -->
     <div class="row mt-5">
      <div class="col-12 d-flex justify-content-center">
        <ul class="list-unstyled d-flex gap-4 mb-0 align-items-center">
          <li class="support"><a href="#" class="text-dark" style="text-decoration: none; transition: color 0.3s;">FAQ</a></li>
          <li class="support"><a href="#" class="text-dark" style="text-decoration: none; transition: color 0.3s;">Contact</a></li>
          <li class="support"><a href="#" class="text-dark" style="text-decoration: none; transition: color 0.3s;">Help Centre</a></li>
          <li class="support"><a href="#" class="text-dark" style="text-decoration: none; transition: color 0.3s;">Join Community</a></li>
        </ul>
      </div>
    </div>
    
    <!-- Footer Bottom -->
    <div class="row mt-lg-7 mt-5 text-center">
      <div class="col-12">
        <span style="color: #6c757d; font-size: 0.9rem;">
          ©
          <span id="copyright2" class="me-2">
            <script>
              document.getElementById("copyright2").appendChild(document.createTextNode(new Date().getFullYear()));
            </script>
          </span>
          SubscriBuy. All Rights Reserved.
        </span>
      </div>
    </div>
  </div>
</footer>

<style>
 /* Ensure the support links are aligned to the right */
.col-lg-4.d-flex.justify-content-end {
  text-align: right;
}

/* Ensure list items are displayed in a row */
.list-unstyled {
  margin: 0;
  padding: 0;
}

.list-unstyled > li {
  display: inline;
}

.support {
  padding-right: 20px; /* Adjust spacing between items */
}

/* Hover effects */
.support a:hover {
  color: #003366;
  font-weight: bold;
  transition: color 0.3s ease, font-weight 0.3s ease;
}

/* Map container style */
.map-container {
  position: relative;
  /* padding-bottom: 56.25%;  */
  height: 300px; /* Use padding for aspect ratio */
  width: 100%; /* Responsive width */
  max-width: 100%; /* Ensure it doesn't exceed its parent */
  background: #eee;
  overflow: hidden; /* Hide anything outside the container */
}

.map-container iframe {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border: none; /* Remove default border */
}

/* Footer Padding */
.footer {
  padding-top: 3rem; /* Adjust top padding */
  padding-bottom: 3rem; /* Adjust bottom padding */
}

/* Adjust text size if needed */
.footer p {
  font-size: 1.2rem; /* Smaller font size */
}

/* Adjust the spacing in social media icons */
.fs-4 .fa {
  font-size: 1.2rem; /* Smaller icons */
}

/* Adjust support links spacing */
.support {
  padding-right: 15px; /* Reduced spacing between items */
}

</style>
<!-- Footer End -->




    <script src="home.js"></script>
    <!-- Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>