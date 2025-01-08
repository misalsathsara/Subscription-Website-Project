<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {
  // If the user is logged in, include the logged-in header (header2.php)
  include('header2.php');
} else {
  // If the user is not logged in, include the default header (header.php)
  include('header.php');
}


?>



<style>
  /* Optional: Customize Toastr container position */
  .toast {
    margin: 5px;
    /* Add margin for spacing between toasts */
  }
</style>


<?php
include 'hero.php';
?>
<br><br>

<?php
include 'stat.php';
?>
<br><br>

<?php
include 'trendingProduct.php';
?>
<br><br>

<?php
include 'banner.php';
?>
<br><br>

<?php
include 'productSection.php';
?>
<br><br>

<?php
include 'testimonials.php';
?>
<br><br>

<?php
include 'faq.php';
?>
<br><br>

<?php
include 'bankContainer.php';
?>
<br><br>

<?php
include 'footer.php';
?>



<script>
  $(document).ready(function() {
    // Toastr configuration
    toastr.options.positionClass = 'toast-bottom-right'; // Set position to bottom-right

    // Check if there is a logout message in the session
    <?php if (isset($_SESSION['logout_message'])): ?>
      toastr.success("<?php echo $_SESSION['logout_message']; ?>");
      <?php unset($_SESSION['logout_message']); // Clear the message after displaying 
      ?>
    <?php endif; ?>

    // Check if there is a login success message in the session

  });
</script>