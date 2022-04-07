<?php
session_start(); 
include('connection.php');

		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = stripcslashes($username);  
      	$password = stripcslashes($password);  
        	$username = mysqli_real_escape_string($con, $username);  
        	$password = mysqli_real_escape_string($con, $password);
 
		$loginquery="select * from customer where username = '$username' and password= '$password'";
		$log = mysqli_query($con,$loginquery);
		$row = mysqli_fetch_array($log, MYSQLI_ASSOC);  
		$count = mysqli_num_rows($log);
		if($count != 0) {
		$_SESSION["id"] = $row['id'];
		$_SESSION["fname"] = $row['fname'];
		echo $count;
        	}  
		else {  
			echo "Authentication Failed. Provide Valid Credentials :(";
		}

?>