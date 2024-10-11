<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #6ab1d7, #33d9b2);
        }

        .login-container {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            animation: fadeIn 1s ease-out;
        }

        .login-container h2 {
            color: #333;
            margin-bottom: 20px;
            animation: slideIn 1s ease-in-out;
        }

        .illustration img {
            max-width: 100px;
            margin-bottom: 20px;
            animation: floatImage 2s infinite ease-in-out;
        }

        .login-container input {
            width: 94%;
            padding: 15px;
            margin: 10px 0;
            border: 2px solid #33d9b2;
            border-radius: 25px;
            outline: none;
            transition: all 0.3s ease;
          
            
        }

        .login-container input:focus {
            border-color: #6ab1d7;
            box-shadow: 0 0 10px rgba(33, 150, 243, 0.5);
        }

        .login-container button {
            width: 100%;
            padding: 15px;
            border: none;
            background-color: #33d9b2;
            color: white;
            font-size: 18px;
            border-radius: 25px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-container button:hover {
            background-color: #6ab1d7;
        }

        .forgot-password {
            margin-top: 15px;
            color: #555;
        }

        .forgot-password a {
            color: #33d9b2;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .forgot-password a:hover {
            color: #6ab1d7;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes floatImage {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
            100% {
                transform: translateY(0);
            }
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
    <div class="formdata" id='formdata'></div>
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
        event.preventDefault();  // Prevent the default form submission

        var vals = $(":input").map(function() {
            return $(this).val();
        }).get();

        $.ajax({
            type: 'post',
            data: {
                var1: vals
            },
            url: 'loginsave.php',
            dataType: 'json',  // Expect JSON response
            success: function(response) {
                if (response.status === 'success') {
                    // Redirect to index page
                    window.location.href = '../index.php';
                } else {
                    // Show error message
                    $('#formdata').html('<p style="color: red;">' + response.message + '</p>');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Request failed: " + textStatus + ", " + errorThrown);
            }
        });
    });
});

</script>

</html>