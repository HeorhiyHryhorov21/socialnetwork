<?php session_start();?>
<?php include_once 'includes/dbh.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css?version=1">
</head>
<body>
	<header>
		<nav>
			<div class="header_wrapper">
				<ul>
					<li><a href="index.php">Home</a></li>
				</ul>
				<div class="nav-login">
					<?php if (isset($_SESSION['u_id'])) { ?>
						<a id="header-username" href="profile.php"><?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);
						if ($resultCheck > 0) {
							if ($row = mysqli_fetch_assoc($result)) {
								echo $row['user_first'];
							}

						}
						?></a>
						<?php 
						$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
						$result=mysqli_query($conn,$query);
						while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
							?>
							<div class="userinfo">
								<a id="header-profile-image" href="profile.php"><img src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></a>		
								<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name="submit">Log out</button>
								</form>
							<?php }?>
							<?php }?>
							<?php 
							if (!isset($_SESSION['u_id'])) {
								echo '<form action="includes/login.inc.php" method="POST">
								<input type="text" name="uid" placeholder="Username/e-mail">
								<input type="password" name="pwd" placeholder="Password">
								<button type="submit" name="submit">Log in</button>
								</form>
								<a href="signup.php">Sign up</a>
								<a href="forgot_password.php">Forgot password</a>';
							}

							?>

						</div>
					</div>
				</nav>
			</header>
