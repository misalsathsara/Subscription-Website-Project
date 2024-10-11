<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration Form with Country Codes</title>
    <style>
 @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800&display=swap");

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body,
input,
textarea {
    font-family: "Poppins", sans-serif;
}

.reg-container {
    width: 100%;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

h2.title {
    font-size: 2rem;
    color: #444;
    margin-bottom: 20px;
    text-align: center;
}

.input-field {
    margin-bottom: 15px;
}

.input-field label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.input-field input,
.input-field textarea,
.input-field select {
    width: 100%;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 1rem;
    transition: border-color 0.3s;
}

.input-field input:focus,
.input-field textarea:focus,
.input-field select:focus {
    border-color: #5995fd;
    outline: none;
}

.error-message {
    color: red;
    display: none; /* Initially hide error message */
    font-size: 0.9rem;
}

.tel-input {
    display: flex;
    align-items: center;
}

.tel-input select {
    width: 30%;
    margin-right: 10px;
}

.btn {
    width: 100%;
    background-color: #5995fd;
    border: none;
    height: 45px;
    border-radius: 5px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #4d84e2;
}

@media (max-width: 500px) {
    .reg-container {
        padding: 15px;
    }

    .title {
        font-size: 1.5rem;
    }
}

    </style>
</head>

<body>
<div class="reg-container">
    <h2 class="title">Customer Registration</h2>
    <form action="/" method="POST" id="regform">
        <div class="input-field">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" placeholder="Your full name" required>
        </div>

        <div class="input-field">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Your username" required>
        </div>

        <div class="input-field">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Set a password" required>
        </div>

        <div class="input-field">
            <label for="confirm-password">Re-enter Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password" required>
        </div>

        <div class="error-message" id="password-error">Passwords do not match!</div>

        <div class="input-field">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your email address" required>
        </div>

        <div class="input-field tel-input">
            <label for="tel">Phone Number:</label>
            <select id="country-code" name="country-code" required>
                <option value="+1">+1</option>
                <option value="+44">+44</option>
                <option value="+91">+91</option>
            </select>
            <input type="tel" id="tel" name="tel" placeholder="Phone number" maxlength="9" required>
        </div>

        <div class="input-field">
            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="3" placeholder="Your address" required></textarea>
        </div>

        <button type="submit" class="btn">Register</button>
        <div id="formdata">........</div>
    </form>
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
