<?php
session_start();
require_once("dbcontroller.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["complete_order"])) {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $card_number = $_POST["card_number"];
    $expiry_date = $_POST["expiry_date"];
    $cvv = $_POST['cvv'];
    $encryptionKey = '1234567890123456'; // 16 bytes for AES-256-CBC
    $iv = openssl_random_pseudo_bytes(16);
    $encryptedCVV = openssl_encrypt($cvv, 'aes-256-cbc', $encryptionKey, 0, $iv);
    // Get the cart items from the session
    if (!empty($_SESSION["cart_item"])) {
        // Insert order details into the database
        $db = new DBController();

        // Insert order details into the orders table
        $query = "INSERT INTO orders (name, email, address, card_number, expiry_date, cvv, iv) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $db->conn->prepare($query);
        $stmt->bind_param("sssssss", $name, $email, $address, $card_number, $expiry_date, $encryptedCVV, $iv);

        $insertResult = $stmt->execute();

        if ($insertResult === false) {
            // Handle database insertion error
            echo "Error processing the order. Please try again.";
        } else {
            // Retrieve the last insert ID
            $lastInsertID = mysqli_insert_id($db->conn);

            foreach ($_SESSION["cart_item"] as $item) {
                $product_id = $item["product_id"];
                $productName = $item["product_name"];
                $quantity_ordered = $item["quantity"];
                $price = $item["price"];
                // Use $db instead of $db_handle
                $product_result = $db->runQuery("SELECT * FROM product_size_variation WHERE product_id = '$product_id'");
                if ($product_result) {
                    $product = mysqli_fetch_assoc($product_result);
                    $current_stock = $product["quantity_in_stock"];
                } else {
                    // Handle the case where the product is not found
                    echo "Product not found.";
                }
                // Calculate the new stock quantity after the order
                $new_stock = $current_stock - $quantity_ordered;
                // Update the stock quantity in the database
                $update_query = "UPDATE product_size_variation SET quantity_in_stock = '$new_stock' WHERE product_id = '$product_id'";
                $db->updateQuery($update_query);
                $productDetailsQuery = "INSERT INTO order_details (order_id, product_name, quantity, price) 
                                        VALUES (?, ?, ?, ?)";
                $stmtProductDetails = $db->conn->prepare($productDetailsQuery);
                $stmtProductDetails->bind_param("isdd", $lastInsertID, $productName, $quantity_ordered, $price);
                $productDetailsResult = $stmtProductDetails->execute();
            }
            header("Location: confirmation.php");
            exit();
        }
    } else {
        echo "Your cart is empty. Add items before placing an order.";
    }
}
?>
