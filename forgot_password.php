<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <title>GASAA Forgot Password</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">Forgot Password</div>
        <img src="./images/LOGOwithname.jpg" alt="GASAA Logo" class="logo">
        <form method="POST" action="forgot_password_process.php">
            <div class="field">
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>
