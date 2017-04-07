<?php 
	session_start();
	if(!$_SESSION){
		header('Location: index.php');
	}
	$id=$_GET['id'];
	
	include "config.php";

	$sqlget = "DELETE FROM info WHERE id='$id'";
	$resultget = mysqli_query($conn, $sqlget);
	header('Location: delete.php');

 ?>