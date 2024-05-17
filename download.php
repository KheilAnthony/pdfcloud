<?php
// Check if the file ID parameter was passed
if (isset($_GET['file_id'])) {
    // Fetch the file information from the database
    include "db_conn.php";
    $file_id = $_GET['file_id'];
    $sql = "SELECT file_name, file_path FROM files WHERE id='$file_id'";
    $result = mysqli_query($conn, $sql);
    $file = mysqli_fetch_assoc($result);

    // Check if the file was found
    if ($file) {
        // Set the headers to force a download of the file
        header("Content-Type: application/pdf");
        header("Content-Disposition: attachment; filename=\"" . $file['file_name'] . "\"");
        header("Content-Length: " . filesize($file['file_path']));

        // Output the file contents
        readfile($file['file_path']);
    }
}

// Exit the script to prevent any additional output
exit();
?>
