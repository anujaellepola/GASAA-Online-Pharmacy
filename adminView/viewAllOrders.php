<?php
// Include your DBController class or database connection logic here

require_once('dbcontroller.php');


// Create a DBController instance
$db = new DBController();

// Query to fetch all details from orders and order_details tables
$query = "SELECT orders.*, order_details.* FROM orders
          LEFT JOIN order_details ON orders.order_id = order_details.order_id
          ORDER BY orders.order_id DESC";

$result = $db->runQuery($query);

// Check if there are any results
if ($result && $result->num_rows > 0) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <!-- Your head content here -->
    </head>
    <body>
        <header>
            <!-- Your header content here -->
        </header>

        <h1>All Orders</h1>

        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Card Number</th>
                    <th>Expiry Date</th>
                    <th>CVV</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['order_id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['card_number']; ?></td>
                        <td><?php echo $row['expiry_date']; ?></td>
                        <td><?php echo $row['cvv']; ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </body>
    </html>
    <?php
} else {
    // Handle case where there are no orders
    echo "No orders found.";
}
?>
