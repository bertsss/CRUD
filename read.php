<?php
	session_start();
	if(!$_SESSION){
		header('Location: index.php');
	}
	// print_r($_SESSION);
	// print_r($_POST);
	// session_start();
	// $un=$_POST['uname'];
	// $pw=$_POST['pass'];
	// $_SESSION['login_user']=$un;
	// $_SESSION['login_pass']=$pw;
	// print_r($_SESSION);
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
	<script src="jquery.js"></script>
	<style type="text/css">
	.hid { display: none; }
	</style>
</head>
<body>
<a href="create.html">create</a> | <a href="read.php">read</a> | <a href="update.php">update</a> | <a href="delete.php">delete</a> | <a href="search.php">search</a> | <a href="logout.php"><button>logout</button></a>

<div>
	<h1>View User</h1>
	<table border="1">

		<tr>
		<th>ID Number</th>
		<th>Username</th>
		<th>Password</th>
		</tr>

		<?php if (!empty($persons)) {
			foreach ($persons as $key => $user) {
		 ?>
			
		<tr>
		<td><?php echo $user['id']; ?></td>
		<td><?php echo $user['username']; ?></td>
		<td><?php echo $user['password']; ?></td>
		</tr>

		<?php	
			}
		}else{
		?> 

		<p>No Results Found!</p>

		<?php } ?>

		<tr>
		<td colspan="3">
			<?php for($b=1;$b<=$a;$b++) { ?>

			<a href="read.php?page=<?php echo $b; ?>" style="text-decoration:none"><?php echo $b. " "; ?></a>

			<?php }?>

		</tr>
	</table>

	
	<?php if ($_SESSION['avatar'] == null) {
		echo "You don't have avatar. Please upload here!"; ?>

		<form action="upload.php" method="post" enctype="multipart/form-data">
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Upload Image" name="submit">
		</form>

	<?php }else{ ?>
		<img src="<?php echo $_SESSION['avatar']; ?>" alt="Your avatar can't load!" height="200px" width="200px" id="lala">
		<h5>(Click your avatar if you want to change it)</h5>
		<div id="frm" class="hid">
			<form action="change_avatar.php" method="post" enctype="multipart/form-data">
			    <input type="file" name="changeAvatar" id="changeAvatar">
			    <input type="submit" value="ChangeAvatar" name="submit">
			</form>
		</div>
		<!-- <button id="lals"></button> -->
	<?php }?>

</div>

<script>
	$(document).ready(function(){
		$('#lala').click(function(){
			var x = confirm("Do you want to change your avatar?");
			if (x) {
				$('#frm').show();
			};
		});
	});
</script>


</body>
</html>