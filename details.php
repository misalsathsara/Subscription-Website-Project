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
    <title>Our Blog</title>
    <link rel="stylesheet" href="details.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>



<body>


    <?php
    // Sample data for demonstration
    $itemDetails = [
        'title' => 'Best Laptops of 2024',
        'image' => 'images/article1.jpg',
        'content' => 'Discover the top laptops of 2024 tailored for every need. From powerful gaming machines to ultra-portable business laptops, our guide covers it all. Each laptop is evaluated based on performance, battery life, and user reviews. We ensure you find the right fit for your lifestyle.',
        'price' => '$999',
        'features' => [
            'High Performance',
            'Lightweight and Portable',
            'Long Battery Life',
            'Latest Technology',
            'Exceptional Display Quality',
            'Robust Build',
        ],
    ];
    ?>


    <section class="details">
        <div class="container">
            <img src=" echo $itemDetails['image']; ?>" alt="<?php echo $itemDetails['title']; ?>" class="item-image">
            <div class="item-info">
                <h2><?php echo $itemDetails['title']; ?></h2>
                <h3>Price: <span><?php echo $itemDetails['price']; ?></span></h3>
                <p class="description"><?php echo $itemDetails['content']; ?></p>

                <h4>Key Features:</h4>
                <div class="features-grid">
                    <?php foreach ($itemDetails['features'] as $feature): ?>
                        <div class="feature-item"><?php echo $feature; ?></div>
                    <?php endforeach; ?>
                </div>

                <div class="buttons">
                    <a href="#" class="btn buy-btn">Buy Now</a>
                    <a href="index.php" class="btn back-btn">Back to Blog</a>
                </div>
            </div>
        </div>
    </section>




    <?php include 'footer.php'; ?>
</body>

</html>