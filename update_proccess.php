<?php 
	// print_r($_POST);
	$id=$_POST['id'];
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
			
			$sql = "UPDATE `info` SET `user`='$un',`pass`='$pw' WHERE id = '$id'";
			$result = mysqli_query($conn, $sql);
			// if (mysqli_query($conn, $sql)) {
			//     echo "New record created successfully";
			// } else {
			//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			// }
			header('Location: update.php');
		}
	}

 ?>