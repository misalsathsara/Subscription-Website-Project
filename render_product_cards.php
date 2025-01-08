<!-- render_product_cards.php -->
<?php
// Assuming you have already fetched the products into the $data array

if (!empty($data)) {
    foreach ($data as $item) {
        include('product_card.php');
    }
} else {
    echo '<p class="text-center">No items found.</p>';
}
?>