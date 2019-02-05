<?php  include_once 'header.php'; ?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Sign up</h2>
		<form id="signup-form" action="includes/signup.inc.php" method="POST" enctype="multipart/form-data">
			<input type="text" name="first" placeholder="First name">
			<input type="text" name="last" placeholder="Last name">
			<input type="email" name="email" placeholder="E-mail">
			<input type="text" name="uid" placeholder="Username">
			<input type="password" name="pwd" placeholder="Password">
			<input type="file" name="image">
			<button type="submit" name="submit">Sign up</button>
		</form>
	</div>
</section>

</body>
</html>