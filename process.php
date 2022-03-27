<?php

$host = 'localhost:3302';
$user = 'root';
$pass = '';
$db = 'wootube';
$con = mysqli_connect($host,$user,$pass,$db) ;
if(!$con) {
	echo "Database Connection Failed";
}
else {
	if($_POST['action']=='signup') {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$regquery="insert into customer(fname,lname,email,username,password) values('$fname','$lname','$email','$username','$password')";
		$reg = mysqli_query($con,$regquery);
		if(!$reg) {
			echo "Registration Failed :(";
		}
		else {
			echo "Registered successfully. Login and enjoy your playlist :)";
		}
	}

	else if ($_POST['action']=='login') {
		
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$loginquery="select * from customer where username = '$username' and password= '$password'";
		$log = mysqli_query($con,$loginquery);
		$row = mysqli_fetch_array($log, MYSQLI_ASSOC);  
		$count = mysqli_num_rows($log);
		if($count) {
		session_start(); 
		$_SESSION["id"] = $row['id'];
		$_SESSION["fname"] = $row['fname'];
		echo "1";
        	}  
		else {  
			echo "Authentication Failed. Provide Valid Credentials :(";
		}
}
		else if ($_GET['action']=='addtoplaylist') {
			$image = $_GET['image'];
			$movietitle = $_GET['movietitle'];
			$year = $_GET['year'];
			$genre = $_GET['genre'];
			$released = $_GET['released'];
			$duration = $_GET['duration'];
			$userid = $_GET['userid'];
			$playquery = "insert into playlist(movietitle,year,genre,released,duration,userid,image) values('$movietitle','$year','$genre','$released','$duration','$userid','$image')";
		$play = mysqli_query($con,$playquery);
		if($play) {
			echo "Movie Added to your Playlist. Enjoy.. :)";
			
		}
		else {
			echo "Encountered Some Error Adding Movie to Your Playlist. Try Again. :(";
		}			
	}
else 
echo ":(";
}
?>