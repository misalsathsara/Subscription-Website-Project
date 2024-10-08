<?php
  include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
    <link rel="stylesheet" href="productStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SubscriBuy Items</title>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
            width: 250px;
            display: inline-block;
            text-align: center;
        }
        .card img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <div id="card-container"></div>

    <script>
        function fetchItems() {
            fetch('fetch_items.php')
                .then(response => response.json())
                .then(data => {
                    const cardContainer = document.getElementById('card-container');
                    cardContainer.innerHTML = ''; // Clear existing cards

                    data.forEach(item => {
                        const card = document.createElement('div');
                        card.classList.add('card');

                        const img = document.createElement('img');
                        img.src = item.image;
                        img.alt = item.name;

                        const name = document.createElement('h2');
                        name.textContent = item.name;

                        const type = document.createElement('p');
                        type.textContent = `Type: ${item.type}`;

                        const description = document.createElement('p');
                        description.textContent = item.description;

                        const price = document.createElement('p');
                        price.textContent = `Price: $${item.price}`;

                        card.appendChild(img);
                        card.appendChild(name);
                        card.appendChild(type);
                        //card.appendChild(description);
                        card.appendChild(price);

                        cardContainer.appendChild(card);
                    });
                });
        }

        // Fetch the items every 5 seconds to check for new/deleted items
        setInterval(fetchItems, 5000);
        fetchItems(); // Initial call
    </script>

</body>
</html>


</body>

</html>
