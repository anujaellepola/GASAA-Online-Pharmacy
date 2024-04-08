<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'C:\xampp\htdocs\GASAA pharmacy\PHPMailer-master\PHPMailer-master\src\Exception.php';
require 'C:\xampp\htdocs\GASAA pharmacy\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';
require 'C:\xampp\htdocs\GASAA pharmacy\PHPMailer-master\PHPMailer-master\src\SMTP.php';

session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if (!empty($_POST["email"])) {
    $user_email = $_POST["email"];
    $user_query = $db_handle->runQuery("SELECT * FROM user_form WHERE email='" . $user_email . "'");
    if ($user_query->num_rows > 0) {
        $row = $user_query->fetch_assoc();
        $user_name = $row["name"];
        $reset_token = bin2hex(random_bytes(32)); // Generate a random token

        // Update the user record with the reset token
        $update_query = "UPDATE user_form SET reset_token='" . $reset_token . "' WHERE email='" . $user_email . "'";
        $result = $db_handle->runQuery($update_query);

        if ($result) {
            $reset_link = "http://localhost/GASAA%20pharmacy/reset_password.php?token=" . $reset_token;

            // Create PHPMailer instance
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->SMTPDebug = 0; // 0 for no output, 2 for detailed debugging
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Your SMTP host
                $mail->SMTPAuth = true;
                $mail->Username = 'athiffriyazcool318@gmail.com'; // Your SMTP username
                $mail->Password = 'ikqr lxmg uxgw emqo'; // Your SMTP password

                // Disable SSL certificate verification
                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                $mail->SMTPSecure = 'tls'; // 'tls' or 'ssl'
                $mail->Port = 587; // Your SMTP port

                // Recipients
                $mail->setFrom('athiffriyazcool318@gmail.com', 'GASSA');
                $mail->addAddress($user_email, $user_name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset';
                $mail->Body = 'Click the following link to reset your password: ' . $reset_link;

                // Send the email
                $mail->send();
                echo 'Password reset link sent to your email address.';
            } catch (Exception $e) {
                echo "Failed to send the password reset link. Please try again later. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error updating user record with reset token.";
        }
    } else {
        echo "User not found.";
    }
} else {
    echo "Email is empty.";
}
?>
