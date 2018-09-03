<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>

<!-- Updating image -->

<?php 
if (isset($_SESSION['u_id'])) {
	?>
	<?php 
	if(isset($_POST["change-image"])) {  
		$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
		$query = "UPDATE users SET user_img='$file' WHERE user_id={$_SESSION['u_id']}";  
		if(mysqli_query($conn, $query)) {  
			
		}  
	}  
	?>
	<!-- Updating userinfo-->
	<?php 

	if (isset($_POST['change-userinfo'])) {
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$username = $_POST['username'];

		$sql = "UPDATE users
		SET user_first='$first', user_last='$last', user_email='$email', user_uid='$username'
		WHERE user_id=user_id={$_SESSION['u_id']}";
		if(mysqli_query($conn, $sql)) {  
			
		}  
	}

	?>
	<!-- Fetching image -->

	<?php 
	$query = "SELECT * FROM users ORDER BY user_id DESC";
	$result=mysqli_query($conn,$query);
	while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
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

						<h2>Change user's information</h2>
						<form action="changeinfo.php" method="POST">
							<ul><li>First name :</li>
								<li><input type="text" name="first" value=<?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
								$result = mysqli_query($conn, $sql);
								$resultCheck = mysqli_num_rows($result);
								if ($resultCheck > 0) {
									if ($row = mysqli_fetch_assoc($result)) {
										echo $row['user_first'];
									}

								}
								?>></li></ul>
								<ul><li>Last name :</li>
									<li><input type="text" name="last" value=<?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									if ($resultCheck > 0) {
										if ($row = mysqli_fetch_assoc($result)) {
											echo $row['user_last'];
										}

									}
									?>></p></li></ul>
									
									<ul><li>Username :</li><li><input type="text" name="username" value=<?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
									$result = mysqli_query($conn, $sql);
									$resultCheck = mysqli_num_rows($result);
									if ($resultCheck > 0) {
										if ($row = mysqli_fetch_assoc($result)) {
											echo $row['user_uid'];
										}

									}
									?>></li></ul>
									<ul><li>Email :</li>
										<li><input type="email" name="email" value=<?php $sql = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
										$result = mysqli_query($conn, $sql);
										$resultCheck = mysqli_num_rows($result);
										if ($resultCheck > 0) {
											if ($row = mysqli_fetch_assoc($result)) {
												echo $row['user_email'];
											}

										}
										?>></ul>
										<ul><li><input type="submit" name="change-userinfo" value="Change user information"></li></ul>
									</form>
									<!-- image update form-->
									<form id="change-image" method="post" enctype="multipart/form-data">
										<label id="changebutton">
											<span>Upload image</span>
											<input type="file" name="image" style="opacity: 0; z-index: -1;">
										</label>
										<input type="submit" name="change-image" value="Change image">

									</form> 
									
								</div>
							</div>
						</div>
					<?php } ?>
					
				<?php }	?>
			<?php }	?>



			<?php include_once 'footer.php';?>