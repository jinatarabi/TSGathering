<?php
session_start();
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

		<br> <br> <br> <br><br><br><br><br><br><br>
		
		<div id="main-content">	
			<?php 

			echo ("<button onclick=\"location.href='overview.php'\">Overview</button>");
					echo "<br><br>";
			

			$desig = $_SESSION['designation'];
			
			if($desig=="teacher"){
				echo ("<button onclick=\"location.href='answer.php'\">Answer the Questions!</button>");

			}
			else
			{
				echo ("<button onclick=\"location.href='ask.php'\">Ask a Question!</button>");
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