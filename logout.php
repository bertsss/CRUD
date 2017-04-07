<?php 
	session_start();
	if (isset($_GET)) {

 		// print_r($_GET);
		session_destroy();
		// // print_r($_SESSION);
		header('Location: index.php');
 		// echo $_SESSION['username'];

	}

 ?>