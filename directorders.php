<?php
// Include your DBController class or database connection logic here
require_once('dbcontroller.php');

// Create a DBController instance
$db = new DBController();

// Check if the hide button is clicked
if (isset($_POST['hide_order'])) {
    $orderID = $_POST['order_id'];

    // Update the status of the order to "hidden" in the database
    $updateQuery = "UPDATE orders SET status = 'hidden' WHERE order_id = $orderID";
    $db->runQuery($updateQuery);
}

// Query to fetch all details from orders and order_details tables where status is not "hidden"
$query = "SELECT orders.*, order_details.* FROM orders
          LEFT JOIN order_details ON orders.order_id = order_details.order_id
          WHERE orders.status != 'hidden'
          ORDER BY orders.order_id DESC";

$result = $db->runQuery($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <title>GASAA Pharmacy - Direct Orders</title>
    <link rel="stylesheet" href="styles/category.css">
    <style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-size: 12px;
        }

        th {
            padding-top: 5rem;
            background-color: #a9130c;
            color: #fff;
            font-size: 15px;
        }

        .delete-btn {
            background-color: #a9130c;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: black;
        }

        header .navbar a:hover {
            background-color: black;
        }

        p {
            text-align: center;
            max-width: 100%;
            padding: 350px;
            background-color: #f0f0f0;
            color: #333;
            border: 1px solid #ccc;
            font-size: 15px;
        }
        .hide-btn {
    background-color: #a9130c;
    color: #fff;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
}

.hide-btn:hover {
    background-color: black;
    cursor: pointer; /* Add this line to set cursor to pointer */
}

        
    </style>
</head>

<body>
    <header>
    <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

        <h1>All Direct Orders</h1>
        <nav class="navbar">
            <a class="active" href="staff.php">Go Back</a>
        </nav>
    </header>

    <?php if ($result && $result->num_rows > 0): ?>
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
                    <th>Action</th>
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
                        <td><?php echo str_repeat('*', strlen($row['cvv'])); ?></td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <form method="post">
                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                <button type="submit" class="hide-btn" name="hide_order">Hide</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <center>
            <p>No Direct Orders Found !!</p>
        </center>
    <?php endif; ?>
</body>
</html>
