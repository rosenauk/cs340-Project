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
		include 'dbhost.php';

		if(isset($_POST['UpdateButton'])){
			$u_platformID     = $_POST['UpdateButton'];
			$u_platform       = $_POST['U_platform'];
	
			$u_sql = mysql_query("UPDATE Platforms SET platform='".$u_platform."' WHERE platformID=$u_platformID");
			echo $usql;
	
			if($u_sql){
				$u_sql = null;
			}
			else{
				echo "error updating record: " . $connector->error;
			}
			mysql_close($connector);
		}
	?>

<?php
		include 'dbhost.php';
		//execute the SQL query and return records
		$result = mysql_query("SELECT * FROM Platforms");
		?>

	<h1 style="text-align:center;">
		Platforms
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
				  <label>platformID</label>
				  <input type="number" name="A_platformID"><br />
				  -->
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
				
				if($_GET["A_platform"])	
				{
					$select="INSERT INTO Platforms(platform) VALUES ('{$_GET["A_platform"]}')";
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
				/*
				if(isset($_POST["D_platformID"]) and is_numeric($_POST["D_platformID"]))
				{
					$platform_id = $_POST['D_platformID'];
					$sql = mysql_query("DELETE FROM `Platforms` WHERE `platformID` = $platform_id");
				}
				*/
				
				if($_GET["D_platformID"])
				{
					$sql = mysql_query("DELETE FROM `Platforms` WHERE `platformID` = '{$_GET["D_platformID"]}'");
					
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
					$result = mysql_query("SELECT * FROM Platforms WHERE platform LIKE '{$_GET["S_platform"]}'");
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
		  	include 'dbhost.php';
            while ($row = mysql_fetch_assoc($result)) {
                echo
                "<form action='platforms.php' method='POST'><tr>
					<td>{$row['platformID']}</td>
					<td><input type='text' name='U_platform' value='" . $row['platform'] . "'</td>";
				echo '<td><button class="update-button" name="UpdateButton'
				.'" value="' . $row['platformID'] . '"/>Update</td></button>';
				echo '<td></form></td>';
				echo "</tr>";
			}
            ?>
		</table>
	</p>
	</div>

</div>
</body>

</html>
<?php

?>

<?php mysql_close($connector); ?>