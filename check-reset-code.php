<!-- check-reset-code.php -->
<?php
session_start();
require_once 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $input_code = $_POST['code'];

    // Check if the code exists and is not expired
    $sql = "SELECT * FROM password_reset_codes JOIN users ON password_reset_codes.user_id = users.id WHERE users.email = '$email' AND password_reset_codes.code = '$input_code' AND password_reset_codes.expires_at >= UNIX_TIMESTAMP()";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Redirect to the reset-password.php page
        header("Location: reset-password.php?email=$email");
        exit();
    } else {
        header("Location: verify-code.php?email=$email&error=Invalid or expired code");
        exit();
    }
} else {
    header("Location: verify-code.php");
    exit();
}
?>
