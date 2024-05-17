<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";

    $label_id = $_POST['label_id'];

    // Delete the file from the database
    $sql = "DELETE FROM labels WHERE id='$label_id'";
    mysqli_query($conn, $sql);

    echo "Label deleted successfully.";

    
} else {
    header("Location: login-page.php");
    exit();
}
?>
