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