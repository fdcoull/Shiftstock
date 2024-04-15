<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom Styles */
    .jumbotron {
        background-image: url('file:///D:/Users/Emma%20Davidson/Downloads/about-contact-banners.jpg');
        background-size: cover; 
	    background-repeat: no-repeat;
	    background-position: center; /* Center the background image */
        color: #fff;
        text-align: center;
        padding: 100px 0;
    }

    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }
    .container2 {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .cart-item {
        border-bottom: 1px solid #ccc;
        padding: 10px 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-item img {
        max-width: 100px;
        height: auto;
        margin-right: 20px;
    }
    .cart-item-info {
        flex-grow: 1;
    }
    .cart-item-info h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }
    .cart-item-info p {
        margin: 5px 0;
        font-size: 14px;
        color: #666;
    }
    .cart-total {
        margin-top: 20px;
        text-align: right;
    }
    .cart-total p {
        margin: 5px 0;
        font-size: 16px;
        color: #333;
    }
    .checkout-btn {
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .checkout-btn:hover {
        background-color: #0056b3;
    }
  </style>

</head>
<body>
  <header>
    @include('navbar')
  </header>

<div class="container2">
    <h2>Your Shopping Cart</h2>
    <div id="cart-items">
        <!-- Cart items will be dynamically added here -->
    </div>
    <div class="cart-total">
        <p>Total: $0.00</p>
        <button class="checkout-btn">Checkout</button>
    </div>
</div>

<script>
    // Sample JavaScript code to dynamically add cart items
    document.addEventListener("DOMContentLoaded", function () {
        // Sample cart items data
        const cartItems = [
            {
                name: "pvc_apron",
                image: "file:///D:/Users/Emma%20Davidson/Downloads/pvc_apron.jpg",
                price: 19.99
            },
            {
                name: "disposable gloves",
                image: "file:///D:/Users/Emma%20Davidson/Downloads/disposable_gloves.png",
                price: 24.99
            }
        ];

        // Function to render cart items
        function renderCartItems() {
            const cartContainer = document.getElementById("cart-items");
            let totalPrice = 0;

            // Clear previous items
            cartContainer.innerHTML = "";

            // Loop through each item and render
            cartItems.forEach(function (item) {
                const cartItemDiv = document.createElement("div");
                cartItemDiv.classList.add("cart-item");

                const itemImage = document.createElement("img");
                itemImage.src = item.image;
                itemImage.alt = item.name;

                const itemInfoDiv = document.createElement("div");
                itemInfoDiv.classList.add("cart-item-info");
                const itemName = document.createElement("h3");
                itemName.textContent = item.name;
                const itemPrice = document.createElement("p");
                itemPrice.textContent = "Price: $" + item.price.toFixed(2);

                itemInfoDiv.appendChild(itemName);
                itemInfoDiv.appendChild(itemPrice);

                cartItemDiv.appendChild(itemImage);
                cartItemDiv.appendChild(itemInfoDiv);

                cartContainer.appendChild(cartItemDiv);

                // Calculate total price
                totalPrice += item.price;
            });

            // Render total price
            const totalElement = document.querySelector(".cart-total p");
            totalElement.textContent = "Total: $" + totalPrice.toFixed(2);
        }

        // Initial render
        renderCartItems();
    });
</script>

</body>
</html>
