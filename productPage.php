<?php
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="productStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

    <!-- Filter Section -->
    <div class="filter-section">
        <div>
            <label for="category-filter">Filter by Category: </label>
            <select id="category-filter" onchange="filterProducts()">
                <option value="all">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="fashion">Fashion</option>
                <option value="home-garden">Home & Garden</option>
                <option value="sports">Sports</option>
                <option value="beauty">Beauty</option>
            </select>
        </div>
        <div>
            <label for="price-filter">Filter by Price: </label>
            <input type="number" id="price-filter" placeholder="Max Price" oninput="filterProducts()">
        </div>
    </div>

    <!-- Product Grid -->
    <div class="product-grid" id="product-grid">
        <!-- Product 1 -->
        <div class="product-card" data-category="electronics" data-price="199.99">
            <img src="./Images/electronics1.jpg" alt="Product 1">
            <h3>Product Name 1</h3>
            <p>Category: Electronics</p>
            <p class="price">$199.99</p>
            <button class="more-info-btn" onclick="openModal('Product Name 1', 'Electronics', 'This is a detailed description of Product 1.', '199.99', './Images/electronics1.jpg')">More Info</button>
        </div>

        <!-- Product 2 -->
        <div class="product-card" data-category="fashion" data-price="49.99">
            <img src="./Images/fashion1.jpg" alt="Product 2">
            <h3>Product Name 2</h3>
            <p>Category: Fashion</p>
            <p class="price">$49.99</p>
            <button class="more-info-btn" onclick="openModal('Product Name 2', 'Fashion', 'This is a detailed description of Product 2.', '49.99', './Images/fashion1.jpg')">More Info</button>
        </div>

        <!-- Product 3 -->
        <div class="product-card" data-category="home-garden" data-price="89.99">
            <img src="./Images/home-garden1.jpg" alt="Product 3">
            <h3>Product Name 3</h3>
            <p>Category: Home & Garden</p>
            <p class="price">$89.99</p>
            <button class="more-info-btn" onclick="openModal('Product Name 3', 'Home & Garden', 'This is a detailed description of Product 3.', '89.99', './Images/home-garden1.jpg')">More Info</button>
        </div>

        <!-- Product 4 -->
        <div class="product-card" data-category="sports" data-price="59.99">
            <img src="./Images/sports1.jpg" alt="Product 4">
            <h3>Product Name 4</h3>
            <p>Category: Sports</p>
            <p class="price">$59.99</p>
            <button class="more-info-btn" onclick="openModal('Product Name 4', 'Sports', 'This is a detailed description of Product 4.', '59.99', './Images/sports1.jpg')">More Info</button>
        </div>

        <!-- Product 5 -->
        <div class="product-card" data-category="beauty" data-price="29.99">
            <img src="./Images/beauty pack.jpg" alt="Product 5">
            <h3>Product Name 5</h3>
            <p>Category: Beauty</p>
            <p class="price">$29.99</p>
            <button class="more-info-btn" onclick="openModal('Product Name 5', 'Beauty', 'This is a detailed description of Product 5.', '29.99', './Images/beauty pack.jpg')">More Info</button>
        </div>
    </div>

    <!-- Modal -->
    <div id="product-modal" class="modal">
        <div class="modal-content">
            <div class="modal-inner">
                <div class="modal-image">
                    <img id="modal-image" src="" alt="Product Image" style="width:100%; height:auto;">
                </div>
                <div class="modal-details">
                    <h2 id="modal-title"></h2>
                    <p id="modal-category"></p>
                    <p id="modal-description"></p>
                    <p id="modal-price"></p>
                    <button class="btn add-to-cart-btn">Add to Cart</button>
                    <button class="btn buy-now-btn">Buy Now</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to open modal with product details
        function openModal(productName, productCategory, productDescription, productPrice, productImage) {
            // Get modal elements
            var modal = document.getElementById('product-modal');
            var modalTitle = document.getElementById('modal-title');
            var modalCategory = document.getElementById('modal-category');
            var modalDescription = document.getElementById('modal-description');
            var modalPrice = document.getElementById('modal-price');
            var modalImage = document.getElementById('modal-image');

            // Set product name, category, description, price, and image
            modalTitle.innerText = productName;
            modalCategory.innerText = 'Category: ' + productCategory;
            modalDescription.innerText = productDescription;
            modalPrice.innerText = 'Price: $' + productPrice;
            modalImage.src = productImage;

            // Display the modal
            modal.style.display = 'block';
        }

        // Function to filter products
        function filterProducts() {
            var categoryFilter = document.getElementById('category-filter').value;
            var priceFilter = document.getElementById('price-filter').value;

            var productCards = document.querySelectorAll('.product-card');

            productCards.forEach(card => {
                var cardCategory = card.getAttribute('data-category');
                var cardPrice = parseFloat(card.getAttribute('data-price'));

                var categoryMatch = (categoryFilter === 'all' || cardCategory === categoryFilter);
                var priceMatch = (priceFilter === '' || cardPrice <= parseFloat(priceFilter));

                if (categoryMatch && priceMatch) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }

        // Close modal when clicking outside of it
        window.onclick = function (event) {
            var modal = document.getElementById('product-modal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>
