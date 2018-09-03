<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php 
if (isset($_SESSION['u_id'])) {
	?>

	<!-- Main content -->

	<div class="main-wrapper">

		<!-- Adding sidebar-->
		<?php include_once 'sidebar.php';?>

		<article>
			<h1>Welcome, <?php echo $_SESSION['u_first'];?></h1>

			<h2>Have you had anything new?</h2>

			<form action="postnews.php" method="POST">
				<input type="text" name="newsposting">
				<button type="submit">Post</button>
			</form>
			
			<h2>Your friends' news</h2>
			<ul>
				<li>Your friends' news</li>
				<li>Your friends' news</li>
				<li>Your friends' news</li>
				<li>Your friends' news</li>
				<li>Your friends' news</li>
			</ul>
		</article>
	</div>
<?php } else {
	?>
	<div class="home-page">
		
		
		<section id="showcase">
			<div class="container">
				<h1>George social network</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>
			<p><?php 
			$sql = "SELECT * FROM users";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck > 0) {
				if ($resultCheck == 1) {
					echo "<h1>We already have $resultCheck user</h1>";
				} else {
					echo "<h1>We already have $resultCheck users</h1>";
				}
			} 
			?></p>
		</section>
		<section id="boxes">
			<div class="container">
				<div class="box">
					<img src="img/home-solid.svg">
					<h3>Profile editing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>
				<div class="box">
					<img src="img/newspaper-solid.svg">
					<h3>News</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>

				<div class="box">
					<img src="img/user-friends-solid.svg">
					<h3>Friends</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>
				<div class="box">
					<img src="img/comments-solid.svg">
					<h3>Messaging</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>
				<div class="box">
					<img src="img/camera-solid.svg">
					<h3>Photos</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>
				<div class="box">
					<img src="img/video-solid.svg">
					<h3>Videos</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
				</div>
			</div>
		</section>
	</div>
<?php } ?>
<?php include_once 'footer.php';?>