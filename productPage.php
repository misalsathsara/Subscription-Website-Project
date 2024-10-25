<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // If the user is logged in, include header2.php
    include('header2.php');
} else {
    // If the user is not logged in, include header.php
    include('header.php');
}
?>

    <style>

        #filter-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        #filter-container select, #filter-container input, .btn-filter {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 150px;
        }

        .btn-filter {
            background-color: #28a745;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-filter:hover {
            background-color: #218838;
        }

        #card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            padding: 20px;
            gap: 20px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            max-width: 280px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            border-radius: 10px;
            width: 280px;
            height: 200px;
            object-fit: cover;
            padding: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .star-rating {
            color: #FFD700;
            font-size: 18px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            padding: 10px 20px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-cart, .btn-wishlist {
            background-color: #007bff;
            color: white;
        }

        .btn-cart:hover, .btn-wishlist:hover {
            background-color: #0056b3;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .btn-wishlist {
            background-color: #ffc107;
            color: white;
        }

        .btn-wishlist:hover {
            background-color: #e0a800;
        }

    </style>

<?php include('product_banner.php'); ?>

<!-- Filter Section -->
<div id="filter-container">
    <select id="categoryFilter">
        <option value="">All Categories</option>
        <option value="electronic">Electronic</option>
        <option value="beauty">Beauty</option>
        <option value="home appliance">Home Appliance</option>
    </select>
    <input type="number" id="minPrice" placeholder="Min Price">
    <input type="number" id="maxPrice" placeholder="Max Price">
    <button class="btn-filter" onclick="applyFilters()">Apply Filters</button>
</div>

<div id="card-container"></div>


<?php include('footer.php'); ?>

<script>
// Fetch all items when the page loads
document.addEventListener('DOMContentLoaded', () => {
    fetchItems(); // Fetch all items on load
});

function fetchItems(category = '', minPrice = '', maxPrice = '') {
    fetch(`fetch_items.php?category=${category}&minPrice=${minPrice}&maxPrice=${maxPrice}`)
        .then(response => response.json())
        .then(data => {
            const cardContainer = document.getElementById('card-container');
            cardContainer.innerHTML = ''; // Clear existing cards

            if (data.length === 0) {
                cardContainer.innerHTML = '<p>No items found.</p>';
                return;
            }

            data.forEach(item => {
                const card = document.createElement('div');
                card.classList.add('card');

                const img = document.createElement('img');
                img.src = 'admin/' + item.image;
                img.alt = item.name;

                const cardBody = document.createElement('div');
                cardBody.classList.add('card-body');

                const name = document.createElement('h2');
                name.classList.add('card-title');
                name.textContent = item.name;

                const stars = document.createElement('div');
                stars.classList.add('star-rating');
                stars.innerHTML = '★'.repeat(Math.round(item.avg_rating)) + '☆'.repeat(5 - Math.round(item.avg_rating));

                const price = document.createElement('p');
                price.classList.add('card-text');
                price.textContent = `Price: $${item.price}`;

                const moreInfoBtn = document.createElement('button');
                moreInfoBtn.classList.add('btn', 'btn-cart');
                moreInfoBtn.innerHTML = '<i class="fas fa-info-circle"></i>';
                moreInfoBtn.onclick = () => window.location.href = `itemDetail.php?n_id=${item.n_id}`;

                const addToCartBtn = document.createElement('button');
                addToCartBtn.classList.add('btn', 'btn-cart');
                addToCartBtn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                addToCartBtn.onclick = () => alert('Added to cart')
                
                const addToWishlistBtn = document.createElement('button');
                addToWishlistBtn.classList.add('btn', 'btn-wishlist');
                addToWishlistBtn.innerHTML = '<i class="fas fa-heart"></i>';

                cardBody.appendChild(name);
                cardBody.appendChild(stars);
                cardBody.appendChild(price);
                cardBody.appendChild(moreInfoBtn);
                cardBody.appendChild(addToCartBtn);
                cardBody.appendChild(addToWishlistBtn);
                card.appendChild(img);
                card.appendChild(cardBody);

                cardContainer.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching items:', error);
        });
}

function applyFilters() {
    const category = document.getElementById('categoryFilter').value;
    const minPrice = document.getElementById('minPrice').value;
    const maxPrice = document.getElementById('maxPrice').value;

    fetchItems(category, minPrice, maxPrice);
}


function openModal(item) {
    const modal = document.getElementById('itemModal');
    const overlay = document.getElementById('modal-overlay');

    document.getElementById('modalImage').src = 'admin/' + item.image;
    document.getElementById('modalName').textContent = item.name;
    document.getElementById('modalDescription').textContent = item.description;
    document.getElementById('modalPrice').textContent = item.price;
    document.getElementById('modalType').textContent = item.type;

    const reviewsContainer = document.getElementById('reviews');
reviewsContainer.innerHTML = ''; // Clear existing reviews

if (item.reviews.length > 0) {
    const ratingHtml = `<p><strong>Rating: ${item.avg_rating}/5</strong></p>`;
    reviewsContainer.innerHTML += ratingHtml;

    item.reviews.forEach(review => {
        const reviewHtml = `<p>${review.c_id} rated: <span style="color: #FFD700">${'★'.repeat(review.rating)}</span> :<br> ${review.review_description}</p>`;
        reviewsContainer.innerHTML += reviewHtml;
    });
} else {
    reviewsContainer.innerHTML = '<p>No reviews yet</p>';
}
    modal.classList.add('active');
    overlay.style.display = 'block'; // Show overlay
}

</script>
