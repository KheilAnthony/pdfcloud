<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
} else {
    header("Location: login-page.php");
    exit();
}

if (isset($_GET['id'])) {
    $file_id = $_GET['id'];
    $user_id = $_SESSION['id'];

    $sql = "SELECT is_public FROM files WHERE id='$file_id' AND user_id='$user_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $file = mysqli_fetch_assoc($result);
        echo json_encode($file);
    } else {
        echo json_encode(['error' => 'File not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
