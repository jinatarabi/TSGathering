<?php

include 'connection.php';

if(isset($_POST['submit_button']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$desig = $_POST['designation'];
	$pass = $_POST['password'];
	

	if( (!$name) or (!$pass) or (!$desig) )
	{
		header("Location:signup.php?Field is empty!");
		exit();
	}

	$_SESSION['fullname'] = $_POST['name'];
	$_SESSION['designation'] = $_POST['designation'];

	if($desig=="teacher"){

		$sql = "SELECT * FROM 'teacher' where email='$email' and password='$pass'";
		$rs = mysqli_query($conn, $sql);
		$rows=mysqli_num_rows($rs);


		if($rows==0)
    	{
        	$sql = "INSERT INTO teacher( name, email, password) VALUES ('$name', '$email', '$pass')";
			mysqli_query($conn, $sql);

			
			header("Location: home.php?Successfullysignedup");
			exit();
    	}
    	else
    	{
        	header("Location: signin.php ? You have already registered. please Sign in...");
			exit();
    	}
	}
	else{
		$sql = "SELECT * FROM `student` where email='$email' and password='$pass'";
		$rs = mysqli_query($conn, $sql);
		$rows=mysqli_num_rows($rs);


		if($rows==0)
    	{
        	$sql = "INSERT INTO student(name, email, password) VALUES ('$name', '$email', '$pass')";
			mysqli_query($conn, $sql);

			header("Location: home.php?Successfullysignedup");
			exit();
    	}
    	else
    	{
        	header("Location: signin.php ? You have already registered. please Sign in...");
			exit();
    	}
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
				<li><a href="index.php">Home</a></li>
				<li><a href="signin.php">Sign In</a></li>
				<li id="active"><a href="signup.php">Sign Up</a></li>
			</ul> 
		</div>

		
		<div id="table">	
			<form id="contact_form" action="signup.php" method="post" enctype="multipart/form-data">

				<div class="row" style="text-align:left;">
					<label for="name">Name:</label><br />
					<input id="name" class="input" name="name" type="text" value="" size="30" /><br />
				</div>

				<div class="row" style="text-align:left;">
					<label for="email">Email:</label><br />
					<input id="email" class="input" name="email" type="email" value="" size="30" ><br />
				</div>


				<div class="row" style="text-align:left;">
					<label for="password">Password:</label><br />
					<input id="password" class="input" name="password" type="password" value="" size="30" ><br />
				</div>

				
				<div class="row" style="text-align:left;">
					<label for="designation">Sign Up As:</label><br />
					<input id="designation" class="input" name="designation" type="text" value="" size="30" /><br />
				</div>


				<div  style="text-align: left;">
					<!-- <input type="hidden" name="action" value="submit"/> -->
					<input id="submit_button" name="submit_button" type="submit" value="Sign Up" >					
				</div>

				<div class="row" style="text-align: left;">
					Already have an account? <a href="signin.php">Sign In</a>
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