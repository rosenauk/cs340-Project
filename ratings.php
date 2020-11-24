<?php
 include_once 'dbhost.php';
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
		$result = mysql_query("SELECT * FROM Ratings");
		?>

	<h1>
		Ratings
	</h1>
	
	<p>
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
	
	<p>
		View, add to, and delete from the table here.
	</p>
	
	<br>
	
	<div class="section">
		<p>
			[Put stuff to add an entry here]
			
			<div class="container">
				<form>
				  <label>ratingID (use an integer)</label>
				  <input type="number" name="A_ratingID"><br />
				  <label>titleID (use an integer)</label>
				  <input type="number" name="A_titleID"><br />
				  <label>rating</label>
				  <input type="text" name="A_rating"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_rating"];

			?>
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			[Put stuff to delete an entry here]
			<div class="container">
				<form method="post">
				  <label>ratingID (use an integer)</label>
				  <input type="number" name="D_ratingID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			ratingID of rating you want to delete:
			<?php
				echo $_GET["D_ratingID"];
				if(isset($_POST["D_ratingID"]) and is_numeric($_POST["D_ratingID"]))
				{
					$rating_id = $_POST['D_ratingID'];
					$sql = mysql_query("DELETE FROM `Ratings` WHERE `ratingID` = $rating_id");
				}
			?>
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			[Put search here]
			<div class="container">
				<form>
				  <label>ratingID (use an integer)</label>
				  <input type="number" name="S_ratingID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>titleID </label>
				  <input type="number" name="S_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>rating</label>
				  <input type="text" name="S_rating"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			Search by ratingID:
			<?php
				echo $_GET["S_ratingID"];
				
				if($_GET["S_ratingID"])
				{
					$result = mysql_query("SELECT * FROM Ratings WHERE ratingID LIKE {$_GET["S_ratingID"]}");
				};
			?>
			<br>
			Search by titleID:
			<?php
				echo $_GET["S_titleID"];
				
				if($_GET["S_titleID"])
				{
					$result = mysql_query("SELECT * FROM Ratings WHERE titleID LIKE {$_GET["S_titleID"]}");
				};
			?>
			<br>
			Search by rating:
			<?php
				echo $_GET["S_rating"];
				
				if($_GET["S_rating"])
				{
					$result = mysql_query("SELECT * FROM Ratings WHERE rating LIKE {$_GET["S_rating"]}");
				};
			?>
			<br>
		</p>
	</div>
	
	<br>
	
	<p>
		[Put Table here] &nbsp (titleID FK from Videogames, rating, ratingID)

		
		
		<table style="border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
			<col width= "100px" />
			<col width= "100px" />
			<col width= "100px" />
		  <tr>
			<th>ratingID</th>
			<th>titleID</th>
			<th>rating</th>
			<th> </th>
		  </tr>
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['ratingID']}</td>
					<td>{$row['titleID']}</td>
					<td>{$row['rating']}</td>
					<td><button>Edit</button></td>
				</tr>";
            }
            ?>
		</table>
	</p>



</body>

</html>

<?php mysql_close($connector); ?>