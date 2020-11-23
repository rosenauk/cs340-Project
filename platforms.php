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
		$result = mysql_query("SELECT * FROM Platforms");
		?>

	<h1 style="text-align:center;">
		Platforms
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
				  <label>platformID</label>
				  <input type="number" name="A_platformID"><br />
				  <label>platform</label>
				  <input type="text" name="A_platform"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_platform"];

			?>
			
			
		</p>
	</div>
	
	<br>
	
	<div class="section">
		<p>
			<h1 style="text-align:center;">Delete An Entry</h1>

			<div class="container">
				<form>
				  <label>platformID</label>
				  <input type="number" name="D_platformID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			platformID of game you want to delete:
			<?php
				echo $_GET["D_platformID"];

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
				  <label>platformID</label>
				  <input type="number" name="S_platformID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>platform</label>
				  <input type="text" name="S_platform"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				  <br>
				  <br>
				  <input style="width = 100px" type="submit" value="Clear">
				</form>
				
			</div>
			
			<br>
			
			Search by platformID:
			<?php
				echo $_GET["S_platformID"];
				
				if($_GET["S_platformID"])
				{
					$result = mysql_query("SELECT * FROM Platforms WHERE platformID LIKE {$_GET["S_platformID"]}");
				};
			?>
			<br>
			Search by platform:
			<?php
				echo $_GET["S_platform"];
				
				if($_GET["S_platform"])
				{
					$result = mysql_query("SELECT * FROM Platforms WHERE platform LIKE {$_GET["S_platform"]}");
				};
			?>
			
		</p>
	</div>
	<br>
	<br>
	
	</div>
	
	<br>

	<div class="column">
	<p>
		<h1>Table</h1>
		
		
		
		
		<table style=" border:1px solid black; border-collapse: collapse; text-align: left;background-color: #F5F5F5;">
		
			<col width= "125px" />
			<col width= "150px" />
		  <tr>
			<th>platformID</th>
			<th>platform</th>
			<th> </th>
		  </tr>
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['platformID']}</td>
					<td>{$row['platform']}</td>
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