<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <title>GASAA Pharmacy - Checkout</title>
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/category.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: url(https://t4.ftcdn.net/jpg/05/77/84/27/360_F_577842756_DWiS65lNLDG5DPaozrJk3c9TgkGGBwCb.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 1rem;
            display: inline-block;
            font-size: 1.2rem;
            color: #fff;
            background: #000000;
            border-radius: .5rem;
            cursor: pointer;
            padding: .8rem 3rem;
        }

        button:hover{
            background: #a9130c;
            letter-spacing: .1rem;
        }

        header .navbar a:hover {
            background-color: black;
        }
    </style>
</head>
<body>
    <header>

        <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

        <h1>Order Checkout</h1>
        <nav class="navbar">
            <a class="active" href="viewcart.php">Go Back</a>
        </nav>

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <!-- <i class="fas fa-search" id="search-icon"></i> -->
            <!-- <a href="#" class="fas fa-heart"></a> -->
            <!-- <a href="viewcart.php" class="fas fa-shopping-cart"></a> -->
            <a href="user_page.php" class="fas fa-user"></a>
        </div>

    </header>
    <form action="process_order.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required>

        <label for="card_number">Card Number:</label>
        <input type="text" id="card_number" name="card_number" required>

        <label for="expiry_date">Expiry Date:</label>
        <input type="text" id="expiry_date" name="expiry_date" placeholder="MM/YYYY" required>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>

        <button type="submit" name="complete_order">Complete Order</button>

    </form>
    <script src="javascripts/script.js"></script>
</body>
</html>
