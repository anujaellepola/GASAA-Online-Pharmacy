<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="styles/category.css">
    <link rel="stylesheet" href="index.php">
    <link rel="stylesheet" href="login.php">
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <title>GASAA - Devices</title>
    <title>Order Confirmation</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #e44d26;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .confirmation-container {
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin-bottom: 20px;
        }

        .order-details div {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        strong {
            font-size: 1.2em;
            color: #333;
        }

        p {
            font-size: 1.2em;
            color: #777;
            margin-top: 20px;
        }
        .popup-container {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 2px solid #e44d26;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .popup-message {
            font-size: 18px;
            color: #e44d26;
        }
    </style>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to display the styled popup message
            function displayPopup() {
                // Create the popup container and message elements
                var popupContainer = document.createElement('div');
                popupContainer.className = 'popup-container';

                var popupMessage = document.createElement('div');
                popupMessage.className = 'popup-message';
                popupMessage.textContent = 'Order placed successfully!';

                // Append the message to the container
                popupContainer.appendChild(popupMessage);

                // Append the container to the body
                document.body.appendChild(popupContainer);

                // Display the popup
                popupContainer.style.display = 'block';

                // Hide the popup after a short delay (you can adjust the delay as needed)
                setTimeout(function() {
                    popupContainer.style.display = 'none';
                }, 3000); // Hide after 3 seconds (adjust as needed)
            }

            // Call the displayPopup function after a short delay
            setTimeout(displayPopup, 500);
        });
    </script>
</head>

<body>
    <!-- Header Section -->
    <header>
        <a href="#" class="logo"><i></i>GASAA Pharmacy</a>
        <nav class="navbar">
            <a class="active" href="index.php">Go to Home</a>
        </nav>
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <a href="viewcart.php" class="fas fa-shopping-cart"></a>
            <a href="user_page.php" class="fas fa-user"></a>
        </div>
    </header>

    <h1>Order Confirmation</h1>

    <?php if (!empty($_SESSION["cart_item"])): ?>
        <div class="confirmation-container">
            <h2>Your Order Details</h2>
            <div class="order-details">
                <!-- Display relevant order details here -->
                <?php foreach ($_SESSION["cart_item"] as $item): ?>
                    <div>
                        <strong><?php echo $item["product_name"]; ?></strong><br>
                        Quantity: <?php echo $item["quantity"]; ?><br>
                        Price: Rs<?php echo number_format($item["price"], 2); ?><br>
                        Total: Rs<?php echo number_format($item["quantity"] * $item["price"], 2); ?>

                    </div>
                <?php endforeach; ?>

                </div>
            <?php
            unset($_SESSION["cart_item"]);
            ?>
        </div>
    <?php else: ?>
        <p>Your cart is empty. No order to confirm.</p>
    <?php endif; ?>

</body>
</html>