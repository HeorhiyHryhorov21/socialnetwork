<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>

<!-- Updating image -->

<?php 
if (isset($_SESSION['u_id'])) :
	?>
	<?php 
	if(isset($_POST["change-image"])) :
		$file = file_get_contents($_FILES["image"]["tmp_name"]);
		$stmt = $pdo->prepare("UPDATE users SET user_img=? WHERE user_id=?");
		$stmt->execute([$file, $_SESSION['u_id']]);
		$stmt = null;
	endif;
	?>
	<!-- Updating userinfo-->
	<?php 

	if (isset($_POST['change-userinfo'])) :
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$username = $_POST['username'];

		$stmt = $pdo->prepare("UPDATE users
		SET user_first=?, user_last=?, user_email=?, user_uid=?
		WHERE user_id=user_id=?");
		$stmt->execute([$first, $last, $email, $username, $_SESSION['u_id']]);
        $stmt = null;
	endif;

	?>
	<!-- Fetching image -->

	<?php
    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY user_id DESC");
    $stmt->execute();
    $arr = $stmt->fetchAll();
    $stmt = null;
		?>
		<!-- Main content -->
		<div class="main-wrapper">
			<!-- Adding sidebar-->
			<?php include_once 'sidebar.php';?>
			<div class="profile">
					<div class="userinfo">
						<img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($arr[0]['user_img']).'"'; ?>>

						<h2>Change user's information</h2>
						<form action="changeinfo.php" method="POST">
							<ul><li>First name :</li>
								<li><input type="text" name="first" value=<?php
                                    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                                    $stmt->execute([$_SESSION['u_id']]);
                                    $arr = $stmt->fetchAll();
                                    $stmt = null;
								    if ($arr) {
								        echo $arr[0]['user_first'];
								    }
								?>></li></ul>
								<ul><li>Last name :</li>
									<li><input type="text" name="last" value=<?php
                                        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                                        $stmt->execute([$_SESSION['u_id']]);
                                        $arr = $stmt->fetchAll();
                                        $stmt = null;
                                        if ($arr) {
                                            echo $arr[0]['user_last'];
                                        }
									?>></p></li></ul>
									
									<ul><li>Username :</li><li><input type="text" name="username" value=<?php
                                            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                                            $stmt->execute([$_SESSION['u_id']]);
                                            $arr = $stmt->fetchAll();
                                            $stmt = null;
                                            if ($arr) {
                                                echo $arr[0]['user_uid'];
                                            }
									?>></li></ul>
									<ul><li>Email :</li>
										<li><input type="email" name="email" value=<?php
                                            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                                            $stmt->execute([$_SESSION['u_id']]);
                                            $arr = $stmt->fetchAll();
                                            $stmt = null;
                                            if ($arr) {
                                                echo $arr[0]['user_email'];
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

			<?php endif;	?>



	<?php include_once 'footer.php';?>