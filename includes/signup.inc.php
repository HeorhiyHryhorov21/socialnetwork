<?php 
session_start();

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//Error handlers
	//Check for empty fields

	if (empty($first) or empty($last) or empty($email) or empty($uid) or empty($pwd) or empty($_FILES["image"]["tmp_name"])) {
		header("Location: ../signup.php?signup=empty");
		exit();
	} else {
		//Check if input characters are valid
		if (!preg_match("/^[a-zA-Z]*$/", $first) or !preg_match("/^[a-zA-Z]*$/", $last)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			} else {
				//validating image
			if (((!$_FILES["image"]["type"] == "image/gif") || (!$_FILES["image"]["type"] == "image/jpeg") || (!$_FILES["image"]["type"] == "image/jpg")|| (!$_FILES["image"]["type"] == "image/png"))
			or (!$_FILES["image"]["size"] > 2000000)) {

				header("Location: ../signup.php?signup=image");
				exit();
			} else{
				$sql = "SELECT * FROM users WHERE user_uid='$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//matching passwords
			
					// Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//adding lashes to image
					$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_img) VALUES ('$first', '$last',  '$email', '$uid','$hashedPwd', '$file')";
					$result = mysqli_query($conn, $sql);
					//making autologin
					$sql = "SELECT * FROM users WHERE user_uid='$uid' or user_email='$uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
					if ($resultCheck < 1) {
						header("Location: ../index.php?login=error");
						exit();
					} else {
					if ($row = mysqli_fetch_assoc($result)) {
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
					}
				}
			}
		}
	}
  }
}
} else {
	header("Location: ../signup.php");
	exit();
}