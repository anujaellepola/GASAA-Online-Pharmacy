<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

// Check if the user is logged in
if (!isset($_SESSION['user_name'])) {
    header('location: loginpage.php');
    exit();
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $product_id = $_GET["code"];
                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE product_id='" . $product_id . "'");
                
                // Fetch the row from the result set
                if ($row = $productByCode->fetch_assoc()) {
                    $itemArray = array(
                        'product_name' => $row["product_name"],
                        'product_id' => $row["product_id"],
                        'quantity' => $_POST["quantity"],
                        'price' => $row["price"],
                        'product_image' => $row["product_image"]
                    );

                    if (!isset($_SESSION["cart_item"])) {
                        $_SESSION["cart_item"] = array();
                    }

                    if (array_key_exists($row["product_id"], $_SESSION["cart_item"])) {
                        // Product already in cart, update quantity
                        $_SESSION["cart_item"][$row["product_id"]]["quantity"] += $_POST["quantity"];
                    } else {
                        // Product not in cart, add to cart
                        $_SESSION["cart_item"][$row["product_id"]] = $itemArray;
                    }
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                $product_id_to_remove = $_GET["product_id"];
                if (isset($_SESSION["cart_item"][$product_id_to_remove])) {
                    unset($_SESSION["cart_item"][$product_id_to_remove]);

                    // If cart is empty after removal, unset the session variable
                    if (empty($_SESSION["cart_item"])) {
                        unset($_SESSION["cart_item"]);
                    }
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

<HTML>
<HEAD>
    <TITLE>GASAA Pharmacy - Shopping Cart</TITLE>
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <link href="style.css" type="text/css" rel="stylesheet"/>
</HEAD>
<BODY>
<div id="shopping-cart">
    <div class="txt-heading">Shopping Cart</div>

    <a id="btnEmpty" href="viewcart.php?action=empty">Empty Cart</a>
    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        
        ?>
      <!-- Add an ID to the button -->
<form action="checkout.php" method="post">
    <button type="submit" id="placeOrderBtn" name="place_order">Place Order</button>
</form>

        
        <table class="tbl-cart" cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th style="text-align:left;">Name</th>
                <th style="text-align:left;">product_id</th>
                <th style="text-align:right;" width="5%">Quantity</th>
                <th style="text-align:right;" width="10%">Unit Price</th>
                <th style="text-align:right;" width="10%">Price</th>
                <th style="text-align:center;" width="5%">Remove</th>
              
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                ?>
                <tr>
                    <td><img src="<?php echo $item["product_image"]; ?>"
                             class="cart-item-image"/><?php echo $item["product_name"]; ?></td>
                    <td><?php echo $item["product_id"]; ?></td>
                    <td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                    <td style="text-align:right;"><?php echo "Rs. " . $item["price"]; ?></td>
                    <td style="text-align:right;"><?php echo "Rs. " . number_format($item_price, 2); ?></td>
                    <td style="text-align:center;"><a href="viewcart.php?action=remove&product_id=<?php echo $item["product_id"]; ?>" class="btnRemoveAction">
    <img src="icon-delete.png" alt="Remove Item"/>
</a>
</td>

                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="2" align="right">Total:</td>
                <td align="right"><?php echo $total_quantity; ?></td>
                <td align="right" colspan="2"><strong><?php echo "Rs. " . number_format($total_price, 2); ?></strong>
                </td>
                <td></td>
            </tr>
            </tbody>
        </table>
        <?php
    } else {
        ?>
        <div class="no-records">Your Cart is Empty</div>
        <?php
    }
    ?>
</div>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="styles/category.css">
        <link rel="stylesheet" href="index.html">
        <link rel="stylesheet" href="login.html">
        <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
        <title>GASAA - Tablets and Drops</title>
    </head>
      <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;1,300;1,400;1,500;1,700;1,900&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    font-family:'Poppins', sans-serif;
    background-color: #f8f9fa;
}

/* Header Styles */

.logo {
    color: #fff;
    text-decoration: none;
    font-size: 24px;
    font-weight: bold;
}

.navbar a {
    color: #fff;
    text-decoration: none;
    margin: 0 15px;
    font-size: 18px;
}

.icons {
    display: flex;
    align-items: center;
}

.icons i {
    color: #fff;
    font-size: 24px;
    margin: 0 10px;
    cursor: pointer;
}

/* Product Grid Styles */
#product-grid {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px;
}

.product-item {
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 20px;
    margin: 10px;
    text-align: center;
    width: 300px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.product-image img {
    width: 100%;
    height: auto;
    max-height: 150px;
    margin-bottom: 10px;
}

.product-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
}

.product-description {
    margin-bottom: 10px;
    color: #555;
}

.product-price {
    font-size: 16px;
    color: #e44d26;
    margin-bottom: 10px;
}

.cart-action {
    display: flex;
    justify-content: center;
    align-items: center;
}

.product-quantity {
    width: 40px;
    padding: 5px;
    margin-right: 5px;
}

.btnAddAction {
    background-color:#a9130c;
    color: #fff;
    padding: 8px 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer; 
}

/* Shopping Cart Styles */
#shopping-cart {
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    margin-top: 134px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.tbl-cart {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.tbl-cart th,
.tbl-cart td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.no-records {
    text-align: center;
    margin-top: 20px;
    color: #555;
}

/* Place Order Button Style */
form button#placeOrderBtn {
    background-color: #a9130c;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 20px;
}

header .navbar a:hover {
        background-color: black;
}


#orderNotAvailableBtn:hover {
    background-color: black;
    cursor: pointer;
}

/* Responsive styles for the button */
@media (max-width: 600px) {
    form button#placeOrderBtn {
        width: 100%;
    }
}
form button#orderNotAvailableBtn {
        background-color: #a9130c;
        color: #fff;
        align-items: center;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
    }

    /* Responsive styles for the button */
    @media (max-width: 600px) {
        form button#orderNotAvailableBtn {
            width: 100%;
        }
    }

    </style>
<body>

     <!-- Header Section  -->
    <header>

        <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

        <nav class="navbar">
            <a class="active" href="index.php">Go to Home</a>
        </nav>
         
        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            <i class="fas fa-search" id="search-icon"></i>
            <!-- <a href="#" class="fas fa-heart"></a> -->
            <!-- <a href="viewcart.php" class="fas fa-shopping-cart"></a> -->
            <a href="user_page.php" class="fas fa-user"></a>
        </div>
        <form action="order_not_available.php" method="post">
    <button type="submit" id="orderNotAvailableBtn" name="order_not_available">Click Here To Order Medicines Not Available</button>
</form>
    </header>

    <!--Search Section -->
    <form action="#" id="search-form">
    <input type="search" placeholder="Search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>



    <div id="product-grid">
    <div class="txt-heading">All Products</div>
    
    <?php
  $product_array = $db_handle->runQuery("SELECT * FROM product INNER JOIN product_size_variation ON product.product_id = product_size_variation.product_id");

    if (!empty($product_array)) {
        foreach ($product_array as $value) {
             // Check if stock quantity is 0
        $stock_quantity = $value["quantity_in_stock"];
        $imagePath = htmlspecialchars($value["product_image"]);
        $grayscale_style = ($stock_quantity == 0) ? 'filter: grayscale(100%);' : '';
            ?>
            
            <div class="product-item">
            <form method="post" action="viewcart.php?action=add&code=<?php echo $value["product_id"]; ?>">
                <div class="product-image" style="<?php echo $grayscale_style; ?>">
                        <?php
                        $imagePath = htmlspecialchars($value["product_image"]);
        
                        if (!empty($imagePath) && file_exists($imagePath)) {
                            echo "<img src='" . $imagePath . "' alt='Product Image' style='width: 200px; height: 150px;' />";
                        } else {
                            echo "Image not available";
                        }
                        ?>
                    </div>
                    <div class="product-tile-footer">
                        <div class="product-title"><?php echo $value["product_name"]; ?></div>
                        <div class="product-description"><?php echo $value["product_desc"]; ?></div>
                        <div class="product-price"><?php echo "Rs." . $value["price"]; ?></div>
                        <div class="product-stock">Stock Quantity: <?php echo $stock_quantity; ?></div>
                        <div class="cart-action">
    <input type="text" class="product-quantity" name="quantity" value="1" size="2"/>
    <?php if ($stock_quantity > 0): ?>
        <input type="submit" value="Add to Cart" class="btnAddAction"/>
    <?php endif; ?>
</div>

                    </div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>


       <!-- Footer Section -->
       <section class="footer" id="contact">
            <div class="credit">Copyright © by <span>CodexHarbor</span></div>
        </section>


    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="javascripts/script.js"></script>
    <script src="javascripts/search.js"></script>





</BODY>

</HTML>
