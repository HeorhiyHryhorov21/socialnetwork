<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php 
if (isset($_SESSION['u_id'])) {
	?>

	<!-- Main content -->

	<div class="main-wrapper">

		<!-- Adding sidebar-->
		<?php include_once 'sidebar.php';?>

		<article id="friends-page">

			<div class="popular-users">

				<form action="search.php" method="POST">
					<input type="text" name="search" placeholder="Search your friends">
					<button type="submit" name="submit-search">Search</button>
					<a href="addfriends.php">Add new friends</a>
				</form>

				<h1>Your Friends</h1>
				<ul>
					<li><ul class="friends-list"><li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis</p>

				<?php 
					$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						?>
						
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></li></ul></li>
				
						
					<li><ul class="friends-list"><li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis</p>
						<?php 
					$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						?>
						
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></li></ul></li>

						<li><ul class="friends-list"><li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis</p>
						<?php 
					$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						?>
						
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></li></ul></li>


						<li><ul class="friends-list"><li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis</p>
						<?php 
					$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						?>
						
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></li></ul></li>


						<li><ul class="friends-list"><li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis</p>
						<?php 
					$query = "SELECT * FROM users WHERE user_id={$_SESSION['u_id']}";
					$result=mysqli_query($conn,$query);
					while ($row = mysqli_fetch_array($result, MYSQLI_BOTH)) {
						?>
						
					<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($row['user_img']).'"'; ?>></li></ul></li>
					</ul>
				</div>
			</article>


		</div>
	<?php } ?>
	<?php } ?>
	<?php } ?>
	<?php } ?>
<?php } ?>
<?php } ?>
<?php include_once 'footer.php';?>