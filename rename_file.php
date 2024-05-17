<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
    $file_id = $_POST['file_id'];
    $new_file_name = mysqli_real_escape_string($conn, $_POST['new_file_name']);

    // Append .pdf extension to the new file name
    $new_file_name .= ".pdf";

    $sql = "UPDATE files SET file_name='$new_file_name' WHERE id='$file_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    header("Location: login-page.php");
    exit();
}
?>
