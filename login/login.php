<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    background-color: #f0f0f0; /* Light background */
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh; /* Full viewport height */
}

.login-container {
    background: white;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 30px;
    width: 350px; /* Width of the form */
    text-align: center; /* Center text */
    position: relative;
}

.illustration {
    position: absolute;
    top: -60px; /* Positioning of the illustration */
    left: 50%;
    transform: translateX(-50%);
}

.illustration img {
    width: 120px; /* Size of the illustration */
}

h2 {
    margin: 40px 0 20px; /* Space around heading */
    font-size: 24px; /* Font size for heading */
    color: #333; /* Color of heading text */
}

input[type="text"],
input[type="password"] {
    width: 100%; /* Full width */
    padding: 10px; /* Padding for inputs */
    margin: 10px 0; /* Space around inputs */
    border: 1px solid #ddd; /* Light border */
    border-radius: 5px; /* Rounded corners */
    font-size: 16px; /* Font size */
}

button {
    width: 100%; /* Full width */
    padding: 10px; /* Padding for button */
    margin: 10px 0; /* Space around button */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    background-color: #4caf50; /* Green background */
    color: white; /* Text color */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s; /* Smooth transition for hover effect */
}

button:hover {
    background-color: #45a049; /* Darker green on hover */
}

.forgot-password {
    margin-top: 10px; /* Space above the link */
}

.forgot-password a {
    text-decoration: none; /* No underline for the link */
    color: #4caf50; /* Link color */
    font-size: 14px; /* Font size */
}


    </style>
</head>
<body>
<div class="login-container">   

  <div class="illustration">
    <img src="p2.jpg" alt="Illustration">
  </div>
  <h2>WELCOME</h2>
  <form action="" method="POST" id="lform">
    <input type="text" placeholder="Username" name="username" required>
    <input type="password" placeholder="Password" name="password" required>   

    <button type="submit">LOGIN</button>
    <p class="forgot-password"><a href="#">Forgot Password?</a></p>
  </form>   

</div>

<script src="script.js"></script>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<script type="text/javascript">
$(document).ready(function() {
    $("#lform").submit(function(event) {
        event.preventDefault();
        // alert("test 1...");
        var vals = $(":input").map(function() {
            return $(this).val();
        }).get();

        $.ajax({
            type: 'post',
            data: {
                var1: vals
            },
            url: 'loginsave.php',
    success: function(json) {
        console.log("Request successful");  // Debug message
        $('#formdata').html(json);
        // window.location.reload();
        
    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log("Request failed: " + textStatus + ", " + errorThrown);
        
    }
  
        });
    });
});
</script>

</html>