<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT id FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Generate a verification code
        $code = rand(100000, 999999);

        // Send the verification code to the user's email
        $subject = "Password Reset Code";
        $message = "Your password reset code is: " . $code . "\n\nPlease use this code within the next 30 minutes to reset your password.";
        $headers = "From: c.kheilanthony@gmail.com";

        if (mail($email, $subject, $message, $headers)) {
            // Store the code, user_id, and expiration time in the database
            $user_id = mysqli_fetch_assoc($result)['id'];
            $expires_at = time() + 1800; // Expires in 30 minutes
            $sql = "INSERT INTO password_reset_codes (user_id, code, expires_at) VALUES ('$user_id', '$code', '$expires_at')";
            mysqli_query($conn, $sql);
        
            // Redirect to the verify-code.php page
            header("Location: verify-code.php?email=$email");
            exit();
        } else {
            echo "Mailer Error: " . error_get_last()['message'];
            header("Location: forgot-password.php?error=Failed to send the verification code. Please try again.");
            exit();
        }
        
    } else {
        header("Location: forgot-password.php?error=Email not found");
        exit();
    }
} else {
    header("Location: forgot-password.php");
    exit();
}
?>
