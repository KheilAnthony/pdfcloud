<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";

    $file_id = $_POST['file_id'];

    // Fetch the file path from the database
    $sql = "SELECT file_path FROM files WHERE id='$file_id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $file_path = $row['file_path'];

        // Delete the file from the server
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Delete the file from the database
        $sql = "DELETE FROM files WHERE id='$file_id'";
        mysqli_query($conn, $sql);
        
        echo "File deleted successfully.";
    } else {
        echo "File not found in the database.";
    }
    
} else {
    header("Location: login-page.php");
    exit();
}
?>
