<?php
// Include your DBController class or database connection logic here
require_once('dbcontroller.php');

// Create a DBController instance
$db = new DBController();

// Check if the hide button is clicked
if (isset($_POST['hide_order'])) {
    $orderID = $_POST['id'];

    // Update the status of the order to "hidden" in the database
    $updateQuery = "UPDATE na_orders SET status = 'order completed' WHERE id = $orderID";
    $db->runQuery($updateQuery);
}

// Query to fetch all details from orders and order_details tables where status is not "hidden"
$query = "SELECT *FROM na_orders";
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
    <title>GASAA Pharmacy - Prescription Orders</title>
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

        .hide-btn {
            background-color: #a9130c;
            color: #fff;
            padding: 8px 12px;
            border: none;
            cursor: pointer;
        }

        .hide-btn:hover {
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
    </style>
</head>

<body>
    <header>
        <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

            <h1>All Prescription Orders</h1>
            <nav class="navbar">
                <a class="active" href="staff.php">Go Back</a>
            </nav>
    </header>

    <?php if ($result && $result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID_CARD NUMBER IMAGE PATH</th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT NUMBER</th>
                    <th>PRESCRIPTION IMAGE PATH</th>
                    <th>Action</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['id_card_image_path']; ?></td>
                        <td><?php echo $row['full_name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['contact_number']; ?></td>
                        <td><?php echo $row['prescription_image_path']; ?></td>
                        <td>
                            <form method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="hide-btn" name="hide_order">Completed</button>
                            </form>
                        </td>
                        <td><?php echo $row['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <center>
            <p>No Prescription Orders Found !!</p>
        </center>
    <?php endif; ?>
</body>
</html>
