<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>TS GATHERING</title>

		<link href= "style.css" rel= "stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet"> 
	</head>

	<body>
		<div id="nav1">
			<h1>
				<a href="index.html">TS GATHERING</a>
			</h1>
			
			<ul>
				<li id="active"><a href="home.php">Home</a></li>
				<li> <a href="classroom.php">Classroom</a> </li>
				<li> <a href="question.php">Question Poll</a> </li>
				<li> <a href="resource.php">Resources</a> </li>
				<li> <a href="profile.php"> <?php echo $_SESSION['fullname'] ?> </a> </li>
				<li> <a href="signout.php">Sign Out</a> </li>

			</ul> 
		</div>

		<br> <br> <br>
		
		<div align="center">	
			<?php 

			$query = "SELECT * FROM question";
				$result = mysqli_query($conn,$query);
				$tot = mysqli_num_rows($result);

				if($tot>0)
				{
					echo "<table> <tr>
					<th> Questioner </th>
					<th> Question</th>
					<th> Answers </th>
					<th> </th>
					</tr>";

					while ($data = $result->fetch_assoc()) 
					{
						echo ("<tr>
						<td>".$data["email"]."</td>
						<td>".$data["question"]."</td>
						<td>".$data["answer"]."</td>

						<td><form action=\"answer2.php\" method=\"post\">
						<input name=\"question\" type=\"hidden\" value=\"".$data["question"]."\"/>
						<input type=\"submit\" value=\"Update Answer\"/>
					</form> </td>

						 </tr>");
					}
					echo "</table>";
				}
				else
				{
					echo "No results found!";
				}
		?>

		</font><br>
		</div>

		<div id="footer">
			<font>
				&copy; Allright Reserved
			</font>	
		</div>	
	</body>
</html>