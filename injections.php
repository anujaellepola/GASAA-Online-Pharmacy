<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
?>

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
        <title>GASAA - Injections</title>
    </head>
      <style>
        /* Add your custom styles here */
     /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    font-family: 'Arial', sans-serif;
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
    margin: 32px;
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
            <a href="viewcart.php" class="fas fa-shopping-cart"></a>
            <a href="user_page.php" class="fas fa-user"></a>
        </div>
  
    </header>

    <!-- Search Section -->
    <form action="#" id="search-form">
    <input type="search" placeholder="Search here..." name="" id="search-box">
    <label for="search-box" class="fas fa-search"></label>
    <i class="fas fa-times" id="close"></i>
</form>

<br><br>
    <div id="product-grid">
    <div class="txt-heading">All Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM product where category_id='3'");
    if (!empty($product_array)) {
        foreach ($product_array as $value) {
            ?>
            <div class="product-item">
                <form method="post" action="viewcart.php?action=add&code=<?php echo $value["product_id"]; ?>">
                    <div class="product-image">
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
                        <div class="product-price"><?php echo "RS." . $value["price"]; ?></div>
                      
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
    <script src="javascripts/categorysearch.js"></script>
    
</BODY>

</HTML>
