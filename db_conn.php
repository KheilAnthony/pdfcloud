<?php 
$conn = mysqli_connect('localhost','shaun','test1234','playwise');
    // check connection
    if(!$conn){
        echo "connection not established:".mysqli_connect_error();
    }
 ?>