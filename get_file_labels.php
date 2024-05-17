<?php

?>

<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
    $file_id = $_POST['file_id'];

    $sql = "SELECT label_id FROM file_labels WHERE file_id='$file_id'";
    $result = mysqli_query($conn, $sql);
    $associated_labels = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $associated_labels[] = $row['label_id'];
    }
    echo json_encode($associated_labels);
    
} else {
    header("Location: login-page.php");
    exit();
}
?>
