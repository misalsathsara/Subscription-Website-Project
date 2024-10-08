<?php
  include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fancy SubscriBuy Items</title>
    <!-- Link to Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            
        }
        #card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 15px;
            width: 280px;
            display: inline-block;
            text-align: center;
            transition: transform 0.2s ease;
            position: relative;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .star-rating {
            color: #FFD700;
            font-size: 20px;
            margin: 10px 0;
        }

        .btn {
            padding: 10px 15px;
            margin: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .btn i {
            margin-right: 5px;
        }

        .btn:hover {
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
            z-index: 999;
            animation: fadeIn 0.4s ease-in-out;
        }

        .modal {
            display: none;
            position: fixed;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            border: 2px solid #ccc;
            width: 60%;
            height: 70%;
            max-width: 1000px;
            z-index: 1000;
            justify-content: center;
    align-items: center;
            
            
        }

        .modal.active {
            display: block;
        }

        .modal-header, .modal-footer {
            display: flex;
            justify-content: space-between;
        }

        .modal-content {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            animation: fadeIn 0.4s ease-in-out;
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

        .modal-content .column {
            width: 100%;
            margin: 5px;
           
        }

        .modal-content img {
            width: 20%;
            height: auto;
            border-radius: 10px;
        }

        .reviews {
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 10px;
        }

        .details {
            padding: 10px;
        }

        .buttons {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
        }

        .btn-buy, .btn-add {
            background-color: #28a745;
        }

        .btn-buy:hover, .btn-add:hover {
            background-color: #218838;
        }

        .btn-wishlist {
            background-color: #ffc107;
        }

        .btn-wishlist:hover {
            background-color: #e0a800;
        }
    </style>
</head>
<body>

    <div id="card-container"></div>

    <!-- Modal Overlay -->
    <div id="modal-overlay"></div>

    <!-- Modal -->
    <div id="itemModal" class="modal">
        <div class="modal-header">
            <h2>Item Details</h2>
            <button class="btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-content">
            <!-- Column 1: Image and Reviews -->
            <div class="column">
                <img id="modalImage" src="" alt="Item Image">
                <div id="reviews" class="reviews">
                    <h4>Customer Reviews</h4>
                    <!-- Reviews will be inserted here by JavaScript -->
                </div>
            </div>

            <!-- Column 2: Item Details -->
            <div class="column-details">
                <h3 id="modalName"></h3>
                <p id="modalDescription"></p>
                <p><strong>Price: </strong>$<span id="modalPrice"></span></p>
                <p><strong>Type: </strong><span id="modalType"></span></p>

                <div class="buttons">
                    <button class="btn btn-add"><i class="fas fa-cart-plus"></i>Add to Cart</button>
                    <button class="btn btn-buy"><i class="fas fa-shopping-bag"></i>Buy Now</button>
                </div>
            </div>
        </div>
    </div>

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

                        const name = document.createElement('h2');
                        name.textContent = item.name;

                        const stars = document.createElement('div');
                        stars.classList.add('star-rating');
                        stars.innerHTML = '★'.repeat(Math.round(item.avg_rating)) + '☆'.repeat(5 - Math.round(item.avg_rating));

                        const price = document.createElement('p');
                        price.textContent = `Price: $${item.price}`;

                        const moreInfoBtn = document.createElement('button');
                        moreInfoBtn.classList.add('btn');
                        moreInfoBtn.innerHTML = '<i class="fas fa-info-circle"></i> ';
                        moreInfoBtn.onclick = () => openModal(item);

                        const addToCartBtn = document.createElement('button');
                        addToCartBtn.classList.add('btn');
                        addToCartBtn.innerHTML = '<i class="fas fa-cart-plus"></i>';

                        const addToWishlistBtn = document.createElement('button');
                        addToWishlistBtn.classList.add('btn');
                        addToWishlistBtn.innerHTML = '<i class="fas fa-heart"></i>';

                        card.appendChild(img);
                        card.appendChild(name);
                        card.appendChild(stars);
                        card.appendChild(price);
                        card.appendChild(moreInfoBtn);
                        card.appendChild(addToCartBtn);
                        card.appendChild(addToWishlistBtn);

                        cardContainer.appendChild(card);
                    });
                });
        }

        function openModal(item) {
            const modal = document.getElementById('itemModal');
            const overlay = document.getElementById('modal-overlay');

            document.getElementById('modalImage').src ='admin/' + item.image;
            document.getElementById('modalName').textContent = item.name;
            document.getElementById('modalDescription').textContent = item.description;
            document.getElementById('modalPrice').textContent = item.price;
            document.getElementById('modalType').textContent = item.type;

            const reviewsContainer = document.getElementById('reviews');
            reviewsContainer.innerHTML = ''; // Clear existing reviews

            if (item.reviews.length > 0) {
                item.reviews.forEach(review => {
                    const reviewDiv = document.createElement('div');
                    reviewDiv.innerHTML = `<strong>${review.c_id}</strong> rated ${'★'.repeat(review.rating)}: ${review.review_description}`;
                    reviewsContainer.appendChild(reviewDiv);
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

        //setInterval(fetchItems, 5000);
        fetchItems(); // Initial call
    </script>

</body>
</html>
