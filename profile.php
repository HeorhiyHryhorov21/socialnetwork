<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php 
if (isset($_SESSION['u_id'])) {
	?>
	<!-- Main content -->
	
	<div class="main-wrapper">

		<!-- Adding sidebar-->

		<?php include_once 'sidebar.php';?>


		<div class="profile">

			<?php
            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
            $stmt->execute([$_SESSION['u_id']]);
            $arr = $stmt->fetchAll();
            $stmt = null; ?>
				<div class="userinfo">
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($arr[0]['user_img']).'"'; ?>>

					<h2>User's information</h2>
					<form action="" method="POST">
						<ul><li>First name :</li>
							<li><p><?php echo $arr[0]['user_first']; ?></p></li></ul>
							<ul><li>Last name :</li>
								<li><p><?php echo $arr[0]['user_last']; ?></p></li></ul>
								
								<ul><li>Username :</li><li><p><?php echo $arr[0]['user_uid']; ?></p></li></ul></ul>
                        <ul><li>Email :</li><li><p><?php echo $arr[0]['user_email']; ?></p></li></ul>
								</ul>
								<ul><li>Number of friends :</li><li><p><?php echo $arr[0]['user_friends']; ?></p></li></ul>
								<ul><li><a href="changeinfo.php">Change user information</a></li></ul>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php include_once 'footer.php';?>