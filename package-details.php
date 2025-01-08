<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package Details</title>
    <link rel="stylesheet" href="pkgstyle.css">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1>SubscriBuy</h1>
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Packages</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="package-details">
            <div class="package-info">
                <h3>Weekly Essentials</h3>
                <video class="package-image" autoplay muted loop>
                    <source src="package-detail.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <p>Description of the package.</p>
            </div>

            <div class="items-list">
                <h3>Items in This Package</h3>
                <ul id="item-list">
                    <li>
                        <span>Item 1 - $10.00</span>
                        <button class="remove-btn" data-item="1">Remove</button>
                    </li>
                    <li>
                        <span>Item 2 - $15.00</span>
                        <button class="remove-btn" data-item="2">Remove</button>
                    </li>
                    <!-- Add more items as needed -->
                </ul>

                <!-- Total Cost and Buttons moved here -->
                <div class="total-cost">
                    <h3>Total Cost: $25.00</h3>
                </div>
                <button id="customize-package">Customize Package</button>
                <button id="checkout-button">Checkout</button>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 SubscriBuy. All rights reserved.</p>
    </footer>

    <script src="details.js"></script>
</body>

</html>