<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";

    if (isset($_POST['file_id']) && isset($_POST['labels'])) {
        $file_id = $_POST['file_id'];
        $labels = json_decode($_POST['labels']);

        // Remove existing associations between the file and labels
        $sql_remove = "DELETE FROM file_labels WHERE file_id='$file_id'";
        mysqli_query($conn, $sql_remove);

        // Add new associations between the file and selected labels
        foreach ($labels as $label_id) {
            $sql_insert = "INSERT INTO file_labels (file_id, label_id) VALUES ('$file_id', '$label_id')";
            mysqli_query($conn, $sql_insert);
        }

        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
