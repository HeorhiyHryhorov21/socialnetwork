<?php 
session_start();

if (isset($_POST['submit'])) {

	include_once 'dbh.inc.php';

	$first  =   $_POST['first'];
	$last   =   $_POST['last'];
	$email  =   $_POST['email'];
	$uid    =   $_POST['uid'];
	$pwd    =   $_POST['pwd'];
	
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
                $stmt = $pdo->prepare("SELECT * FROM users WHERE user_uid=?");
                $stmt->execute([$uid]);
                $arr = $stmt->fetchAll();
                $stmt = null;

				if ($arr) {
					header("Location: ../signup.php?signup=usertaken");
					exit();
				} else {
					//matching passwords
			
					// Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//adding slashes to image
					$file = file_get_contents($_FILES["image"]["tmp_name"]);
					//Insert the user into the database
                    $stmt = $pdo->prepare("INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd, user_img, user_friends) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    $stmt->execute([$first, $last, $email, $uid, $hashedPwd, $file, 0]);

					//making autologin
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_uid=? or user_email=?");
                    $stmt->execute([$uid, $uid]);
                    $arr = $stmt->fetchAll();
                    $stmt = null;

					if (!$arr) {
						header("Location: ../index.php?login=error");
						exit();
					} else {
					$_SESSION['u_id'] = $arr[0]['user_id'];
					$_SESSION['u_first'] = $arr[0]['user_first'];
					$_SESSION['u_last'] = $arr[0]['user_last'];
					$_SESSION['u_email'] = $arr[0]['user_email'];
					$_SESSION['u_uid'] = $arr[0]['user_uid'];
					header("Location: ../index.php?login=success");
					exit();
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