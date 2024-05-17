<?php
session_start();

if (isset($_SESSION['id'])) {
    include "db_conn.php";
    $user_id = $_SESSION['id'];
    $sql = "SELECT id, label_name FROM labels WHERE user_id = '$user_id'";
    $result = mysqli_query($conn, $sql);
    $labels = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($conn);
    header('Content-Type: application/json');
    echo json_encode($labels);
} else {
    header("Location: login-page.php");
    exit();
}
?>
