<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    include "db_conn.php";
} else {
    header("Location: login-page.php");
    exit();
}
?>
<?php
if (isset($_GET['id'])) {
    $file_id = $_GET['id'];
    $user_id = $_SESSION['id'];

    $sql = "SELECT * FROM files WHERE id='$file_id' AND (user_id='$user_id' OR is_public='1')";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $file = mysqli_fetch_assoc($result);
    } else {
        header("Location: main.php?error=File not found");
        exit();
    }
} else {
    header("Location: main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($file['file_name']); ?></title>
    <link rel="icon" type="image/x-icon" href="img/tab.ico">
    <!-- Add your CSS and other head elements here -->
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 667px;
            overflow: hidden;
        }

        embed {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- Add your header, navigation, or other elements here -->

    
    <embed src="<?php echo htmlspecialchars($file['file_path']); ?>" type="application/pdf">

    <!-- Add your footer or other elements here -->
</body>
</html>
