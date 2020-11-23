<?php
 $username = "cs340_rosenauk";
 $password = "8003";
 $host = "classmysql.engr.oregonstate.edu";
 $connector = mysql_connect($host, $username, $password)
    or die("Unable to connect");
 $selected = mysql_select_db("cs340_rosenauk", $connector)
    or die("Unable to connect");
 ?>

<!doctype html>

<style>

.container {
  width: 500px;
  clear: both;
}

.container input {
  width: 100%;
  clear: both;
}

.section {
	border-style: solid;
	width: fit-content;
	padding: 20px;
}

</style>

<html lang="en">
<head>
  <meta charset="utf-8">

  <title>Database Project</title>
  
  <link rel="shortcut icon" href="icon.png" />

</head>

<body>

		<?php
		//execute the SQL query and return records
		$result = mysql_query("SELECT * FROM PlatToVids");
		?>

	<h1>
		PlatToVids
	</h1>
	
	<p>
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/">Home</a>
		&nbsp
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/videogames.php">Videogames</a>
		&nbsp
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/publishers.php">Publishers</a>
		&nbsp
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/platforms.php">Platforms</a>
		&nbsp
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/ratings.php">Ratings</a>
		&nbsp
		<a href="https://web.engr.oregonstate.edu/~rosenauk/cs340/PlatToVids.php">PlatToVids</a>
	</p>
	
	<br>
	
	<p>
		View the table here.
	</p>
	
	<br>
	
	<div class="section">
		<p>
			[Put search here]
			
			<div class="container">
				<form>
				  <label>titleID (use an integer)</label>
				  <input type="number" name="S_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>platformID </label>
				  <input type="number" name="S_platformID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>

			</div>
			
			<br>
			
			Search by titleID:
			<?php
				echo $_GET["S_titleID"];
			?>
			<br>
			Search by platformID:
			<?php
				echo $_GET["S_platformID"];
			?>
			<br>

		</p>
	</div>
	
	<br>
	
	<p>
		[Put Table here] &nbsp (titleID, platformID) [Every platform doesn't need a video game title but normally will]
		

		
		
		<table style=" border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
			<col width= "100px" />
			<col width= "100px" />
		  <tr>
			<th>titleID</th>
			<th>platformID</th>
		  </tr>
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['titleID']}</td>
					<td>{$row['platformID']}</td>
				</tr>";
            }
            ?>
		</table>
	</p>


</body>

</html>

<?php mysql_close($connector); ?>