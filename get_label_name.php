<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
    $label_id = $_GET['label_id'];

    $sql = "SELECT label_name FROM labels WHERE id='$label_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $label_name = $row['label_name'];
        $response = array("status" => "success", "label_name" => $label_name);
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => "Label not found");
        echo json_encode($response);
    }
    
} else {
    header("Location: login-page.php");
    exit();
}
?>
