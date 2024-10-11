<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy SubscriBuy Items</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
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
    width: 280px; /* Set the width to 100% to make it responsive */
    height: 200px; /* Set a fixed height for the image */
    object-fit: cover; /* Scale the image to cover the entire area */
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

        .btn i {
            margin-right: 5px;
        }

        .btn-cart, .btn-wishlist {
            background-color: #007bff;
            color: white;
        }

        .btn-cart:hover, .btn-wishlist:hover {
            background-color: #0056b3;
        }

        /* Modal Styles */
        #modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* z-index: ; */
            animation: fadeIn 0.4s ease-in-out;
        }

        .modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 10px;
            padding: 2px;
            border: 2px solid #ccc;
            width: 70%;
            max-width: 800px;
            height: 90%;
        }

        .modal.active {
            display: block;
        }

        .modal-header, .modal-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal img {
            width: 100%; /* Adjusted for responsiveness */
            height: auto;
            border-radius: 10px;
        }

        .buttons {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .btn-buy {
            background-color: #28a745;
            color: white;
        }

        .btn-buy:hover {
            background-color: #218838;
        }

        .btn-wishlist {
            background-color: #ffc107;
            color: white;
        }

        .btn-wishlist:hover {
            background-color: #e0a800;
        }

        .modal-content {
    /* overflow-y: auto; */
    border: white;
    max-height: 70vh; /* adjust the max height as needed */
    padding: 20px;
    /* border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
}

/* .modal-content::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

.modal-content::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 10px;
}

.modal-content::-webkit-scrollbar-track {
    background-color: #f0f0f0;
    border-radius: 10px;
} */
        .modal-content .row {
            flex-grow: 1;
            display: flex;
            flex-wrap: wrap;
        }

        .modal-content .col-md-6 {
            flex-basis: 50%;
            padding: 5px 5px 20px 5px;
        }

        .modal-content .col-md-6 img {
            width: 300px; /* Set the width to 30% of the viewport width */
            height: 300px; /* Set the height to 20% of the viewport height */
            object-fit: cover; /* Scale the image to cover the entire area */
            border-radius: 10px;
            border-radius: 10px;
        }

        #reviews {
    overflow-y: auto;
    max-height: 200px; /* adjust the max height as needed */
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

#reviews::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

#reviews::-webkit-scrollbar-thumb {
    background-color: #ccc;
    border-radius: 10px;
}

#reviews::-webkit-scrollbar-track {
    background-color: #f0f0f0;
    border-radius: 10px;
}


        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
</head>
<body>

    <div id="card-container"></div>

   
    <!-- Modal Overlay -->
    <div id="modal-overlay"></div>

    <!-- ... (rest of the HTML remains the same) ... -->

<div id="itemModal" class="modal">
    <div class="modal-header">
        <h2>Item Details</h2>
        <button class="btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-content">
        <div class="row">
            <div class="col-md-6">
                <img id="modalImage" src="" alt="Item Image" class="img-fluid">
                <div id="reviews" class="reviews mt-3">
                    <h4>Customer Reviews</h4>
                    <!-- Reviews will be inserted here -->
                </div>
            </div>
            <div class="col-md-6">
                <h3 id="modalName"></h3>
                <p id="modalDescription"></p>
                <p><strong>Price: </strong>$<span id="modalPrice"></span></p>
                <p><strong>Type: </strong><span id="modalType"></span></p>
                <div class="buttons">
                    <button class="btn btn-add"><i class="fas fa-cart-plus"></i> Add to Cart</button>
                    <button class="btn btn-buy"><i class="fas fa-shopping-bag"></i> Buy Now</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ... (rest of the HTML remains the same) ... -->
    <script>
        function fetchItems() {
            fetch('fetch_items.php')
                .then(response => response.json())
                .then(data => {
                    const cardContainer = document.getElementById('card-container');
                    cardContainer.innerHTML = ''; // Clear existing cards

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
                        moreInfoBtn.onclick = () => openModal(item);

                        const addToCartBtn = document.createElement('button');
                        addToCartBtn.classList.add('btn', 'btn-cart');
                        addToCartBtn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                        addToCartBtn.onclick = () => alert('Added to cart');

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
                });
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
        function closeModal() {
            const modal = document.getElementById('itemModal');
            const overlay = document.getElementById('modal-overlay');
            modal.classList.remove('active');
            overlay.style.display = 'none'; // Hide overlay
        }

        // Fetch items on page load
        document.addEventListener('DOMContentLoaded', fetchItems);
    </script>
</body>
</html>
