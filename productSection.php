<!-- Trending Products Section Start -->
<div class="container mt-5 position-relative">
    <h2 class="text-center display-4 fw-bold text-primary section-heading" style="font-weight: 900;">Products</h2>
    <div class="divider mb-4"></div>

    <!-- See More Button -->
    <div class="see-more-button1 position-absolute top-0 end-0 mt-3 me-3">
        <a href="productPage.php" class="btn btn-outline-primary btn-hover-effect">See More</a>
    </div>
</div>

<div class="container my-5">
    <div class="row" id="card-container-2"></div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Fetch all items when the page loads
    document.addEventListener('DOMContentLoaded', () => {
        fetchItems(); // Fetch all items on load
    });

    function fetchItems(category = '', minPrice = '', maxPrice = '') {
        fetch(`productSectionFetch.php?category=${category}&minPrice=${minPrice}&maxPrice=${maxPrice}`)
            .then(response => response.json())
            .then(data => {
                const cardContainer = document.getElementById('card-container-2');
                cardContainer.innerHTML = ''; // Clear existing cards

                if (data.length === 0) {
                    cardContainer.innerHTML = '<p class="text-center">No items found.</p>';
                    return;
                }

                // Limit to 4 items
                const limitedItems = data.slice(0, 4);

                limitedItems.forEach(item => {
                    const cardCol = document.createElement('div');
                    cardCol.classList.add('col-lg-3', 'col-md-4', 'col-sm-6', 'mb-5', 'd-flex', 'justify-content-center');

                    const card = document.createElement('div');
                    card.classList.add('card', 'fancy-card', 'border-0', 'rounded', 'overflow-hidden', 'shadow-sm', 'text-center');

                    card.addEventListener('mouseover', () => {
                        card.style.transform = 'translateY(-8px)';
                        card.style.boxShadow = '0 20px 40px rgba(0, 0, 0, 0.2)';
                    });

                    card.addEventListener('mouseout', () => {
                        card.style.transform = 'translateY(0)';
                        card.style.boxShadow = '0 10px 20px rgba(0, 0, 0, 0.1)';
                    });

                    const imgWrapper = document.createElement('div');
                    imgWrapper.classList.add('card-img-wrapper', 'position-relative');

                    const img = document.createElement('img');
                    img.src = 'admin/' + item.image;
                    img.alt = item.name;
                    img.classList.add('card-img-top', 'fancy-card-img');
                    img.style.objectFit = 'cover';

                    const overlay = document.createElement('div');
                    overlay.classList.add('card-img-overlay', 'd-flex', 'justify-content-center', 'align-items-center', 'overlay-effect');
                    overlay.innerHTML = '<i class="fas fa-search fa-2x text-white"></i>';
                    overlay.style.opacity = '0';
                    overlay.style.transition = 'opacity 0.4s ease';

                    imgWrapper.addEventListener('mouseover', () => {
                        overlay.style.opacity = '1';
                    });

                    imgWrapper.addEventListener('mouseout', () => {
                        overlay.style.opacity = '0';
                    });

                    imgWrapper.appendChild(img);
                    imgWrapper.appendChild(overlay);

                    const cardBody = document.createElement('div');
                    cardBody.classList.add('card-body', 'px-4', 'py-3');

                    const name = document.createElement('h5');
                    name.classList.add('card-title', 'mb-2', 'text-truncate', 'fancy-title');
                    name.textContent = item.name;

                    const stars = document.createElement('div');
                    stars.classList.add('star-rating', 'mb-3');
                    stars.innerHTML = '★'.repeat(Math.round(item.avg_rating)) + '☆'.repeat(5 - Math.round(item.avg_rating));

                    const price = document.createElement('p');
                    price.classList.add('card-text', 'text-gradient', 'fw-bold');
                    price.textContent = `Price: LKR ${item.price}`;

                    const buttonGroup = document.createElement('div');
                    buttonGroup.classList.add('d-flex', 'justify-content-around', 'mt-3');

                    const moreInfoBtn = document.createElement('button');
                    moreInfoBtn.classList.add('btn', 'btn-outline-primary', 'btn-sm', 'fancy-btn');
                    moreInfoBtn.style.margin = '0 5px'; // Add margin for spacing
                    moreInfoBtn.innerHTML = '<i class="fas fa-info-circle"></i>';
                    moreInfoBtn.onclick = () => window.location.href = `itemDetail.php?n_id=${item.n_id}`;

                    const addToCartBtn = document.createElement('button');
                    addToCartBtn.classList.add('btn', 'btn-outline-success', 'btn-sm', 'fancy-btn');
                    addToCartBtn.style.margin = '0 5px'; // Add margin for spacing
                    addToCartBtn.innerHTML = '<i class="fas fa-cart-plus"></i>';
                    addToCartBtn.onclick = () => handleAddToCart(item.n_id);

                    const addToWishlistBtn = document.createElement('button');
                    addToWishlistBtn.classList.add('btn', 'btn-outline-danger', 'btn-sm', 'fancy-btn');
                    addToWishlistBtn.style.margin = '0 5px'; // Add margin for spacing
                    addToWishlistBtn.innerHTML = '<i class="fas fa-heart"></i>';
                    addToWishlistBtn.onclick = () => handleAddToWishlist(item.n_id);

                    buttonGroup.appendChild(moreInfoBtn);
                    buttonGroup.appendChild(addToCartBtn);
                    buttonGroup.appendChild(addToWishlistBtn);

                    cardBody.appendChild(name);
                    cardBody.appendChild(stars);
                    cardBody.appendChild(price);
                    cardBody.appendChild(buttonGroup);
                    card.appendChild(imgWrapper);
                    card.appendChild(cardBody);

                    cardCol.appendChild(card);
                    cardContainer.appendChild(cardCol);
                });
            })
            .catch(error => {
                console.error('Error fetching items:', error);
            });
    }

    function handleAddToCart(n_id) {
        <?php if (!isset($_SESSION['username'])) { ?>
            showAlert('You need to log in to add items to your cart!');
        <?php } else { ?>
            $.ajax({
                url: 'add_to_cart.php',
                type: 'POST',
                data: { n_id: n_id },
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert('Added to cart');
                    } else {
                        showAlert(response.error);
                    }
                },
                error: function() {
                    showAlert('An unexpected error occurred. Please try again later.');
                }
            });
        <?php } ?>
    }

    function handleAddToWishlist(n_id) {
        <?php if (!isset($_SESSION['username'])) { ?>
            showAlert('You need to log in to add items to your wishlist!');
        <?php } else { ?>
            $.ajax({
                url: 'add_to_wishlist.php',
                type: 'POST',
                data: { n_id: n_id },
                success: function(response) {
                    if (response.success) {
                        showSuccessAlert('Added to wishlist');
                    } else {
                        showAlert(response.error);
                    }
                },
                error: function() {
                    showAlert('An unexpected error occurred. Please try again later.');
                }
            });
        <?php } ?>
    }

    function showAlert(message) {
        swal({
            title: "Warning",
            text: message,
            icon: "warning",
            button: "OK",
        });
    }

    function showSuccessAlert(message) {
        swal({
            title: "Success",
            text: message,
            icon: "success",
            button: "OK",
        });
    }
</script>

<style>
    /* Modern Fancy Card Styles */
    .fancy-card {
        transition: transform 0.5s ease, box-shadow 0.5s ease;
        border-radius: 15px;
        overflow: hidden;
        background: #ffffff;
    }

    .fancy-card-img {
        height: 250px;
        width: 350px;
        transition: transform 0.5s ease-in-out;
        filter: brightness(95%);
    }

    .card-img-wrapper:hover .fancy-card-img {
        transform: scale(1.08);
        filter: brightness(100%);
    }

    .overlay-effect {
        background-color: rgba(0, 0, 0, 0.4);
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: opacity 0.5s ease;
    }

    .fancy-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .star-rating {
        color: gold;
        font-size: 1.2rem;
    }

    .fancy-btn {
        width: 100%;
        border-radius: 25px;
    }

    .fancy-select, .fancy-input {
        border-radius: 25px;
    }

    .filter-container {
        background-color: #f8f9fa;
        border-radius: 15px;
    }
</style>

<style>
    .see-more-button1 {
        position: absolute;
        top: 0;
        right: 0;
    }

    .btn-hover-effect {
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .btn-hover-effect:hover {
        background-color: #0056b3;
        color: #fff;
    }
</style>
<!-- Trending Products Section End -->
