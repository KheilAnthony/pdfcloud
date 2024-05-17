<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    include "db_conn.php";

if (isset($_POST['fullname'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$fullname = validate($_POST['fullname']);
    
    if(empty($fullname)){
        header("Location: accsettings.php?error=No name entered");
        exit();
    }else {
        $id = $_SESSION['id'];

        $sql_2 = "UPDATE users
                      SET name='$fullname'
                      WHERE id='$id'";
        mysqli_query($conn, $sql_2);

        // Update the session data with the new full name
        $_SESSION['name'] = $fullname; // Add this line

        header("Location: accsettings.php?success=Your name has been changed successfully");
        exit();

    }


    
}else{
	header("Location: accsettings.php");
	exit();
}

}else{
     header("Location: login-page.php");
}