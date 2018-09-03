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
			$query = "SELECT * FROM users ORDER BY user_id DESC";
			$result=mysqli_query($conn,$query);
			while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
				?>
				<div class="userinfo">
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>>

					<h2>User's information</h2>
					<form action="" method="POST">
						<ul><li>First name :</li>
							<li><p><?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
							$result = mysqli_query($conn, $sql);
							$resultCheck = mysqli_num_rows($result);
							if ($resultCheck > 0) {
								if ($row = mysqli_fetch_assoc($result)) {
									echo $row['user_first'];
								}

							}
							?></p></li></ul>
							<ul><li>Last name :</li>
								<li><p><?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									if ($row = mysqli_fetch_assoc($result)) {
										echo $row['user_last'];
									}

								}
								?></p></li></ul>
								
								<ul><li>Username :</li><li><p><?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									if ($row = mysqli_fetch_assoc($result)) {
										echo $row['user_uid'];
									}

								}
								?></p></li></ul>
								<ul><li>Email :</li><li><p><?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									if ($row = mysqli_fetch_assoc($result)) {
										echo $row['user_email'];
									}

								}
								?></p></ul>
								</ul>
								<ul><li>Number of friends :</li></ul>
								<ul><li><a href="changeinfo.php">Change user information</a></li></ul>
							</form>
						</div>
					</div>
				</div>
			<?php } ?>
		<?php }	?>
		<?php include_once 'footer.php';?>