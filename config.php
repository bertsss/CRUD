<?php 

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "practice";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname); //connecting to database
		// Check connection
		if (!$conn) {
	    	die("Connection failed: " . $conn->connect_error);
		} 
		// echo "Connected successfully";
 ?>