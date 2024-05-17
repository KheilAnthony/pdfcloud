<!-- update-password.php -->
<?php
session_start();
require_once 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password != $confirm_password) {
        header("Location: reset-password.php?email=$email&error=Passwords do not match");
        exit();
    }

    // Update the user's password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password = '$hashed_password' WHERE email = '$email'";
    mysqli_query($conn, $sql);

    // Delete the used password reset code
    $sql = "DELETE FROM password_reset_codes JOIN users ON password_reset_codes.user_id = users.id WHERE users.email = '$email'";
    mysqli_query($conn, $sql);

    // Redirect to the login page with a success message
    header("Location: login-page.php?success=Password updated successfully");
    exit();
} else {
    header("Location: reset-password.php");
    exit();
}
?>
