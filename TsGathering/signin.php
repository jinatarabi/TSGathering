<?php

/*session_start();*/
if(isset($_SESSION['email'])){
    header("location: index.php");
}


include 'connection.php';


if(isset($_POST['submit_button']))
{
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$desig = $_POST['designation'];

	if( (!$email) or (!$pass) or (!$desig) )
	{
		header("Location:signin.php?Field is empty!");
		exit();
	}

	$_SESSION['email'] = $_POST['email'];
	$_SESSION['designation'] = $_POST['designation'];

	if ($desig=="teacher") {
		$sql = "SELECT * FROM teacher where email='$email' and password='$pass'";
		$rs = mysqli_query($conn, $sql);
		$rows=mysqli_num_rows($rs);
		$info = mysqli_fetch_assoc($rs);

		if($rows != 0)
		{
			$_SESSION['fullname'] = $info['name'];

			header("Location: home.php?Successfullysignedin");
			exit();
		}
		else{
			header("Location: signin.php?Try again");
			exit();
		}
	}
	else{
		$sql = "SELECT * FROM student where email='$email' and password='$pass'";
		$rs = mysqli_query($conn, $sql);
		$rows=mysqli_num_rows($rs);
		$info = mysqli_fetch_assoc($rs);

		if($rows != 0)
		{

			$_SESSION['fullname'] = $info['name'];
			
			header("Location: home.php?Successfullysignedin");
			exit();
		}
		else{
			header("Location: signin.php?Here Try again");
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
				<li id="active"><a href="signin.php">Sign In</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul> 
		</div>

		
		<div id="table">	
			<form id="contact_form" action="signin.php" method="POST" enctype="multipart/form-data"> 

			<div class="row" style="text-align:left;">
					<label for="email">Email:</label><br />
					<input id="email" class="input" name="email" type="text" value="" size="30" /><br /><br>
				</div>

				<div class="row" style="text-align:left;">
					<label for="password">Password:</label><br />
					<input id="password" class="input" name="password" type="password" value="" size="30" /><br /><br>
				</div>

				<div class="row" style="text-align:left;">
					<label for="designation">Login As:</label><br />
					<input id="designation" class="input" name="designation" type="text" value="" size="30" placeholder="student/teacher" /><br />
				</div>

				<br>

				<div  style="text-align: left;">
					<input type="hidden" name="action" value="submit"/>
					<input id="submit_button" type="submit" name="submit_button" value="Sign In" />					
				</div>

				<div class="row" style="text-align: left;">
					Not registered? <a href="signup.php">Create an account</a>
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