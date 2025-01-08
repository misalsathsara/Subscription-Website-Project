<?php
session_start();
// include 'dbase.php';

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
    $username = $_SESSION['username'];
    include('header2.php'); // Include logged-in header
} else {
    include('header.php'); // Include default header
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Marketplace 22</title>
    <link rel="stylesheet" href="bstyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-content">
            <h1>Our Blog</h1>
            <!-- <p>Discover delicious foods and essential cooking tools.</p> -->
            <!-- <a href="#" class="btn">Shop Now</a> -->
        </div>
    </header>

    <!-- Featured Articles Section -->
    <section class="articles">
        <!-- <h2>Featured Food Articles</h2> -->
        <div class="article-grid">
            <!-- Sample Article 1 -->
            <article class="article-card">
                <img src="images/trending1.jpg" alt="Healthy Recipes">
                <div class="article-info">
                    <h3>10 Healthy Recipes for Every Meal</h3>
                    <p>Explore nutritious and delicious recipes to enhance your meals.</p>
                    <a href="details.php?id=1" class="btn">Read More</a>
                </div>
            </article>

            <!-- Sample Article 2 -->
            <article class="article-card">
                <img src="images/trending1.jpg" alt="Kitchen Tips">
                <div class="article-info">
                    <h3>Essential Kitchen Tips for Home Chefs</h3>
                    <p>Discover tips that will transform your cooking experience.</p>
                    <a href="details.php?id=2" class="btn">Read More</a>
                </div>
            </article>

            <!-- Sample Article 3 -->
            <article class="article-card">
                <img src="images/trending1.jpg" alt="Food Trends">
                <div class="article-info">
                    <h3>Food Trends You Need to Know About</h3>
                    <p>Stay ahead of the curve with these exciting food trends.</p>
                    <a href="details.php?id=3" class="btn">Read More</a>
                </div>
            </article>

            <!-- Sample Article 1 -->
            <article class="article-card">
                <img src="images/trending1.jpg" alt="Healthy Recipes">
                <div class="article-info">
                    <h3>10 Healthy Recipes for Every Meal</h3>
                    <p>Explore nutritious and delicious recipes to enhance your meals.</p>
                    <a href="details.php?id=1" class="btn">Read More</a>
                </div>
            </article>

            <!-- Sample Article 2 -->
            <article class="article-card">
                <img src="images/trending1.jpg" alt="Kitchen Tips">
                <div class="article-info">
                    <h3>Essential Kitchen Tips for Home Chefs</h3>
                    <p>Discover tips that will transform your cooking experience.</p>
                    <a href="details.php?id=2" class="btn">Read More</a>
                </div>
            </article>


        </div>
    </section>

    <!-- Trending Posts Section -->
    <section class="trending-posts">
        <h2>Trending Food Items</h2>
        <div class="trending-grid">
            <article class="trending-card">
                <img src="images/trending1.jpg" alt="Organic Fruits">
                <div class="trending-info">
                    <h3>Fresh Organic Fruits</h3>
                    <p>Enjoy the taste of our freshly picked organic fruits.</p>
                    <a href="#" class="btn">Shop Now</a>
                </div>
            </article>
            <article class="trending-card">
                <img src="images/trending1.jpg" alt="Chef Tools">
                <div class="trending-info">
                    <h3>High-Quality Chef Tools</h3>
                    <p>Equip your kitchen with our premium chef tools.</p>
                    <a href="#" class="btn">Shop Now</a>
                </div>
            </article>
            <article class="trending-card">
                <img src="images/trending1.jpg" alt="Gourmet Spices">
                <div class="trending-info">
                    <h3>Gourmet Spices</h3>
                    <p>Add flavor to your dishes with our gourmet spices.</p>
                    <a href="#" class="btn">Shop Now</a>
                </div>
            </article>

        </div>
    </section>

    <!-- Testimonials Section -->


    <!-- Subscribe Section -->
    <section class="subscribe">
        <h2>Subscribe for Updates</h2>
        <form>
            <input type="email" placeholder="Enter your email" required>
            <button type="submit" class="btn">Subscribe</button>
        </form>
    </section>

    <?php include 'footer.php'; ?>

</body>

</html>