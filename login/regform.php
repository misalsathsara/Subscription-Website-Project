<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form with Country Codes</title>
    <style>
 @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

 body {
    background-color: #e0f7fa; /* Light blue background */
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.reg-container {
    background: linear-gradient(135deg, #ffffff 0%, #e3f2fd 100%); /* Gradient background */
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    animation: fadeIn 0.6s ease-in-out; /* Fade-in animation */
}

.title {
    text-align: center;
    color: #0277bd; /* Blue color for title */
    margin-bottom: 20px;
}

.form-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.input-field {
    flex: 1;
    margin-right: 10px;
}

.input-field:last-child {
    margin-right: 0;
}

.input-field label {
    display: block;
    margin-bottom: 5px;
    color: #555;
    font-weight: bold;
}

.input-field input,
.input-field select,
.input-field textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #81d4fa; /* Light blue border */
    border-radius: 5px;
    background-color: #f0f4c3; /* Light green background for inputs */
    transition: border-color 0.3s, box-shadow 0.3s; /* Transition for focus effect */
}

.input-field input:focus,
.input-field select:focus,
.input-field textarea:focus {
    border-color: #0288d1; /* Darker blue on focus */
    box-shadow: 0 0 5px rgba(2, 136, 209, 0.5); /* Blue glow effect */
}

.error-message {
    display: none; /* Initially hidden */
    color: red;
    margin-top: 5px;
}

.btn {
    background-color: #03a9f4; /* Blue background */
    color: white;
    padding: 12px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s; /* Button transitions */
    width: 100%;
}

.btn:hover {
    background-color: #0288d1; /* Darker blue on hover */
    transform: translateY(-2px); /* Slight lift on hover */
}

p {
    text-align: center;
    margin-top: 15px;
}

p a {
    color: #03a9f4; /* Link color */
    text-decoration: none;
    font-weight: bold;
}

p a:hover {
    text-decoration: underline; /* Underline on hover */
}

/* Fade-in animation */
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px); /* Start slightly above */
    }
    to {
        opacity: 1;
        transform: translateY(0); /* End in place */
    }
}

   
    </style>
</head>
<body>
    <div class="reg-container">
        <h2 class="title">Customer Registration</h2>
        <form action="/" method="POST" id="regform">
            <!-- Full Name and Username in same row -->
            <div class="form-row">
                <div class="input-field">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your full name" required>
                </div>
            </div>
            <div class="form-row">
            <div class="input-field">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Your username" required>
                </div>
            </div>

            <!-- Password and Confirm Password in same row -->
            <div class="form-row">
                <div class="input-field">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Set a password" required>
                </div>
                <div class="input-field">
                    <label for="confirm-password">Re-enter Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
                </div>
            </div>

            <div class="error-message" id="password-error">Passwords do not match!</div>

            <!-- Email Field -->
            <div class="input-field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Your email address" required>
            </div>

            <!-- Phone Number Field -->
            <div class="form-row">
                <div class="input-field">
                    <label for="country-code">Country Code:</label>
                    <select id="country-code" name="country-code" required>
                    </select>
                </div>
                <div class="input-field">
                    <label for="tel">Phone Number:</label>
                    <input type="tel" id="tel" name="tel" placeholder="Phone number" maxlength="9" required>
                </div>
            </div>

            <!-- Address Field -->
            <div class="input-field">
                <label for="address">Address:</label>
                <textarea id="address" name="address" rows="3" placeholder="Your address" required></textarea>
            </div>

            <!-- Register Button -->
            <button type="submit" class="btn">Register</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>


<script>
        async function fetchCountryCodes() {
            try {
                const response = await fetch('https://restcountries.com/v3.1/all');
                const countries = await response.json();
                const countryCodeSelect = document.getElementById('country-code');

                countries.forEach(country => {
                    const rootCode = country.idd?.root || '';
                    const suffixCode = country.idd?.suffixes?.[0] || '';

                    // Construct full code ensuring no double '+'
                    let fullCode = '';
                    if (rootCode) {
                        fullCode += `+${rootCode}`; // Start with root code prefixed by '+'
                        if (suffixCode) {
                            fullCode += suffixCode; // Append suffix if present
                        }
                    }

                    // Remove any leading '+' signs in suffixCode
                    if (suffixCode.startsWith('+')) {
                        suffixCode = suffixCode.slice(1); // Remove leading '+' if exists
                    }

                    const option = document.createElement('option');
                    option.value = `${fullCode}${suffixCode}`; // Ensure only one '+'
                    option.textContent = `${country.name.common} (${option.value})`;

                    // Prevent adding an option with an empty value
                    if (option.value) {
                        countryCodeSelect.appendChild(option);
                    }
                });
            } catch (error) {
                console.error('Error fetching country codes:', error);
            }
        }

        // Call fetchCountryCodes when the DOM is fully loaded
        document.addEventListener('DOMContentLoaded', fetchCountryCodes);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#regform").submit(function(event) {
            event.preventDefault(); 

            
            var password = $("#password").val();
            var confirmPassword = $("#confirm-password").val();

            if (password !== confirmPassword) {
                $("#password-error").show();
                return; 
            } else {
                $("#password-error").hide();
            }

          
            var formData = {
                name: $("#name").val(),
                username: $("#username").val(),
                password: $("#password").val(),
                email: $("#email").val(),
                country_code: $("#country-code").val(),
                tel: $("#tel").val(),
                address: $("#address").val()
            };

         
            $.ajax({
                type: 'post',
                url: 'regsave.php',
                data: formData,
                success: function(json) {
                    $('#formdata').html(json);
                }
            });
        });
    });
    </script>

</body>

</html>
