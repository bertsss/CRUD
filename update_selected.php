<?php 
	// print_r($_GET['id']);
	session_start();
	if(!$_SESSION){
		header('Location: index.php');
	}
	$id=$_GET['id'];
	
	include "config.php";

	
	$sqlget = "SELECT * FROM info WHERE id='$id'";
	$resultget = mysqli_query($conn, $sqlget);
	$row = mysqli_fetch_row($resultget);

 ?>

 <!DOCTYPE html>
<html>
<head>
	<title>Exercise</title>
</head>
<body>
	<form action="update_proccess.php" method="POST">
		<input type="hidden" name="id" value=<?php echo $row[0]; ?> /> <br />
		<input type="text" name="user" value=<?php echo $row[1]; ?> /><br />
		<input type="password" name="pass" value=<?php echo $row[2]; ?> /><br />
		
		<button type="submit"> Update </button>
	</form>

</body>
</html>