<!-- product_card.php -->
<div class="col-lg-3 col-md-4 col-sm-6 mb-5 d-flex justify-content-center">
    <div class="card fancy-card border-0 rounded overflow-hidden shadow-sm text-center" style="transition: transform 0.5s ease, box-shadow 0.5s ease;">
        <div class="card-img-wrapper position-relative">
            <img src="admin/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>" class="card-img-top fancy-card-img" style="object-fit: cover; height: 250px;">
            <div class="card-img-overlay d-flex justify-content-center align-items-center overlay-effect" style="opacity: 0; transition: opacity 0.4s ease;">
                <i class="fas fa-search fa-2x text-white"></i>
            </div>
        </div>
        <div class="card-body px-4 py-3">
            <h5 class="card-title mb-2 text-truncate fancy-title"><?php echo $item['name']; ?></h5>
            <div class="star-rating mb-3">
                <?php echo '★'.str_repeat('☆', 5 - round($item['avg_rating'])); ?>
            </div>
            <p class="card-text text-gradient fw-bold">Price: $<?php echo $item['price']; ?></p>
            <div class="d-flex justify-content-around mt-3">
                <button class="btn btn-outline-primary btn-sm fancy-btn" onclick="window.location.href='itemDetail.php?n_id=<?php echo $item['n_id']; ?>'">
                    <i class="fas fa-info-circle"></i>
                </button>
                <button class="btn btn-outline-success btn-sm fancy-btn" onclick="addToCart('<?php echo $item['n_id']; ?>')">
                    <i class="fas fa-cart-plus"></i>
                </button>
                <button class="btn btn-outline-danger btn-sm fancy-btn" onclick="addToWishlist('<?php echo $item['n_id']; ?>')">
                    <i class="fas fa-heart"></i>
                </button>
            </div>
        </div>
    </div>
</div>
