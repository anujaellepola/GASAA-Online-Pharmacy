<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES ('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:loginpage.php');
      }
   };


?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
      <title>GASAA Register</title>
      <link rel="stylesheet" href="styles/login.css">
      <link rel="stylesheet" href="loginpage.page">
   </head>
   <body>
      <div class="wrapper">
         <div class="title">Register</div>
         <img src="./images/LOGOwithname.jpg" alt="GASAA Logo" class="logo">
         <form action="" method="POST">
         <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
         <div class="field">
         <input type="text" name="name" required >
         <label>Username</label>
</div>
         <div class="field">
      <input type="email" name="email" required >
      <label>Email</label>
   </div>
   <div class="field">
      <input type="password" name="password" required >
      <label>Password</label>         
   </div>
   <br>
   <select name="user_type" style="
    padding: 12px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background-color: #f8f8f8;
    color: #333;
    outline: none;
    transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    width: 100%;
    cursor: pointer;
">

    <option value="admin">admin</option>
    <option value="staff">staff</option>
</select>

   
      <div class="field">
               <input type="submit" name="submit" value="Register">
            </div>
            <center><p>By clicking the Register button, you agree to our <br>
                <a href="#">Term and Condition</a> and <a href="#">Policy And Privacy</a>
            </p></center>
            <div class="signup-link">
                Already have an account? <a href="loginpage.php">Login Now</a>
            </div>
            
         </form>
      </div>
   </body>
</html>