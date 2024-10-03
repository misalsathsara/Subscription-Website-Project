<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="wrapper_container">
            <div class="container_col">
                <div class="contact_title xs_screen">
                    <h3>Get in Touch</h3>
                    <p>We are here to help you! How can we help?</p>
                </div>

                <!-- Bootstrap Alert div -->
                <div id="alertMessage" class="alert" style="display: none;"></div>
                <!-- form -->

                <form action="send-email2.php" class="contact_form" method="post">
                    <div class="contact_form_item">
                        <label for="">Email</label>
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                    </div>
                    <div class="contact_form_item">
                        <label for="">Subject</label>
                        <input type="text" name="subject" placeholder="Enter Subject" required>
                    </div>
                    <div class="contact_form_item">
                        <label for="">Message</label>
                        <textarea name="message" rows="5" placeholder="Enter your Message" required></textarea>
                    </div>
                    <button class="contact_form_submit" type="submit" name="submit">Submit</button>
                </form>
            </div>

            <div class="container_col">
                <div class="contact_title xm_screen">
                    <h3>Get in Touch</h3>
                    <p>We are here to help you! How can we help?</p>
                </div>
                <!-- animation -->
                <dotlottie-player 
                    src="https://lottie.host/8dc80182-463c-476b-9152-7197f9be3693/kjtQdBgGPg.json"
                    background="transparent" 
                    speed="1" 
                    loop 
                    autoplay>
                </dotlottie-player>
                <div class="contact_info_list">
                    <div class="contact_info_list_item">
                        <i class='bx bx-map'></i>
                        <p>Galle, Southern province, Sri Lanka</p>
                    </div>
                    <div class="contact_info_list_item">
                        <i class='bx bx-phone-call'></i>
                        <p><a href="tel:+9415681773">+9415681773</a></p>
                    </div>
                    <div class="contact_info_list_item">
                        <i class='bx bx-envelope'></i>
                        <p><a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript alert part based on URL -->
    <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            const alertDiv = document.getElementById('alertMessage');

            if (status === 'success') {
                // success alert
                alertDiv.className = 'alert alert-success';
                alertDiv.innerHTML = 'Success! Your message has been sent.';
                // Show the alert
                alertDiv.style.display = 'block';  
            } else if (status === 'error') {
                alertDiv.className = 'alert alert-danger';
                alertDiv.innerHTML = 'Error! There was an issue sending your message.';
                alertDiv.style.display = 'block';
            }
        };
    </script>
    
    <!-- Lottie player -->
    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
</body>
</html>
