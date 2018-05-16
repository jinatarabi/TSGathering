<?php

include 'connection.php';

if(isset($_POST['btn-upload']))
{
	$file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
 	$file_size = $_FILES['file']['size'];
 	$file_type = $_FILES['file']['type'];
 	$folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $sql="INSERT INTO resource(file,type,size) VALUES('$final_file','$file_type','$new_size')";
  mysqli_query($conn,$sql);
  ?>
  <script>
  alert('successfully uploaded');
        window.location.href='home.php?success';
        </script>
  <?php
}
else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='home.php?fail';
        </script>
  <?php
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

			<?php
			$desig = $_SESSION['designation'];

			if($desig=="student")
			{
				header("Location: view.php?");
				exit();
			}

			?>
			<form action="resource.php" method="post" enctype="multipart/form-data">
 			<input type="file" name="file" />
 			<button type="submit" name="btn-upload">upload</button>
 			</form>

    		<br /><br />

    
    		<?php
 			
 				if(isset($_GET['success']))
 				{
  					?>
        			<label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        	
        		<?php
 					}
 					else if(isset($_GET['fail']))
 					{
  						?>
        			<label>Problem While File Uploading !</label>
        		<?php
 					}
 				else
 				{
  					?>
        			<label>Try to upload any files(PDF, DOC, EXE, VIDEO, MP3, ZIP,etc...)</label>
        		<?php
 				}

 				echo '<br><br>';
 			echo ("<button onclick=\"location.href='view.php'\">View Files</button>");

 			?>


		</div>

		<div id="footer">
			<font>
				&copy; Allright Reserved
			</font>	
		</div>	
	</body>
</html>