<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Random Path Animation</title>
    <style>
        .santa-animation-wrapper {
            position: fixed; /* Full-screen wrapper */
            top: 0;
            left: 0;
            height: 100%; /* Covers the entire screen */
            width: 150%; /* Covers the entire screen */
            overflow: hidden; /* Keeps animation within the viewport */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            z-index: 1000; /* Keep it above other content */
            pointer-events: none; /* Allows clicks to pass through */
        }

        .santa-sprite {
            position: absolute;
            width: 300px;
            height: 300px;
            background: url('Images/santa-flying-graphic.gif') no-repeat center center;
            background-size: contain;
        }

        .santa-snow-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 10000;
        }

        .santa-snow-particle {
            position: absolute;
            top: -10px;
            color: rgb(231, 251, 255);
            font-size: 20px;
            animation: santa-snow-fall 5s linear infinite;
        }

        @keyframes santa-snow-fall {
            0% { top: -10px; }
            100% { top: 100vh; }
        }
    </style>
</head>
<body>
    <div class="santa-animation-wrapper">
        <div class="santa-sprite"></div>
    </div>
    <div class="santa-snow-wrapper"></div>

    <script>
        const snowContainer = document.querySelector('.santa-snow-wrapper');
        const santa = document.querySelector('.santa-sprite');

        // Function to create falling snowflakes
        function createSnowflake() {
            const snowflake = document.createElement('div');
            snowflake.classList.add('santa-snow-particle');
            snowflake.textContent = '❄';
            snowflake.style.left = Math.random() * 100 + 'vw';
            snowflake.style.animationDuration = Math.random() * 6 + 4 + 's';
            snowContainer.appendChild(snowflake);
            setTimeout(() => snowflake.remove(), 10000); // Remove snowflake after 10 seconds
        }

        // Create snowflakes at intervals
        setInterval(createSnowflake, 200);

        // Function to move Santa across the screen
        function moveSanta() {
            const startY = Math.random() * 80 + 10; // Random starting vertical position (10% to 90% of the screen)
            const endY = Math.random() * 80 + 10; // Random ending vertical position (10% to 90%)

            santa.style.transition = 'none'; // Remove previous transition
            santa.style.left = '100%'; // Start from the right side (off-screen)
            santa.style.top = `${startY}%`; // Start at a random vertical position

            // Force reflow to apply the starting position instantly
            santa.offsetHeight;

            const duration = Math.random() * 10000 + 12000; // Increased duration (8 to 14 seconds) for slower animation

            // Set the movement animation with ease-out for smooth exit
            santa.style.transition = `left ${duration}ms ease-out, top ${duration}ms linear`;
            santa.style.left = '-10%'; // Move to the left side (off-screen)
            santa.style.top = `${endY}%`; // End at a random vertical position

            // Schedule the next movement after Santa exits the screen
            setTimeout(moveSanta, duration + 1000); // Adjusted delay for the next cycle
        }

        // Start the Santa animation
        moveSanta();
    </script>
</body>
</html>
