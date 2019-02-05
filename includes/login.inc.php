<?php 

session_start();

if (isset($_POST['submit'])) {
	include 'dbh.inc.php';

	$uid = $_POST['uid'];
	$pwd = $_POST['pwd'];

	if (empty($uid) or empty($pwd)) {
		header("Location: ../index.php?login=empty");
		exit();
	}  else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_uid = ? OR user_email = ?");
        $stmt->execute([$uid, $uid]);
        $arr = $stmt->fetchAll();
        $stmt = null;

		if (!$arr) {
			header("Location: ../index.php?login=error");
			exit();
		} else {
				//De-hashing the password
				$hashedPwdCheck = password_verify($pwd, $arr[0]['user_pwd']);
				if ($hashedPwdCheck == false) {
					header("Location: ../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true) {
					//Log in the user the user
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

} else {
	header("Location: ../index.php?login=error");
	exit();
}