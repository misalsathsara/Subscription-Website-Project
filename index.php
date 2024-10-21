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