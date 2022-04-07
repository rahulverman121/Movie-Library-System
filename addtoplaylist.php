<?php
include('connection.php');

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

?>		