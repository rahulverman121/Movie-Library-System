<?php
session_start();

?>
<!doctype html>
<html>
<head>
<title>WooTube | Movie Library | All your favourite movies at one place
</title>
<link rel="icon" type="image/jpg" href="w.jpg" >
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script></script>
<style>
body {
	background : black ;
}
header {
	top : 0 ;
	left : 0 ;
	background : rgba(0,0,0,0.1) ;
	height : 8rem;
	display : flex ;
	align-items : center ;
	justify-content : center ;
	width : 100% ;
}
#logo {
	
	display : flex ;
	text-shadow : 0 0 5rem red ;
	font-size : 3rem ;
	color : white ;
	cursor : pointer ;
	margin-left : 8% ;
	left : 3% ;
	text-decoration : underline solid red ;
}
#searchform {
	display : flex ;
	width : 70% ;
	justify-content : center ;
}
#searchbox {
	margin : 1rem ; 
	font-size : 1.8rem ;
	padding : 0.2rem ;
	border-radius : 0 0 0 0rem ;
	width : 50% ;
	cursor : pointer ;
	color : rgb(255,255,255);
	background : rgba(0,0,0,0.9) ;
}
#searchbox:hover {
	box-shadow : 0 0 0.6rem red ;
}
#searchicon {
	border-left : none ;
	padding : 0.6rem ;
	cursor : pointer ; 
	width : 5rem ;
}
#searchicon:hover {
	box-shadow : 0 0 0.5rem black ;
}
#profile {
	border-radius : 50% ;
	margin-right : 3rem ;
	
}
.rightt {
	margin-right : 3rem ;
	color : white ;
	display : flex ;
	align-items : center ;
}
#logout {
	cursor : pointer ;
	animation : margin 2s ;
}
#logout:hover {
	margin : 0 0.5rem 0 0;
}
#error {
	color : red ;
	font-size : 1.6rem ;
	text-shadow : 0 0 2rem black ;
}
main {
	margin : 5% 10% ;
	color : red ;
}
#movie {
	width : 60% ;
	background : rgba(0,0,0,0.9) ;
	color : rgb(255,255,255) ;
	border-radius : 10rem 10rem 10rem 10rem ;
	display : flex ;
	margin-left : 20% ;
	margin-right : 10% ;
	border : 1px solid white ;
	position : absolute ;
	
}
#language {
	background : rgba(0,0,0,0.8) ;
	color : white ;
	position : absolute ;
	float : right ;
	padding : 0.6rem 1.2rem;
	font-size : 1.6rem ;
	font-weight : bold ;
	margin-top : 11rem ;
}
#poster {
	background : url(poster.jpg) no-repeat center;
	background-size : contain;
	height : 75rem ;
	border-radius : 10rem 0 0 10rem ;	
	min-width : 45% ;
}
#moviedetail {
	margin : 3rem 5rem ;
	font-size : 2rem ;
}
#moviedetail span {
	font-weight : normal ;
}

.clk {
	font-size : 1.6rem ;
	padding : 0.8rem 1.2rem;
	border : 0.1rem solid red ;
	border-radius : 5% /10%;
	font-weight : 500 ;
	background:red;
	margin : 2.5rem ;
	color : white ;
}
.clk:hover {
	box-shadow : 0 0 2rem red ;
} 
#cardlist {
	display : flex ;
	flex-wrap : wrap ;
}
.card {
	height : 45rem ;
	width : 25rem ;
	background : black ;
	color : white ;
	border-radius : 2.5rem ;
	margin : 2rem ;
	border : 0.1rem solid white ;
	cursor : pointer ;
	overflow : hidden ;
	transition : width 1s, height 1s ;
}
.card:hover {
	width :27rem ;
	height :48rem ;
}
.cardimg {
	height : 100% ;
	overflow : hidden ;
	transition : height 1s ;
}
.cardimg:hover {
	height : 70% ;
}
.poster {
	
	width : 100% ;
	object-fit : cover ;
	border-radius : 2.5rem 2.5rem 0rem 0rem ;
}
.moviedetail {
	margin : 1rem ;
}
.movietitle{
	font-size : 2rem ;
}
#cardadd {
	height : 45rem ;
	width : 25rem ;
	background : rgba(0,0,0,0.6) ;
	color : rgba(255,255,255,0.9) ;
	border-radius : 2.5rem ;
	margin : 2rem ;
	border : 0.1rem solid white ;
	font-size : 30rem ;
	display : flex ;
	align-items : center ;
	justify-content : center ;
	cursor :  pointer ;
	transition : width 1s, height 1s ;
}
#cardadd:hover{
	width :27rem ;
	height :48rem ;
}

@media screen and (max-width: 991px) {
main {
	margin : 5% 0%;
}
#cardlist {
	justify-content : center;
}
#movie {
	width : 100% ;
}
}
</style>
<body>
<?php 
if(isset($_SESSION["id"])) {
?>
<header>
<div id="logo">Woo<div style="color:red;text-decoration : underline solid white;">Tube</div></div>
<script>
$("#logo").click(function() {
	window.location="home.php";
});
</script>
<form method="get" id="searchform">
<input type="search" id="searchbox" name="t" placeholder="Search..">
<img src="srchicon.png" alt="Search your Favourite Movies" id="searchicon">
</form>
<div class="rightt"><img src="avatar1.jpg" width="50rem" id="profile"><a href="logout.php"><img src="logout.png" width="33rem" height="33rem" id="logout"></a></div>

</header>
<script>
var movie;
$(document).ready(function() {
	$("#searchicon").click(function(e) { 
		event.preventDefault();
		var formdata=$("#searchform").serialize();
		$.ajax({
			type: "get",
			url: "http://www.omdbapi.com/?apikey=13e16302&",
			data: formdata,
			success: function(response){
				movie = response;
				console.log(movie);
				if(movie.Response=='False') {
					$("#error").text(movie.Error);
			}
				else {
				$("#title").text(movie.Title);
				$("#year").text(movie.Year);
				$("#released").text(movie.Released);
				$("#runtime").text(movie.Runtime);
				$("#genre").text(movie.Genre);
				$("#director").text(movie.Director);
				$("#writer").text(movie.Writer);
				$("#actors").text(movie.Actors);
				$("#plot").text(movie.Plot);
				$("#language").text(movie.Language);
				$("#error").text(movie.Error);
				$("#response").text(movie.Response);
				$("#image").text(movie.Poster);		$("#poster").css("background","url("+movie.Poster+") no-repeat center");
				$("#movie").slideDown();
				}
			}

});
console.log(formdata);	
});
});
</script>
<section id="movie">
<section id="poster">
<div id="image" style="visibility:hidden"></div>
<div id="language">Language</div>
</section>
<section id="moviedetail">
<section style="height:80%">
<label><label>
<div id="title" style="font-size:4rem;">Drama</div>
<span id="year">Year</span>&nbsp || &nbsp 
<span id="genre">Genre</span>
</br></br>
<label>Writer : &nbsp</label><span id="writer">writer</span></br>
<label>Director : &nbsp</label><span id="director">director</span></br>
<label>Actors / Actress : &nbsp</label><span id="actors">actors</span></br>
<label>Released : &nbsp</label><span id="released" style="color:blue;text-decoration:underline">Release Date</span></br>
<label>Duration : &nbsp</label><span id="runtime">Runtime</span></br></br>
<label>Plot : &nbsp</label><span id="plot">Plot</span>
</br></br>
</section>
<center ><button class="clk" style="margin-top:2rem;" id="addtoplaylist">Add to Playlist<sup>+</sup</button></center>
</section>
</section>

<script>
$(document).ready(function () { 
	$("#addtoplaylist").click(function () { 
		event.preventDefault();
		var playlist="action=addtoplaylist&image="+$('#image').text()+"&movietitle="+$('#title').text()+"&year="+$('#year').text()+"&genre="+$('#genre').text()+"&released="+$('#released').text()+"&duration="+$('#runtime').text()+"&userid="+<?php echo $_SESSION['id']?>;
		$.ajax({
			type: "get",
			url: "addtoplaylist.php/?",
			data: playlist,
			success: function(response){
				alert(response);
				$('#movie').slideToggle();
				 
				window.location ="home.php";
		}
});
});
});
</script>

<script>
$("#movie").hide(0);
</script>
<center id="error"></center>
<main>
<div style="font-size:3rem">Playlist</div>

<section id="cardlist">
<?php
include('connection.php');
$id = $_SESSION["id"] ;
$getplaylist = "select * from playlist where userid = '$id'";
$playlist = mysqli_query($con,$getplaylist);  

if (mysqli_num_rows($playlist) > 0) {
     while($row= mysqli_fetch_assoc($playlist)) {
echo '
<section class="card">
<div class="cardimg">
<img src="'.$row["image"].'" class="poster">
</div>
<section class="moviedetail">
<div class="movietitle">'.$row['movietitle'].'(<i>'.$row['year'].'</i>)</div>
<div>'.$row['genre'].'</div>
Released : <u>'.$row['released'].'</u></br>
Duration : '.$row['duration'].' </br>
</section>
</section>
';

}
}
mysqli_close($con);
?>
<section id="cardadd" onclick='$("#searchbox").focus();'>
+
</section>
</section>
</main>
<?php
}
else {
echo '
<script>
alert("Login with valid Credentials");
window.location.replace("index.html");

</script>
';
}
?>
</body>
</html>
