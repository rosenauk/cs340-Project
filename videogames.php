<?php
//error_reporting(E_ALL);
//ini_set("display_errors", "On");

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

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
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
			$u_titleID     = $_POST['UpdateButton'];
			$u_title       = $_POST['U_title'];
			$u_releaseDate = $_POST['U_releaseDate'];
			$u_publisherID = $_POST['U_publisherID'];
			$u_ratingID    = $_POST['U_ratingID'];
			
			// debugging print
			//echo $u_title;
			//echo "<td><p>The button selected is " . $row['titleID'] . "</p></td>";
			//echo "UPDATE Videogames SET title='".$u_title."', releaseDate='".$u_releaseDate."', publisherID=$u_publisherID, ratingID=$u_ratingID WHERE titleID=$u_titleID";
			
			$u_sql = mysql_query("UPDATE Videogames SET title='".$u_title."', releaseDate='".$u_releaseDate."', publisherID=$u_publisherID, ratingID=$u_ratingID WHERE titleID=$u_titleID");
			
			// debugging prints
			//$u_sql = mysql_query($u_sql);
			//echo "<b> " . $u_sql . "</b>";					
			
			if($u_sql) {
				//echo "<b> " . $u_sql . "</b>";
				$u_sql = null;
			}
			else {
				echo "Error updating record: " . $connector->error;
				//die( "Error updating record: " . $connector->error);
			}
			mysql_close($connector);
		}
	?>

	<?php
	include 'dbhost.php';
	//execute the SQL query and return records
	$result = mysql_query("SELECT * FROM Videogames");
	?>

	<h1 style="text-align:center;">
		Videogames
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
				include 'dbhost.php';
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
				<!-- <form method="post">
				  <label>titleID (use an integer)</label> -->
				  <input type="number" name="D_titleID"><br />
				  <br>
				  <input style="width = 100px" type="submit">
				</form>
			</div>
			
			<br>
			
			platformID of game you want to delete:
			<?php
				echo $_GET["D_titleID"];
				/*
				if(isset($_POST["D_titleID"]) and is_numeric($_POST["D_titleID"]))
				{
					$title_id = $_POST['D_titleID'];
					$sql = mysql_query("DELETE FROM `Videogames` WHERE `titleID` = $title_id");
				}*/
				
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

				/* if(isset($_POST["D_titleID"]) and is_numeric($_POST["D_titleID"]))
				{
					$title_id = $_POST['D_titleID'];
					$sql = mysql_query("DELETE FROM `Videogames` WHERE `titleID` = $title_id");
				} */
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
		  	// grab publishers
			$pub_result = mysql_query("SELECT * FROM Publishers");
			$options = "";
			while($row_pub = mysql_fetch_array($pub_result)) {
				//echo "<option value='" . $row_pub['pName'] . "'>" . $row['pName'] . "</option>";
				$options = $options.'<option value=' . $row_pub['publisherID'] . '>' 
				. $row_pub['pName'] . '</option>"';
			}

			// grab ratings
			$rat_result = mysql_query("SELECT * FROM Ratings");
			$rat_options = "";
			while($row_rat = mysql_fetch_array($rat_result)) {
				$rat_options = $rat_options.'<option value=' . $row_rat['ratingID'] . '>' 
				. $row_rat['rating'] . '</option>"';
			}

			// table creation
            while ($row = mysql_fetch_assoc($result)) {
				//echo "<form action='videogames.php' method='POST'><tr><td>";
				echo "<form action='videogames.php' method='POST'><tr><td>";
				echo "{$row['titleID']}</td><td>";
				echo "<input type='text' name='U_title' value='" .$row['title']. "'></td><td>";
				echo "<input type='date' name='U_releaseDate' value='" .$row['releaseDate']. "'></td><td>";

				// publisher
				$cur_pub_result = mysql_query("SELECT * 
												FROM Publishers
												WHERE publisherID
												LIKE {$row['publisherID']}");
				$cur_pub = mysql_fetch_assoc($cur_pub_result);

				//echo "<select name='&#92;" . $row['publisherID'] . "&#92;'>";
				echo "<select name='U_publisherID'>";
				echo "<option value='" . $cur_pub['publisherID'] . "'>" . $cur_pub['pName'] . "</option>";
				echo $options;
				echo "</select></td><td>";

				// ratings
				$cur_rat_result = mysql_query("SELECT * 
												FROM Ratings
												WHERE ratingID
												LIKE {$row['ratingID']}");
				$rat_pub = mysql_fetch_assoc($cur_rat_result);

				//echo "<select name='&#92;" . $row['ratingID'] . "&#92;'>";
				echo "<select name='U_ratingID'>";
				echo "<option value='" . $rat_pub['ratingID'] . "'>" . $rat_pub['rating'] . "</option>";
				echo $rat_options;
				echo "</select></td><td>";

				//echo '<td><form method="post"></td>';
				//echo '<td><button class="update-button" name="UpdateButton'
				//. $row['titleID'] .'" value="' . $row['titleID'] . '"/>Update</td></button>';
				// update button
				echo '<td><button class="update-button" name="UpdateButton'
				.'" value="' . $row['titleID'] . '"/>Update</td></button>';
				echo '<td></form></td>';

				
				echo "</tr>";
			}
			/*
			if(isset($_POST['rowButton' . $row['titleID']])){
				echo "<td><p>The button selected is " . $row['titleID'] . "</p></td>";
				//$sql = "UPDATE Videogames SET title='{}'"
			}
			*/
            ?>

		</table>
		
		<div class="form-popup" id="myForm">
			<form action="/action_page.php" class="form-container">
				<h1>Update</h1>

				<label for="title"><b>Title</b></label>
				<input type="text" placeholder="Enter Title" name="Title" required>

				<label for="releaseDate"><b>Release Date</b></label>
				<input type="text" placeholder="Update releaseDate" name="Release Date" required>

				<button type="submit" class="btn">Submit</button>
				<button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
			</form>
		</div>

	</p>
	</div>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "none";
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

</body>

</html>

<?php mysql_close($connector); ?>