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
                    <a href="productPage.php" class="btn btn-white text-blue me-3">View Products</a>
                </div>
            </div>
            <!-- Image Column -->
            <div class="col-xl-7 col-lg-6 col-md-12 text-lg-end text-center">
                <img src="./Images/banner_man.png" alt="Hero Image" class="img-fluid banner-image">
            </div>
        </div>
    </div>
</div>

<style>
    .banner-section {
        background-color: #0d6efd;
        /* Your preferred blue */
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
        transform: translateY(-3px);
        /* Hover effect to elevate the button slightly */
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
<!-- Banner End -->