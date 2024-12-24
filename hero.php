<!-- Hero Section Start -->
<div class="hero-section bg-light-blue" style="position: relative;">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <!-- Hero Text Section -->
            <div class="col-xl-5 col-lg-6 col-md-12">
                <div class="hero-content py-4 py-lg-4">
                    <!-- Adjusted padding -->
                    <h1 class="text-primary display-4 fw-bold">Welcome to SubscriBuy</h1>
                    <p class="text-secondary mb-3 lead">
                        <!-- Adjusted bottom margin -->
                        Explore top-quality Subscription Packages and enjoy exclusive deals, all in one place.
                    </p>
                    <a href="productPage.php" class="btn btn-primary btn-lg me-2">Shop Now</a> <!-- Adjusted margin -->
                    <!-- <a href="pages/deals.html" class="btn btn-outline-primary btn-lg">View Deals</a> -->
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
    background-color: #f0f8ff;
    /* Light blue background for a clean, minimalist look */
}

/* Hero Section Layout */
.hero-section {
    min-height: 85vh;
    /* Adjusted min-height */
    display: flex;
    align-items: center;
    background-size: cover;
    background-position: center;
}

/* Hero Content Styling */
.hero-content {
    margin-top: 0;
    /* Ensure no extra top margin */
}

.hero-content h1 {
    font-size: 5rem;
    /* Adjusted font size */
    font-weight: 700;
    color: #0046ff;
    /* Primary Blue */
    line-height: 1.2;
    margin-bottom: 1rem;
    /* Adjusted bottom margin */
}

.hero-content p {
    font-size: 1.1rem;
    /* Adjusted font size */
    color: #606060;
    /* Neutral grey for the text */
    margin-bottom: 1rem;
    /* Adjusted bottom margin */
}

/* Button Customizations */
.btn-primary {
    background-color: #0046ff;
    color: white;
    border: none;
    padding: 0.75rem 1.25rem;
    /* Adjusted padding */
    font-size: 1rem;
    /* Adjusted font size */
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0033cc;
    /* Slightly darker blue on hover */
}

.btn-outline-primary {
    border: 2px solid #0046ff;
    color: #0046ff;
    padding: 0.75rem 1.25rem;
    /* Adjusted padding */
    font-size: 1rem;
    /* Adjusted font size */
    transition: background-color 0.3s ease;
}

.btn-outline-primary:hover {
    background-color: #0046ff;
    color: white;
}

/* Hero Image */
.hero-img {
    width: 100%;
    /* Full width */
    max-width: 700px;
    /* Adjusted max width */
    margin-top: 0;
    /* Removed top margin */
    height: auto;
    /* Maintain aspect ratio */
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Adjusted shadow */
}

/* Responsive Design */
@media (max-width: 767.98px) {
    .hero-content h1 {
        font-size: 2.5rem;
        /* Adjusted font size for mobile */
    }

    .hero-content p {
        font-size: 1rem;
        /* Adjusted font size for mobile */
    }
}
</style>
<!-- Hero Section End -->