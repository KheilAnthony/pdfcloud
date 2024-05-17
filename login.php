<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: login-page.php?error=Email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login-page.php?error=Password is required");
	    exit();
	}else{
        // hashing the password
        $pass = md5($pass);
        
		$sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
				$_SESSION['profile_picture'] = $row['profile_picture'];
            	header("Location: main.php");
		        exit();
            }else{
				header("Location: login-page.php?error=Incorrect Email or password. You may contact the developers if you forgot your password: jhestindigap@gmail.com");
		        exit();
			}
		}else{
			header("Location: login-page.php?error=Incorrect Email or password. You may contact the developers if you forgot your password: jhestindigap@gmail.com");
	        exit();
		}
	}
	
}else{
	header("Location: login-page.php");
	exit();
}
