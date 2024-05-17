<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
} else {
    header("Location: login-page.php");
    exit();
}

if (isset($_GET['id']) && isset($_GET['is_public'])) {
    $file_id = $_GET['id'];
    $user_id = $_SESSION['id'];
    $is_public = $_GET['is_public'] === 'true' ? 1 : 0;

    $sql = "UPDATE files SET is_public='$is_public' WHERE id='$file_id' AND user_id='$user_id'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(['success' => 'Sharing status updated']);
    } else {
        echo json_encode(['error' => 'Failed to update sharing status']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
