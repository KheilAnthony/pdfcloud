<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include "db_conn.php";

    if (isset($_FILES['profile_picture'])) {

        function validate($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $allowed_image_types = ['image/jpeg', 'image/png', 'image/gif'];
        $image_type = mime_content_type($_FILES['profile_picture']['tmp_name']);

        if (!in_array($image_type, $allowed_image_types)) {
            header("Location: accsettings.php?error=Invalid image type. Please upload a JPEG, PNG, or GIF file.");
            exit();
        }

        $target_dir = "uploads/profile_pics/";

        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $file_name = uniqid() . '_' . basename($_FILES["profile_picture"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $user_id = $_SESSION['id'];
            $sql = "UPDATE users SET profile_picture = ? WHERE id = ?";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("si", $file_name, $user_id);

            if ($stmt->execute()) {
                $_SESSION['profile_picture'] = $file_name;
                header("Location: accsettings.php?success=Profile picture updated successfully.");
            } else {
                header("Location: accsettings.php?error=Failed to update profile picture in the database.");
            }
            

            $stmt->close();
        } else {
            header("Location: accsettings.php?error=Failed to upload the image file.");
        }
    } else {
        header("Location: accsettings.php?error=No image file was uploaded.");
    }
} else {
    header("Location: login-page.php");
    exit();
}
