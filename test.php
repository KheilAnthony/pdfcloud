<?php

require 'C:\xampp\htdocs\finals\PHPMailer-master\PHPMailer-master\src\PHPMailer.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->SMTPDebug = 0; // Enable verbose debug output
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'cunanankheilanthony@gmail.com'; // SMTP username
    $mail->Password = 'syzrnnrhzdadhqmz'; // SMTP password

    //Recipients
    $mail->setFrom('cunanankheilanthony@gmail.com', 'Kheil');
    $mail->addAddress('c.kheilanthony@gmail.com', 'Recipient Name');

    //Content
    $mail->isHTML(false); // Set email format to plain text
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email from PHPMailer.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
