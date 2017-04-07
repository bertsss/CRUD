<?php 

	session_start();
	if(!$_SESSION){
		header('Location: index.php');
	}
	// print_r($_POST);
	$un=$_POST['user'];
	$pw=$_POST['pass'];
	if (isset($_POST)) {
		// echo "success";
		if ($_POST['user']=="" || $_POST['pass']=="") {
			echo "Please fill the empty field!";
		}
		else
		{
			include "config.php";
			$sql = "INSERT INTO `info`(`id`, `user`, `pass`) VALUES ('','$un','$pw')";
			$result = mysqli_query($conn, $sql);
			// if (mysqli_query($conn, $sql)) {
			//     echo "New record created successfully";
			// } else {
			//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// }
			header('Location: read.php');
		}
	}

	
 ?>