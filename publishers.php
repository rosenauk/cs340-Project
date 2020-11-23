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
		$result = mysql_query("SELECT * FROM Publishers");
		?>

	<h1>
		Publishers
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
		View, add to, and delete from the table here.
	</p>
	
	<br>
	
	<div class="section">
		<p>
			[Put stuff to add an entry here]
			
			<div class="container">
				<form>
				  <label>publisherID (use an integer)</label>
				  <input type="number" name="A_publisherID"><br />
				  <label>titleID (title of the game)</label>
				  <input type="text" name="A_titleID"><br />
				  <label>pName</label>
				  <input type="text" name="A_pName"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_publisherID"];

			?>
			
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			[Put stuff to delete an entry here]
			
			<div class="container">
				<form>
				  <label>publisherID (use an integer)</label>
				  <input type="number" name="D_publisherID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			titleID of publisher you want to delete:
			<?php
				echo $_GET["D_publisherID"];

			?>
			
			
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			[Put search here]
			
			<div class="container">
				<form>
				  <label>publisherID (use an integer)</label>
				  <input type="number" name="S_publisherID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>titleID </label>
				  <input type="text" name="S_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <label>pName</label>
				  <input type="text" name="S_pName"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			Search by publisherID:
			<?php
				echo $_GET["S_publisherID"];
			?>
			<br>
			Search by titleID:
			<?php
				echo $_GET["S_titleID"];
			?>
			<br>
			Search by pName:
			<?php
				echo $_GET["S_pName"];
			?>
			<br>
		</p>
	</div>
	
	<br>
	
	<p>
		[Put Table here] &nbsp (titleID FK from Videogames, pName, publisherID)
		
		
		
		
		<table style=" border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
			<col width= "125px" />
			<col width= "100px" />
			<col width= "150px" />
		  <tr>
			<th>publisherID</th>
			<th>titleID</th>
			<th>pName</th>
			<th> </th>
		  </tr>
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['publisherID']}</td>
					<td>{$row['titleID']}</td>
					<td>{$row['pName']}</td>
					<td><button>Edit</button></td>
				</tr>";
            }
            ?>
		</table>
	</p>



</body>

</html>

<?php mysql_close($connector); ?>