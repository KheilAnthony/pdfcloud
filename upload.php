<?php
session_start();
include "db_conn.php";
if (isset($_FILES['pdfFile'])) {
    $file = $_FILES['pdfFile'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_error = $file['error'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if ($file_ext === 'pdf') {
        $file_new_name = uniqid('', true) . '.' . $file_ext;
        $file_destination = 'uploads/' . $file_new_name;
        if (move_uploaded_file($file_tmp, $file_destination)) {
            $user_id = $_SESSION['id'];
            $sql = "INSERT INTO files (user_id, file_name, file_path) VALUES ('$user_id', '$file_name', '$file_destination')";
            if (mysqli_query($conn, $sql)) {
                header("Location: main.php?upload_success");
            } else {
                header("Location: main.php?error=Failed to upload file to the database");
            }
        } else {
            header("Location: main.php?error=Failed to move uploaded file");
        }
    } else {
        header("Location: main.php?error=Invalid file type, please upload a PDF file");
    }
} else {
    header("Location: main.php");
    exit();
}
?>