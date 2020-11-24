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
		$result = mysql_query("SELECT * FROM Videogames");
		?>

	<h1>
		Videogames
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
				  <label>titleID (use an integer)</label>
				  <input type="number" name="A_titleID"><br />
				  <label>title (title of the game)</label>
				  <input type="text" name="A_title"><br />
				  <label>releaseDate</label>
				  <input type="date" name="A_releaseDate"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_title"];

				/*$sql = "INSERT INTO Videogames (titleID, title, releaseDate)
					VALUES ('".$_POST["A_titleID"]."','".$_POST["A_title"]."','".$_POST["A_releaseDate"]."')";*/
			?>
			
			
			

			
		</p>
	</div>
	
	
	
	<br>
	
	
	<div class="section">
		<p>
			[Put stuff to delete an entry here]
			<div class="container">
				<form method="post">
				  <label>titleID (use an integer)</label>
				  <input type="number" name="D_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			platformID of game you want to delete:
			<?php
				echo $_GET["D_titleID"];
				if(isset($_POST["D_titleID"]) and is_numeric($_POST["D_titleID"]))
				{
					$title_id = $_POST['D_titleID'];
					$sql = mysql_query("DELETE FROM `Videogames` WHERE `titleID` = $title_id");
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
				  <label>titleID (use an integer)</label>
				  <input type="number" name="S_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>title </label>
				  <input type="text" name="S_title"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>releaseDate</label>
				  <input type="date" name="S_releaseDate"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>Clear</label>
				  <input style="width = 100px" type="submit" value="Clear">
				</form>
			</div>
			
			<br>
			
			Search by titleID:
			<?php
				echo $_GET["S_titleID"];
				
				
				
				if($_GET["S_titleID"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE titleID LIKE {$_GET["S_titleID"]}");
				};

			?>
			
			<br>
			Search by title:
			<?php
				echo $_GET["S_title"];
				
				
				//not working yet !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if($_GET["S_title"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE title LIKE {$_GET["S_title"]}");
				};
				
			?>
			
			<br>
			Search by releaseDate:
			<?php
				echo $_GET["S_releaseDate"];
				
				//not working yet !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
				if($_GET["S_releaseDate"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE releaseDate LIKE {$_GET["S_releaseDate"]}");
				};
			?>
			<br>
		</p>
	</div>
	
	<br>
	
	<p>
		[Put Table here]  &nbsp (titleID, title, releaseDate)
		
		
		
		<table style=" border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
			
			<col width= "100px" />
			<col width= "200px" />
			<col width= "125px" />
		  <tr>
			<th>titleID</th>
			<th>title</th>
			<th>releaseDate</th>
			<th> </th>
		  </tr>
		  
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['titleID']}</td>
					<td>{$row['title']}</td>
					<td>{$row['releaseDate']}</td>
					<td><button>Edit</button></td>
				</tr>";
            }
            ?>

		  
		</table>
	</p>

</body>

</html>

<?php mysql_close($connector); ?>