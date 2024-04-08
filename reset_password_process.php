<?php
// reset_password_process.php
@include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = mysqli_real_escape_string($conn, $_POST['token']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Validate passwords
    if ($newPassword != $confirmPassword) {
        echo "Passwords do not match.";
    } else {
        // Update the password in the database and clear the reset token
        $hashedPassword = md5($newPassword);
        $updatePassword = "UPDATE user_form SET password = '$hashedPassword', reset_token = NULL WHERE reset_token = '$token'";
        mysqli_query($conn, $updatePassword);

        echo "Password reset successful.";
    }
}
?>
