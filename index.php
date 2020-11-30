<?php
	include_once 'dbhost.php';
?>
<!doctype html>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Database Project</title>
  
  <link rel="shortcut icon" href="icon.png" />

</head>

<body>

	<h1 style="text-align:center;">
		Video Game Organizer
	</h1>
	
	<p style="text-align:center;">
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/index.php") . "'>Home</a>";
		?>
		&nbsp
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/videogames.php") . "'>Videogames</a>";
		?>
		&nbsp
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/publishers.php") . "'>Publishers</a>";
		?>
		&nbsp
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/platforms.php") . "'>Platforms</a>";
		?>
		&nbsp
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/ratings.php") . "'>Ratings</a>";
		?>
		&nbsp
		<?php
			echo "<a href='" . htmlspecialchars("https://web.engr.oregonstate.edu/~" 
			. urlencode($person) . "/cs340/PlatToVids.php") . "'>PlatToVids</a>";
		?>
	</p>
	
	<br>
	
	<h1 style="text-align:center;">
		Welcome to the page! <br> Click a link to get started.
	</h1>
	
	<div>
	
	<img src="home.jpg" alt="Video game shelves" style="display:block; margin:auto;" height="500px" width="750px">
	
	</div>
	




</body>

</html>