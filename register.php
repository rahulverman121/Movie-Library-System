<?php
include('connection.php');

$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$regquery="insert into customer(fname,lname,email,username,password) values('$fname','$lname','$email','$username','$password')";
		$reg = mysqli_query($con,$regquery);
		if(!$reg) {
			echo "Registration Failed :(";
		}
		else {
			echo "Registered successfully. Login and enjoy your playlist :)";
		}

?>