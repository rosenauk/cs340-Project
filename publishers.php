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
		$result = mysql_query("SELECT * FROM Publishers ORDER BY publisherID ASC");
		?>

	<h1 style="text-align:center;">
		Publishers
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

	<br>
<div class="row">
	<div class="column" style="margin-left:15%;">	
	<div class="section">
		<p>
			<h1 style="text-align:center;">Add An Entry</h1>
			
			<div class="container">
				<form>
				<!--
				  <label>publisherID</label>
				  <input type="number" name="A_publisherID"><br />
				  -->
				  
				  <label>pName</label>
				  <input type="text" name="A_pName"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			You want to add:
			<?php
				echo $_GET["A_pName"];
				
				
				
				if($_GET["A_pName"])	
				{
					$select="INSERT INTO Publishers(pName) VALUES ('{$_GET["A_pName"]}')";
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
				  <label>publisherID</label>
				  <input type="number" name="D_publisherID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			titleID of publisher you want to delete:
			<?php
				echo $_GET["D_publisherID"];
				/*
				if(isset($_POST["D_publisherID"]) and is_numeric($_POST["D_publisherID"]))
				{
					$platform_id = $_POST['D_publisherID'];
					$sql = mysql_query("DELETE FROM `Publishers` WHERE `publisherID` = $platform_id");
				}
				*/
				
				if($_GET["D_publisherID"])
				{
					$sql = mysql_query("DELETE FROM `Publishers` WHERE `publisherID` = '{$_GET["D_publisherID"]}'");
					
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
				  <label>publisherID</label>
				  <input type="number" name="S_publisherID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
				
				<form>
				<br>
				  <label>pName</label>
				  <input type="text" name="S_pName"><br />
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
			
			Search by publisherID:
			<?php
				echo $_GET["S_publisherID"];
				
				if($_GET["S_publisherID"])
				{
					$result = mysql_query("SELECT * FROM Publishers WHERE publisherID LIKE {$_GET["S_publisherID"]}");
				};
				
				
			?>
			<br>
			Search by pName:
			<?php
				echo $_GET["S_pName"];
				
				
				if($_GET["S_pName"])
				{
					$result = mysql_query("SELECT * FROM Publishers WHERE pName LIKE '{$_GET["S_pName"]}'");
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
			<th>publisherID</th>
			<th>pName</th>
			<th> </th>
		  </tr>
		  <?php
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<tr>
					<td>{$row['publisherID']}</td>
					<td>{$row['pName']}</td>
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