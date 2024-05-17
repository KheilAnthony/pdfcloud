<?php
session_start();
include "db_conn.php";

if (isset($_POST['label_name'])) {
  $label_name = mysqli_real_escape_string($conn, $_POST['label_name']);
  $label_color = mysqli_real_escape_string($conn, $_POST['label_color']);
  $user_id = $_SESSION['id'];
  $sql = "INSERT INTO labels (user_id, label_name, color, created_at) VALUES ('$user_id', '$label_name', '$label_color', '$created_at')";
  if (mysqli_query($conn, $sql)) {
    header("Location: main.php?create_label_success");
    
    exit();
  } else {
    header("Location: main.php?error=Failed to create new label");
    exit();
  }
} else {
  header("Location: main.php");
  exit();
}
