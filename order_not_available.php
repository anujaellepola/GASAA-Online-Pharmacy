<?php
require_once('dbcontroller.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form is submitted

    // Access user information
    $fullName = isset($_POST['fullName']) ? $_POST['fullName'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $contactNumber = isset($_POST['contactNumber']) ? $_POST['contactNumber'] : '';

    // Access uploaded images
    $idCardImage = isset($_FILES['idCardImage']) ? $_FILES['idCardImage'] : null;
    $prescriptionImage = isset($_FILES['prescriptionImage']) ? $_FILES['prescriptionImage'] : null;

    // Check if any image is uploaded
    if ($idCardImage && $prescriptionImage) {
        // Move the uploaded files to a desired directory
        $idCardImageDestination = 'C:\xampp\htdocs\GASAA Pharmacy XAMPP\order_presc_img\idcardimg' . $idCardImage['name'];
        $prescriptionImageDestination = 'C:\xampp\htdocs\GASAA Pharmacy XAMPP\order_identity_img\prescriptionimg' . $prescriptionImage['name'];

        // Check for errors during move_uploaded_file
        if (move_uploaded_file($idCardImage['tmp_name'], $idCardImageDestination) && move_uploaded_file($prescriptionImage['tmp_name'], $prescriptionImageDestination)) {
            echo "Files have been successfully uploaded.";

            // Now, insert information into the database using prepared statements
            require_once('dbcontroller.php');
            $db = new DBController();

            // Prepare SQL query with placeholders
           // Prepare SQL query with placeholders
// Prepare SQL query with placeholders
// Prepare SQL query with placeholders
$insertQuery = "INSERT INTO na_orders (full_name, email, contact_number, id_card_image_path, prescription_image_path)
                VALUES (?, ?, ?, ?, ?)";



        // Prepare the SQL statement
        $db = new DBController(); // Create an instance of the DBController class
        $conn = $db->conn; // Access the connection property
        
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssss", $fullName, $email, $contactNumber, $idCardImageDestination, $prescriptionImageDestination);
        
// Execute the statement
$result = $stmt->execute();

// Check for successful insertion
if ($result) {
    echo "Order request submitted successfully.";
    header("Location: success_page.php");
} else {
    echo "Error submitting order request.";
}
        } else {
            echo "Error moving files.";
        }
    } else {
        echo "Fill the form.";
    }
} else {
    // Redirect to the form if accessed directly without submitting
    header("Location: viewcart.php");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    <title>GASAA Pharmacy - Request Order</title>
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/category.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;1,300;1,400;1,500;1,700;1,900&display=swap');

        body {
            font-family:  'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
            background: url(https://t4.ftcdn.net/jpg/05/77/84/27/360_F_577842756_DWiS65lNLDG5DPaozrJk3c9TgkGGBwCb.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }

        form {
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
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
        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
            text-align: center;
            
        }

        header .navbar a:hover {
            background-color: black;
        }
    </style>
</head>
<body>
     <header>

        <a href="#" class="logo"><i class="fas-fa-untensils"></i>GASAA Pharmacy</a>

        <h1>Request Order</h1>
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

    <form action="" method="post" enctype="multipart/form-data">
        <label for="idCardImage">National Identity Card Image:</label>
        <input type="file" name="idCardImage" accept="image/*" required>

        <label for="fullName">Full Name:</label>
        <input type="text" name="fullName" required>

        <label for="email" style="text-transform: lowercase;">Email:</label>
        <input type="email" name="email" required>

        <label for="contactNumber">Contact Number:</label>
        <input type="tel" name="contactNumber" required>

        <label for="prescriptionImage">Doctor's Prescription Image:</label>
        <input type="file" name="prescriptionImage" accept="image/*" required>
        <?php
        $error = "*Details Providing Are Secured With Us. No Third Party Involved";
        echo '<div class="error-message">' . $error . '</div>';
        ?>
        <button type="submit">Submit Order Request</button>
    </form>

    <script src="javascripts/script.js"></script>
</body>
</html>
