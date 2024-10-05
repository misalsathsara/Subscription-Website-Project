<?php
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="contactStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="contact-container">
        <div class="contact-left">
            <h2>Get in Touch</h2>
            <p>We are here to help you! How can we assist?</p>
            <form action="#">
                <input type="email" id="email" placeholder="Enter Your Email" required>
                <input type="text" id="subject" placeholder="Enter Subject" required>
                <textarea id="message" rows="4" placeholder="Enter Your Message" required></textarea>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
        <div class="contact-right">
            <img src="images/contact.gif" alt="Helpdesk">
            <div class="contact-info">
                <p><i class="fas fa-map-marker-alt"></i> Galle, Southern Province, Sri Lanka</p>
                <p style="margin-right: 8px;"><i class="fas fa-phone-alt"></i> +9415681773</p>
                <p><i class="fas fa-envelope"></i> info@example.com</p>
            </div>
        </div>
    </div>
</body>

</html>

<?php
  include 'footer.php';
?>