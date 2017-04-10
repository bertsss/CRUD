<?php
session_start();
if(!$_SESSION){
	header('Location: read.php');
}


if ($_FILES['fileToUpload']['error'] == 4) {
	echo "Please select an image!";

}else{

	// print_r($_FILES['fileToUpload']);

	$target_dir = "images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION); // Check if image file is a actual image or fake image

		
			if(isset($_POST["submit"])) {
				    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				    if($check !== false) {
				        // echo "File is an image - " . $check["mime"] . ".";
				        $uploadOk = 1;
				    } else {
				        // echo "File is not an image.";
				        $uploadOk = 0;
				    }
				    
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			    echo "Sorry, your file is too large, , cannot be uploaded";
			    $uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			    $uploadOk = 0;
			}
			if ($uploadOk == 1) {
			 	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { 
			 		include "config.php";
					$sql = "UPDATE info SET avatar_path = '$target_file' WHERE id = '$_SESSION[id]' ";
					if (mysqli_query($conn, $sql)) {
						$_SESSION['avatar'] = $target_file;
						// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
						header('Location: read.php');
					}else{
						echo "Something went wrong in database!";
					}
			    } //this upload your avatar in directory and db. Syntax($filename,$destination)
			    else {
			        echo "Sorry, there was an error uploading your file.";
			    }
			}
}

?>