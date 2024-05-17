<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
    $label_id = $_POST['label_id'];
    $new_label_name = mysqli_real_escape_string($conn, $_POST['new_label_name']);
        
    error_log("Label ID: " . $label_id);
    error_log("New Label Name: " . $new_label_name);

    $sql = "UPDATE labels SET label_name='$new_label_name' WHERE id='$label_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $response = array("status" => "success", "label_id" => $label_id, "new_label_name" => $new_label_name);
        echo json_encode($response);
    } else {
        $response = array("status" => "error", "message" => mysqli_error($conn));
        echo json_encode($response);
    }
    
} else {
    header("Location: login-page.php");
    exit();
}
?>
