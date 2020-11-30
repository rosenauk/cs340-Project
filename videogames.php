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

.row {
  display: flex;
}

/* Create two equal columns that sits next to each other */
.column {
  flex: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
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

	<h1 style="text-align:center;">
		Videogames
	</h1>
	
	<p style="text-align:center;">
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

	
	<br>
<div class="row">
	<div class="column" style="margin-left:15%;">
	<div class="section">
		<p>
			<h1 style="text-align:center;">Add An Entry</h1>
			
			<div class="container">
				<form>
				<!--
				  <label>titleID</label>
				  <input type="number" name="A_titleID"><br />
				  -->
				  <label>title</label>
				  <input type="text" name="A_title"><br />
				  <br>
				  <label>releaseDate</label>
				  <input type="date" name="A_releaseDate"><br />
				  <br>
				  <label>publisherID (optional)</label>
				  <input type="number" name="A_publisherID"><br />
				  <br>
				  <label>ratingID (optional)</label>
				  <input type="number" name="A_ratingID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_title"];

				if($_GET["A_title"] && $_GET["A_publisherID"] && $_GET["A_ratingID"])	
				{
					
					$select="INSERT INTO Videogames(title,releaseDate,publisherID,ratingID) VALUES ('{$_GET["A_title"]}','{$_GET["A_releaseDate"]}','{$_GET["A_publisherID"]}','{$_GET["A_ratingID"]}')";
					$sql=mysql_query($select);
					
					
					echo '
					<form>
						<br>
						<br>
						<input style="width = 100px" type="submit" value="Confirm">
					</form>
					';
				}
				
				else if($_GET["A_title"] && $_GET["A_publisherID"])	
				{
					$select="INSERT INTO Videogames(title,releaseDate,publisherID,ratingID) VALUES ('{$_GET["A_title"]}','{$_GET["A_releaseDate"]}','{$_GET["A_publisherID"]}',NULL)";
					$sql=mysql_query($select);
					
					
					echo '
					<form>
						<br>
						<br>
						<input style="width = 100px" type="submit" value="Confirm">
					</form>
					';
				}
				
				else if($_GET["A_title"] && $_GET["A_ratingID"])	
				{
					
					$select="INSERT INTO Videogames(title,releaseDate,publisherID,ratingID) VALUES ('{$_GET["A_title"]}','{$_GET["A_releaseDate"]}',NULL,'{$_GET["A_ratingID"]}')";
					$sql=mysql_query($select);
					
					
					echo '
					<form>
						<br>
						<br>
						<input style="width = 100px" type="submit" value="Confirm">
					</form>
					';
				}
				
				else if($_GET["A_title"])	
				{
					
					$select="INSERT INTO Videogames(title,releaseDate,publisherID,ratingID) VALUES ('{$_GET["A_title"]}','{$_GET["A_releaseDate"]}',NULL,NULL)";
					$sql=mysql_query($select);
					
					
					echo '
					<form>
						<br>
						<br>
						<input style="width = 100px" type="submit" value="Confirm">
					</form>
					';
				}
				
			?>
			

			
		</p>
	</div>
	
	
	
	<br>
	
	
	<div class="section">
		<p>
			<h1 style="text-align:center;">Delete An Entry</h1>
			<div class="container">
				<form>
				  <label>titleID</label>
				  <input type="number" name="D_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			titleID of game you want to delete:
			<?php
				echo $_GET["D_titleID"];
				
				if($_GET["D_titleID"])
				{
					$sql = mysql_query("DELETE FROM `Videogames` WHERE `titleID` = '{$_GET["D_titleID"]}'");
					
					echo '
					<form>
						<br>
						<br>
						<input style="width = 100px" type="submit" value="Confirm">
					</form>
					';
				}

			?>
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			<h1 style="text-align:center;">Search The Table</h1>
			
			<div class="container">
				<form>
				<br>
				  <label>titleID</label>
				  <input type="number" name="S_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>title </label>
				  <input type="text" name="S_title"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>releaseDate</label>
				  <input type="date" name="S_releaseDate"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>publisherID</label>
				  <input type="number" name="S_publisherID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>ratingID</label>
				  <input type="number" name="S_ratingID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <br>
				  <br>
				  <input style="width = 100px" type="submit" value="Clear">
				</form>
				
				
				
				<!--
				<form>
				<br>
				  <label>titleID</label>
				  <input type="number" name="S_titleID"><br />
				
				<br>
				  <label>title </label>
				  <input type="text" name="S_title"><br />

				<br>
				  <label>releaseDate</label>
				  <input type="date" name="S_releaseDate"><br />

				<br>
				  <label>publisherID</label>
				  <input type="number" name="S_publisherID"><br />

				<br>
				  <label>ratingID</label>
				  <input type="number" name="S_ratingID"><br />
				  <br>
				  
				  <input style="width = 100px" type="submit">
				</form>

				
				<form>
				  <br>
				  <br>
				  <input style="width = 100px" type="submit" value="Clear">
				</form>
				-->
				
			</div>
			
			<br>
			
			Search by titleID:
			<?php
				echo $_GET["S_titleID"];
				
				if($_GET["S_titleID"])
				{
					//$result = mysql_query("SELECT * FROM Videogames WHERE titleID LIKE {$_GET["S_titleID"]}");
					$result = mysql_query("SELECT * FROM Videogames WHERE titleID LIKE {$_GET["S_titleID"]}");
				};

			?>
			
			<br>
			Search by title:
			<?php
				echo $_GET["S_title"];
				
				
				if($_GET["S_title"])
				{
					$string = $_GET["S_title"];
					//$result = mysql_query("SELECT * FROM Videogames WHERE title LIKE '{$_GET["S_title"]}'");
					$result = mysql_query("SELECT * FROM Videogames WHERE title LIKE '%{$_GET["S_title"]}%'");
				};
				
			?>
			
			<br>
			Search by releaseDate:
			<?php
				echo $_GET["S_releaseDate"];
				
				
				if($_GET["S_releaseDate"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE releaseDate LIKE '{$_GET["S_releaseDate"]}'");
				};
			?>
			
			<br>
			Search by publisherID:
			<?php
				echo $_GET["S_publisherID"];
				
				if($_GET["S_publisherID"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE publisherID LIKE {$_GET["S_publisherID"]}");
				};

			?>
			
			<br>
			Search by ratingID:
			<?php
				echo $_GET["S_ratingID"];
				
				if($_GET["S_ratingID"])
				{
					$result = mysql_query("SELECT * FROM Videogames WHERE ratingID LIKE {$_GET["S_ratingID"]}");
				};

			?>
			
		</p>
	</div>
	<br>
	<br>
	<br>
	
	</div>
	
	<br>
	
	<div class="column">
	
	<p>
		<h1>Table</h1>
		
		
		
		<table style=" border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
			
			<col width= "100px" />
			<col width= "200px" />
			<col width= "125px" />
			<col width= "125px" />
			<col width= "125px" />
		  <tr>
			<th>titleID</th>
			<th>title</th>
			<th>releaseDate</th>
			<th>publisherID</th>
			<th>ratingID</th>
			<th> </th>
		  </tr>
		  
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['titleID']}</td>
					<td>{$row['title']}</td>
					<td>{$row['releaseDate']}</td>
					<td>{$row['publisherID']}</td>
					<td>{$row['ratingID']}</td>
					<td><button>Edit</button></td>
				</tr>";
            }
            ?>

		</table>
	</p>
	</div>
</div>
</body>

</html>

<?php mysql_close($connector); ?>