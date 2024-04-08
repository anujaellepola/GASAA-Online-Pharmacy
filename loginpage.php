<?php
// Include your configuration and database connection files
@include 'config.php';

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_name'])) {
    header('location:index.php');
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin') {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');
        } elseif ($row['user_type'] == 'user') {
            $_SESSION['user_name'] = $row['name'];

            // Initialize or load user-specific cart
            $_SESSION['cart_user_id'] = $row['user_id'];
            loadCartFromDatabase($conn, $row['user_id']);

            header('location:index.php');
        } elseif ($row['user_type'] == 'staff') {
            $_SESSION['user_name'] = $row['name'];

            header('location:staff.php');
        }else {
            $error = "Invalid user type";
        }
    } else {
        $error = "Incorrect Email or Password";
    }
}
function loadCartFromDatabase($conn, $userId) {
   if (isset($userId)) {
       // Retrieve the user's cart items from the database
       $selectCart = "SELECT * FROM user_cart WHERE user_id = '$userId'";
       $resultCart = mysqli_query($conn, $selectCart);

       if ($resultCart) {
           // Initialize the cart array
           $_SESSION['cart_item'] = array();

           // Populate the cart array with items from the database
           while ($rowCart = mysqli_fetch_assoc($resultCart)) {
               $_SESSION['cart_item'][$rowCart['product_id']] = array(
                   'product_name' => $rowCart['product_name'],
                   'product_id' => $rowCart['product_id'],
                   'quantity' => $rowCart['quantity'],
                   'price' => $rowCart['price'],
                   'product_image' => $rowCart['product_image']
               );
           }
       }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
      <title>GASAA Login</title>
      <link rel="stylesheet" href="styles/login.css">
      <link rel="stylesheet" href="signup.html">
      <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 50px;
        }

        .error-message {
            color: #ff0000;
            margin-bottom: 10px;
            text-align: center;
            
        }
    </style>
   </head>
   <body>
      <div class="wrapper">
        
         <div class="title">Login</div>
         <img src="./images/LOGOwithname.jpg" alt="GASAA Logo" class="logo">
         <?php
            if (isset($error)) {
                echo '<div class="error-message">' . $error . '</div>';
            }
            ?>
         <form method="POST" action="">
        
    
         <div class="field">
      <input type="email" name="email" required >
      <label>Email</label>
   </div>
   <div class="field">
      <input type="password" name="password" required >
      <label>Password</label>         
   </div>

             

            <div class="content">
               <div class="checkbox">
                  <input type="checkbox" id="remember-me">
                  <label for="remember-me">Remember me</label>
               </div>

               <div class="pass-link">
        <a href="forgot_password.php">Forgot password?</a>
    </div>
            </div>

            <div class="field">
               <input type="submit" name="submit" value="Login">
            </div>

            <div class="signup-link">
                Don't have an account? <a href="signup.php">Register Now</a>
            </div>

         </form>
      </div>
   </body>
</html>