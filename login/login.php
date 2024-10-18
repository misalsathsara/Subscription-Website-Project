<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // If the user is logged in, include header2.php
    include('../index.php');
} else {
    // If the user is not logged in, include header.php
    include('../header.php');
}
?>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container p-4 rounded shadow-lg bg-white text-center">
            <div class="illustration mb-4">
                <img src="p2.jpg" alt="Illustration" class="img-fluid" style="max-width: 120px;">
            </div>
            <h2 class="text-primary mb-4">WELCOME</h2>
            <form action="" method="POST" id="lform">
                <div class="form-group">
                    <input type="text" class="form-control rounded-pill" placeholder="Username" name="username" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-pill" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block rounded-pill mt-3">LOGIN</button>

                <p class="forgot-password mt-3"><a href="#" class="text-secondary">Forgot Password?</a></p>
                <p class="register mt-2">Haven't an Account Yet? <a href="regform.php" class="text-primary">Register Now</a></p>

                <div class="formdata mt-4" id='formdata'></div>
            </form>
        </div>
    </div>

    <?php
  include '../footer.php';
?>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#lform").submit(function (event) {
                event.preventDefault();  // Prevent the default form submission

                var vals = $(":input").map(function () {
                    return $(this).val();
                }).get();

                $.ajax({
                    type: 'post',
                    data: {
                        var1: vals
                    },
                    url: 'loginsave.php',
                    dataType: 'json',  // Expect JSON response
                    success: function (response) {
                        if (response.status === 'success') {
                            // Redirect to index page
                            window.location.href = '../index.php';
                        } else {
                            // Show error message
                            $('#formdata').html('<p style="color: red;">' + response.message + '</p>');
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log("Request failed: " + textStatus + ", " + errorThrown);
                    }
                });
            });
        });
    </script>

</body>

</html>
