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
		
		<div align="center">	

		
		<table width="80%" border="1">
    		
    		<tr>
    		<td>File Name</td>
    		<td>File Type</td>
    		<td>File Size(KB)</td>
    		<td>View</td>
    		</tr>
    
    		<?php
 				
 				$sql="SELECT * FROM resource";
 				$result_set=mysqli_query($conn, $sql);
 				while($row=mysqli_fetch_array($result_set))
 				{
 					 ?>
        
        			<tr>
        			<td><?php echo $row['file'] ?></td>
        			<td><?php echo $row['type'] ?></td>
        			<td><?php echo $row['size'] ?></td>
        			<td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        			</tr>
        			
        			<?php
 				}
 			?>
    </table>
    
    	

		</div>

		<div id="footer">
			<font>
				&copy; Allright Reserved
			</font>	
		</div>	
	</body>
</html>