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
    <title>Contact Form</title>
    <link rel="stylesheet" href="contactStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.6); /* Black w/ opacity */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fefefe;
            border: 1px solid #888;
            border-radius: 10px;
            padding: 20px;
            width: 300px; /* Fixed width for the modal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .modal-header {
            font-size: 1.2em;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .modal-message {
            margin-bottom: 20px;
        }

        .modal-button {
            background-color: #4CAF50; /* Green */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        .modal-button:hover {
            background-color: #45a049; /* Darker green */
        }
    </style>
</head>

<body>
    <div class="contact-container">
        <div class="contact-left">
            <h2>Get in Touch</h2>
            <p>We are here to help you! How can we assist?</p>
            <form action="send-email2.php" method="POST">
                <input type="email" id="email" name="email" placeholder="Enter Your Email" required>
                <input type="text" id="subject" name="subject" placeholder="Enter Subject" required>
                <textarea id="message" name="message" rows="4" placeholder="Enter Your Message" required></textarea>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
        <div class="contact-right">
            <img src="images/contact.gif" alt="Helpdesk">
        </div>
    </div>

    <!-- Modal for Success/Error Message -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <div class="modal-header" id="modal-header">Success</div>
            <div class="modal-message" id="modal-message"></div>
            <button class="modal-button" id="modal-button">Close</button>
        </div>
    </div>

    <?php
    // Success/Error Message
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo '<script>document.getElementById("modal-message").innerText = "Your message has been sent successfully!";</script>';
            echo '<script>document.getElementById("modal").style.display = "flex";</script>';
        } elseif ($_GET['status'] == 'error') {
            echo '<script>document.getElementById("modal-header").innerText = "Error";</script>';
            echo '<script>document.getElementById("modal-message").innerText = "There was an error sending your message. Please try again.";</script>';
            echo '<script>document.getElementById("modal").style.display = "flex";</script>';
        }
    }
    ?>

    <script>
        // Close the modal when the user clicks on the close button
        document.getElementById("modal-button").onclick = function() {
            document.getElementById("modal").style.display = "none";
        }

        // Close the modal after 3 seconds
        setTimeout(() => {
            if (document.getElementById("modal").style.display === "flex") {
                document.getElementById("modal").style.display = "none";
            }
        }, 3000);
    </script>

    <script>
        // Close the modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            const modal = document.getElementById("modal");
            if (event.target === modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>

</html>

<?php
include 'footer.php';
?>
