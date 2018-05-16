<?php

include 'connection.php';

if(isset($_POST['submit_button']))
{
	$question = $_POST['question'];

	if( (!$question) )
	{
		header("Location:ask.php?Field is empty!");
		exit();
	}

	$sql = "SELECT question FROM  question WHERE question='$question'";
	$rs = mysqli_query($conn, $sql);
	$rows=mysqli_num_rows($rs);

	$email = $_SESSION['email'];

	if($rows==0)
    {
    	$sql = "INSERT INTO question(email, question) VALUES ('$email', '$question')";
			mysqli_query($conn, $sql);

			
			header("Location: home.php?SuccessfullyAsked");
			exit();
    }
    else
    {
    	header("Location: ask.php ? This question has already beenasked...");
		exit();
    }
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

		<br> <br> <br> <br><br>
		
		<div id="main-content">	


			<form  action="ask.php" method="post" enctype="multipart/form-data">

				<div class="row" style="text-align:left;">
					<label for="question">Question:</label><br />
					<input class="input" name="question" type="text" size="30" ><br />
				</div>

				<div  style="text-align: left;">
					<!-- <input type="hidden" name="action" value="submit"/> -->
					<input id="submit_button" name="submit_button" type="submit" value="Ask" >					
				</div>

			</form>

			<br><br>

			<?php 


			echo ("<button onclick=\"location.href='question.php'\"> << Back</button>");
			echo "   ";
			echo ("<button onclick=\"location.href='overview.php'\">Overview >> </button>");
			

			$desig = $_SESSION['designation'];
			
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