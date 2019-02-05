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

<?php } else {
	?>
	<div class="home-page">


		<section id="showcase">
				<h1>George social network</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>
            <?php
            $stmt = $pdo->prepare("SELECT COUNT(user_id) FROM users");
            $stmt->execute();
            $arr = $stmt->fetch();
            $stmt = null;
			if ($arr) {
				if ($arr["COUNT(user_id)"] == 1) { ?>
					<h1><?php echo "We already have ". $arr["COUNT(user_id)"]." user" ?></h1>
                <?php
				} else { ?>
					<h1><?php echo "We already have ".$arr["COUNT(user_id)"]." users"?></h1>
                <?php
				}
			}
			?></p>
		</section>

		<section id="boxes">
            <div class="container">
				<div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/home-solid.svg">
                            <h3>Profile editing</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

                <div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/newspaper-solid.svg">
                            <h3>News</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

                <div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/user-friends-solid.svg">
                            <h3>Friends</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

                <div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/comments-solid.svg">
                            <h3>Messaging</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

                <div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/camera-solid.svg" class="svg">
                            <h3>Photos</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

                <div class="box flip-container" ontouchstart="this.classList.toggle('hover');">
                    <div class="box-content flipper">
                        <div class="front">
                            <img src="img/video-solid.svg">
                            <h3>Videos</h3>
                        </div>
                        <div class="back">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error rerum, nesciunt minima ullam vero sint qui doloremque libero quibusdam recusandae magnam laudantium, vel iure voluptates veniam autem consectetur. Sunt, quia.</p>
                        </div>
                    </div>
                </div>

            </div>

		</section>



        <div class="backwrap gradient">
            <div class="back-shapes">
                <em class="active epic-icon fa fa-desktop floating" style="top:65.50308008213553%;left:12.239583333333334%;animation-delay:-1.95s;"></em>
                <em class="active epic-icon fa fa-desktop floating" style="top:7.8028747433264884%;left:5.260416666666667%;animation-delay:-1.6s;"></em>
                <em class="active epic-icon fa fa-desktop floating" style="top:14.476386036960985%;left:33.4375%;animation-delay:-1.1s;"></em>
                <em class="active epic-icon fa fa-desktop floating" style="top:39.73305954825462%;left:22.916666666666668%;animation-delay:-4.7s;"></em>
                <em class="active epic-icon fa fa-instagram floating" style="top:46.50924024640657%;left:64.0625%;animation-delay:-1.5s;"></em>
                <em class="active epic-icon fa fa-instagram floating" style="top:73.40862422997947%;left:37.708333333333336%;animation-delay:-0.7s;"></em>
                <em class="active epic-icon fa fa-instagram floating" style="top:34.496919917864474%;left:42.447916666666664%;animation-delay:-0.05s;"></em>
                <em class="active epic-icon fa fa-instagram floating" style="top:34.496919917864474%;left:42.447916666666664%;animation-delay:-0.05s;"></em>
                <em class="active epic-icon fa fa-git-square floating" style="top:5.030800821355236%;left:17.1875%;animation-delay:-0.45s;"></em>
                <em class="active epic-icon fa fa-git-square floating" style="top:59.034907597535934%;left:36.458333333333336%;animation-delay:-4.5s;"></em>
                <em class="active epic-icon fa fa-git-square floating" style="top:8.521560574948666%;left:47.604166666666664%;animation-delay:-3.5s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:40.24640657084189%;left:9.166666666666666%;animation-delay:-0.05s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:76.28336755646818%;left:23.125%;animation-delay:-4.6s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:21.971252566735114%;left:69.73958333333333%;animation-delay:-4.2s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:21.86858316221766%;left:44.375%;animation-delay:-3.05s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:25.15400410677618%;left:27.03125%;animation-delay:-2.7s;"></em>
                <em class="active epic-icon fa fa-twitter floating" style="top:82.95687885010267%;left:51.71875%;animation-delay:-2.1s;"></em>
                <em class="active epic-icon fa fa-smile-o floating" style="top:68.17248459958932%;left:79.32291666666667%;animation-delay:-3.25s;"></em>
                <em class="active epic-icon fa fa-smile-o floating" style="top:15.40041067761807%;left:96.04166666666667%;animation-delay:-2.6s;"></em>
                <em class="active epic-icon fa fa-smile-o floating" style="top:11.396303901437372%;left:79.94791666666667%;animation-delay:-2.15s;"></em>
                <em class="active epic-icon fa fa-smile-o floating" style="top:10.574948665297741%;left:62.447916666666664%;animation-delay:-1.8s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:75.77002053388091%;left:31.145833333333332%;animation-delay:-3.95s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:27.82340862422998%;left:11.25%;animation-delay:-3.45s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:82.95687885010267%;left:3.9583333333333335%;animation-delay:-2.5s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:11.60164271047228%;left:29.635416666666668%;animation-delay:-2.05s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:26.078028747433265%;left:0.46875%;animation-delay:-1.5s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:49.07597535934291%;left:55.520833333333336%;animation-delay:-1.2s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:71.66324435318275%;left:49.114583333333336%;animation-delay:-0.95s;"></em>
                <em class="active epic-icon fa fa-whatsapp floating" style="top:41.37577002053388%;left:33.072916666666664%;animation-delay:-0.7s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:84.49691991786447%;left:19.166666666666668%;animation-delay:-1.65s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:44.558521560574945%;left:2.65625%;animation-delay:-1.15s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:51.74537987679671%;left:21.197916666666668%;animation-delay:-0.7s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:17.864476386036962%;left:57.65625%;animation-delay:-0.45s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:5.749486652977413%;left:34.583333333333336%;animation-delay:-0.15s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:66.0164271047228%;left:51.979166666666664%;animation-delay:-4.8s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:79.67145790554414%;left:76.61458333333333%;animation-delay:-4.5s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:39.52772073921971%;left:77.34375%;animation-delay:-4.25s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:29.363449691991786%;left:66.92708333333333%;animation-delay:-4.05s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:3.2854209445585214%;left:79.375%;animation-delay:-3.8s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:12.833675564681725%;left:51.666666666666664%;animation-delay:-3.55s;"></em>
                <em class="active epic-icon fa fa-wifi floating" style="top:34.90759753593429%;left:50.104166666666664%;animation-delay:-3.25s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:33.880903490759756%;left:17.552083333333332%;animation-delay:-1.65s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:20.32854209445585%;left:17.291666666666668%;animation-delay:-1.25s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:24.94866529774127%;left:42.291666666666664%;animation-delay:-0.85s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:28.33675564681725%;left:63.75%;animation-delay:-0.5s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:42.813141683778234%;left:61.197916666666664%;animation-delay:-0.2s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:62.62833675564682%;left:59.53125%;animation-delay:-4.95s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:71.66324435318275%;left:59.635416666666664%;animation-delay:-4.6s;"></em>
                <em class="active epic-icon fa fa-user floating" style="top:55.441478439425055%;left:39.84375%;animation-delay:-4.3s;"></em>

            </div>
        </div>
	</div>
    </div>
<?php } ?>
<?php include_once 'footer.php';?>