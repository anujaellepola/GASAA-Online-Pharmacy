<!-- reset_password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
    <title>GASAA Reset Password</title>
    <link rel="stylesheet" href="styles/login.css">
</head>
<body>
    <div class="wrapper">
        <div class="title">Reset Password</div>
        <img src="./images/LOGOwithname.jpg" alt="GASAA Logo" class="logo">
        <form method="POST" action="reset_password_process.php">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <div class="field">
                <input type="password" name="new_password" required>
                <label>New Password</label>
            </div>
            <div class="field">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>
            <div class="field">
                <input type="submit" name="submit" value="Reset Password">
            </div>
        </form>
    </div>
</body>
</html>
