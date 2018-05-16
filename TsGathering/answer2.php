<?php
include 'connection.php';

if(isset($_POST['submit_button']))
{
	$answer = $_POST['answer'];
	$question = $_POST['question'];

	if( (!$answer) )
	{
		header("Location:answer2.php?Field is empty!");
		exit();
	}

	mysqli_query($conn, "UPDATE question SET answer='$answer' WHERE question='$question'");

		header("Location: overview.php?SuccessfullyUpdated");
		exit();
}

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

			$question = $_POST['question'];

			$query = "SELECT * FROM question WHERE question='$question'";
				$result = mysqli_query($conn,$query);
				$tot = mysqli_num_rows($result);

				if($tot>0)
				{
					echo "<table> <tr>
					<th> Questioner </th>
					<th> Question</th>
					<th> Answers </th>
					</tr>";

					while ($data = $result->fetch_assoc()) 
					{
						echo ("<tr>
						<td>".$data["email"]."</td>
						<td>".$data["question"]."</td>
						<td>".$data["answer"]."</td>
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


		<form  action="answer2.php" method="post" enctype="multipart/form-data">

				<div class="row" style="text-align:left;">
					<label for="answer">Answer</label><br />
					<input id="answer" class="input" name="answer" type="text" value="" size="30" /><br />
				</div>

				<div  style="text-align: left;">
					<!-- <input type="hidden" name="action" value="submit"/> -->
					<input name="question" type="hidden" value= <?php echo ('"'); echo $_POST['question']; echo ('"');?> />


					<input id="submit_button" name="submit_button" type="submit" value="Update" >					
				</div>

			</form>


		</div>

		<div id="footer">
			<font>
				&copy; Allright Reserved
			</font>	
		</div>	
	</body>
</html>