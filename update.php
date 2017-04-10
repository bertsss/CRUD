<?php 
	session_start();
	if(!$_SESSION){
		header('Location: index.php');
	}
	include "config.php";


	if ($_GET) {
		$page=$_GET["page"];
		if ($page=="" || $page=="1") {
			$index=0;
		}else{
			$index=($page*5)-5;
		}
	}else{
		$index=0;
	}
		


	$sqlget1 = "SELECT * FROM info LIMIT $index , 5 ";
	$resultget1 = mysqli_query($conn, $sqlget1);


	$sqlget = "SELECT * FROM info";
	$resultget = mysqli_query($conn, $sqlget);


	//for counting number of page
	$num = mysqli_num_rows($resultget);
	$a = $num/5;
	$a = ceil($a);


	$persons = array();
	if( $myrow=mysqli_fetch_array($resultget1) ){
		do{
			$per = array();
			$tmp['id'] = $myrow['id'];
			$tmp['username'] = $myrow['user'];
			$tmp['password'] = $myrow['pass'];
			$persons[] = $tmp;
		}while($myrow=mysqli_fetch_array($resultget1));
	}

	// print_r($persons[0]['username']);

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Exercise</title>
</head>
<body>
<a href="create.html">create</a> | <a href="read.php">read</a> | <a href="update.php">update</a> | <a href="delete.php">delete</a> | <a href="search.php">search</a> | <a href="logout.php"><button>logout</button></a>

<div>
<h1>Update User</h1>
<table border="1">
	<tr>
	<th>ID Number</th>
	<th>Username</th>
	<th>Password</th>
	<th>Action</th>
	</tr>


	<?php if (!empty($persons)) {
		foreach ($persons as $key => $user) {
	 ?>
		
	<tr>
	<td><?php echo $user['id']; ?></td>
	<td><?php echo $user['username']; ?></td>
	<td><?php echo $user['password']; ?></td>
	<td><a href="update_selected.php?id= <?php echo $user['id']; ?>"><button>Edit</button></a></td>
	</tr>

	<?php	
		}
	}else{
	?> 

	<p>No Results Found!</p>

	<?php } ?>

	<tr>
	<td colspan="4">
		<?php for($b=1;$b<=$a;$b++) { ?>

		<a href="update.php?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo $b. " "; ?></a>

		<?php }?>

	</tr>

</table>

	<?php if ($_SESSION['avatar'] == null) {
		echo "You don't have avatar! Please go to read page and upload your image!"; ?>

	<?php }else{ ?>
		<img src="<?php echo $_SESSION['avatar']; ?>" alt="Your avatar can't load!" height="200px" width="200px">
	<?php }?>

</div>
</body>
</html>