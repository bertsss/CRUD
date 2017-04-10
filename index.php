 <?php 
 	session_start();

	if (isset($_POST['login'])) {
		$un = $_POST['uname'];
		$pw = $_POST['pass'];

		include "config.php";

		$sqlget = "SELECT * FROM info WHERE user='$un' AND pass='$pw' ";
		$resultget = mysqli_query($conn, $sqlget);
		// print_r(mysqli_fetch_array($resultget));
		if ($myrow=mysqli_fetch_array($resultget)) {
			$_SESSION['username'] = $myrow['user'];
			$_SESSION['avatar'] = $myrow['avatar_path'];
			$_SESSION['id'] = $myrow['id'];
			// print_r($_SESSION);
			header('Location: read.php');
		}
		else
		{
			echo "Invalid Input!";
			// header('Location: login.html');
		}
	}

	// if (isset($_GET['logout'])) {
	// 	echo "lalalala";
	// 	session_unregister('username');
	// }

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Exercise</title>
</head>
<body>
	<form method="POST" action="index.php">
			<input type="text" placeholder="username" name="uname" />
			<input type="password" placeholder="password" name="pass" />
			<input type="submit" name="login" />
	</form>
	<a href="create.html">Create</a>
</body>
</html>