<?php session_start();?>
<?php include_once 'includes/dbh.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>George Social Work</title>
    <link rel="shortcut icon" href="img/Paomedia-Small-N-Flat-Profile.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css?version=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
	<header>
		<nav>
			<div class="header_wrapper">
				<ul>
					<li><a href="index.php">GEORGE SOCIAL NETWORK</a></li>
				</ul>
				<div class="nav-login">
					<?php if (isset($_SESSION['u_id'])) : ?>
						<a id="header-username" href="profile.php">
                        <?php
                            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
                            $stmt->execute([$_SESSION['u_id']]);
                            $data = $stmt->fetchAll();
                            if (isset($data)) :
                                echo $data[0]['user_first'];

						?></a>
							<div class="userinfo">
								<a id="header-profile-image" href="profile.php"><img src=<?php echo '"data:image;base64,'.base64_encode($data[0]['user_img']).'"'; ?>></a>
								<form action="includes/logout.inc.php" method="POST">
									<button type="submit" name="submit">Log out</button>
								</form>
							<?php endif;endif; ?>
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
