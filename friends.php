<?php  include_once 'header.php'; ?>
<?php include_once 'includes/dbh.inc.php'; ?>
<?php 
if (isset($_SESSION['u_id'])) :
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
                    <a href="requests.php">Requests</a>
				</form>

				<h1>Your Friends</h1>
				<ul>
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM users_friends WHERE user_id=? OR user_friend_id=?");
                    $stmt->execute([$_SESSION['u_id'], $_SESSION['u_id']]);
                    $row = $stmt->fetchAll();
                    $stmt = null;
                    if (isset($row)) :
                    foreach ($row as $item1 => $value1) :
                    if ($value1['friend_status'] != 'active') {
                        continue;
                    } else {
                    if($value1['user_id'] == $_SESSION['u_id']) {
                        $friend_id = $value1['user_friend_id'];
                    } elseif($value1['user_friend_id'] == $_SESSION['u_id']) {
                        $friend_id = $value1['user_id'];
                    }
                    }
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                    $stmt->execute([$friend_id]);
                    $data = $stmt->fetchAll();
                    $stmt = null;
                    if (isset($data)) :
                        foreach ($data as $item) :
                            ?>

                            <li><ul class="friends-list"><li><p><?php echo $item['user_first']." ".$item['user_last'];?></p>
                                        <p><a href="?delete" class="delete_friend">Delete from friends</a><input type="hidden" value=<?php echo $value1['row_id'];?>></p>
                                        <img id="profile-image" src=<?php echo '"data:image;base64,'.base64_encode($item['user_img']).'"'; ?>></li></ul></li>
                            <?php
                        endforeach;

                        ?>
                </ul>
			</div>
		</article>

    </div>
<?php endif; endforeach;  endif; endif;?>
<?php include_once 'footer.php';?>