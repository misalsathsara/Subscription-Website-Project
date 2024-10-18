<!-- Footer Start -->
<footer class="py-5 footer" style="background-color: #ffffff; color: #003366;">
    <div class="container">
        <div class="row gy-4 text-center">
            <div class="col-6">
                <!-- About Company -->
                <div class=" col-12 d-flex flex-column align-items-center">
                    <div class="mb-4">
                        <a class="navbar-brand" href="#"
                            style="color: #003366; font-weight: bold; font-size: 1.5rem; text-decoration: none;">SubscriBuy</a>
                    </div>
                    <p class="mb-4" style="color: #6c757d; font-size: 1.5rem; line-height: 1.6; padding-bottom: 70px">
                        SubscriBuy connects founders and marketers with experienced mentors who genuinely enjoy helping
                        others succeed.
                    </p>
                    <!-- Social Media Icons -->
                    <div class="fs-4 d-flex justify-content-center gap-3">
                        <a href="#!" class="text-primary" style="font-size: 1.5rem;">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#!" class="text-primary" style="font-size: 1.5rem;">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#!" class="text-primary" style="font-size: 1.5rem;">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#!" class="text-primary" style="font-size: 1.5rem;">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="map-container">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158786.11820556315!2d80.23346309839567!3d7.873054974239631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae259b9d0905fb9%3A0x8c1bcd6d6cbd2fd7!2sSri%20Lanka!5e0!3m2!1sen!2sus!4v1630604520588!5m2!1sen!2sus"
                        loading="lazy"></iframe>
                </div>
            </div>

        </div>
        <!-- Support Links -->
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <ul class="list-unstyled d-flex gap-4 mb-0 align-items-center">
                    <li class="support"><a href="#" class="text-dark"
                            style="text-decoration: none; transition: color 0.3s;">FAQ</a></li>
                    <li class="support"><a href="contact.php" class="text-dark"
                            style="text-decoration: none; transition: color 0.3s;">Contact</a></li>
                    <li class="support"><a href="#" class="text-dark"
                            style="text-decoration: none; transition: color 0.3s;">Help Centre</a></li>
                    <li class="support"><a href="#" class="text-dark"
                            style="text-decoration: none; transition: color 0.3s;">Join Community</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="row mt-lg-7 mt-5 text-center">
            <div class="col-12">
                <span style="color: #6c757d; font-size: 0.9rem;">
                    ©
                    <span id="copyright2" class="me-2">
                        <script>
                        document.getElementById("copyright2").appendChild(document.createTextNode(new Date()
                            .getFullYear()));
                        </script>
                    </span>
                    SubscriBuy. All Rights Reserved.
                </span>
            </div>
        </div>
    </div>
</footer>

<style>
/* Ensure the support links are aligned to the right */
.col-lg-4.d-flex.justify-content-end {
    text-align: right;
}

/* Ensure list items are displayed in a row */
.list-unstyled {
    margin: 0;
    padding: 0;
}

.list-unstyled>li {
    display: inline;
}

.support {
    padding-right: 20px;
    /* Adjust spacing between items */
}

/* Hover effects */
.support a:hover {
    color: #003366;
    font-weight: bold;
    transition: color 0.3s ease, font-weight 0.3s ease;
}

/* Map container style */
.map-container {
    position: relative;
    /* padding-bottom: 56.25%;  */
    height: 300px;
    /* Use padding for aspect ratio */
    width: 100%;
    /* Responsive width */
    max-width: 100%;
    /* Ensure it doesn't exceed its parent */
    background: #eee;
    overflow: hidden;
    /* Hide anything outside the container */
}

.map-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    /* Remove default border */
}

/* Footer Padding */
.footer {
    padding-top: 3rem;
    /* Adjust top padding */
    padding-bottom: 3rem;
    /* Adjust bottom padding */
}

/* Adjust text size if needed */
.footer p {
    font-size: 1.2rem;
    /* Smaller font size */
}

/* Adjust the spacing in social media icons */
.fs-4 .fa {
    font-size: 1.2rem;
    /* Smaller icons */
}

/* Adjust support links spacing */
.support {
    padding-right: 15px;
    /* Reduced spacing between items */
}
</style>
<!-- Footer End -->




<script src="home.js"></script>
<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>

</html>