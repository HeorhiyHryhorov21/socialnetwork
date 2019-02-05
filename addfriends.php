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
        <input type="text" name="search" placeholder="Search for new friends friends">
        <button type="submit" name="submit-search">Search</button>
    </form>

    <h1>Popular people</h1>
    <ul>
    <li><ul class="friends-list best-users"><ul><p><section id="carousel">
            <h1>Most popular users</h1>
            <div class="owl-carousel">
                <?php
                    $stmt = $pdo->prepare("SELECT * FROM users ORDER BY user_friends DESC LIMIT 5");
                    $stmt->execute();
                    $pop_user = $stmt->fetchAll();
                    $stmt = null;
                    foreach ($pop_user as $user => $user_info) : ?>
                        <div><img src=<?php echo '"data:image;base64,'.base64_encode($user_info['user_img']).'"'; ?>></div>
                    <?php
                    endforeach;
                    ?>

            </div>
        </section></p>
        </ul></ul>
    </li>
    <h1>Recommended users</h1>
    <ul>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM users_friends WHERE  user_id=? OR user_friend_id=?");
    $stmt->execute([$_SESSION['u_id'], $_SESSION['u_id']]);
    $row = $stmt->fetchAll();
    $stmt = null;
    $exclude = [$_SESSION['u_id']];
    if ($row) {
        foreach ($row as $item1 => $value1) :
            if ($value1['user_id'] == $_SESSION['u_id']) {
                array_push($exclude, $value1['user_friend_id']);
            }
            if ($value1['user_friend_id'] == $_SESSION['u_id']) {
                array_push($exclude, $value1['user_id']);
            }

        endforeach;
        $in = str_repeat('?,', count($exclude) - 1) . '?';
        $exclude = array_merge($exclude, $exclude);
        $sql = "SELECT * FROM users_friends WHERE user_id NOT IN($in) OR user_friend_id NOT IN($in)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($exclude);
        $row1 = $stmt->fetchAll();
        if ($row1) {
            $stmt = null;
            foreach ($row1 as $item2 => $value2) {
                if (!in_array($value2['user_id'], $exclude)) {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                    $stmt->execute([$value2['user_id']]);
                    $data = $stmt->fetchAll();
                    $stmt = null;
                    if ($data) :
                        foreach ($data as $item3) :
                            array_push($exclude, $item3['user_id']);
                            ?>

                            <li>
                                <ul class="friends-list">
                                    <li><p><?php echo $item3['user_first'] . " " . $item3['user_last']; ?></p>
                                        <p>
                                            <input type="submit" class="request_snd" value="Send a request">
                                            <input type="text" value="<?php echo $item3['user_id']; ?>" hidden>
                                        </p>
                                        <img id="profile-image"
                                             src=<?php echo '"data:image;base64,' . base64_encode($item3['user_img']) . '"'; ?>>
                                    </li>
                                </ul>
                            </li>
                        <?php

                        endforeach;
                    endif;
                }
                if (!in_array($value2['user_friend_id'], $exclude)) {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                    $stmt->execute([$value2['user_id']]);
                    $data = $stmt->fetchAll();
                    $stmt = null;
                    if ($data) :
                        foreach ($data as $item4) :
                            array_push($exclude, $item4['user_id']);
                            ?>

                            <li>
                                <ul class="friends-list">
                                    <li><p><?php echo $item4['user_first'] . " " . $item4['user_last']; ?></p>
                                        <p>
                                            <input type="submit" class="request_snd" value="Send a request">
                                            <input type="text" value="<?php echo $item4['user_id']; ?>" hidden>
                                        </p>
                                        <img id="profile-image"
                                             src=<?php echo '"data:image;base64,' . base64_encode($item4['user_img']) . '"'; ?>>
                                    </li>
                                </ul>
                            </li>
                        <?php

                        endforeach;
                    endif;
                }

                $in = str_repeat('?,', count($exclude) - 1) . '?';
                $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id NOT IN($in)");
                $stmt->execute($exclude);
                $data = $stmt->fetchAll();
                $stmt = null;
                if ($data) :
                    foreach ($data as $item5) :
                        array_push($exclude, $item5['user_id']);
                        ?>

                        <li>
                            <ul class="friends-list">
                                <li><p><?php echo $item5['user_first'] . " " . $item5['user_last']; ?></p>
                                    <p>
                                        <input type="submit" class="request_snd" value="Send a request">
                                        <input type="text" value="<?php echo $item5['user_id']; ?>" hidden>
                                    </p>
                                    <img id="profile-image"
                                         src=<?php echo '"data:image;base64,' . base64_encode($item5['user_img']) . '"'; ?>>
                                </li>
                            </ul>
                        </li>
                    <?php

                    endforeach;
                endif;


            }
        } else {
            $in = str_repeat('?,', count($exclude) - 1) . '?';
            $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id NOT IN($in)");
            $stmt->execute($exclude);
            $data = $stmt->fetchAll();
            $stmt = null;
            if ($data) :
                foreach ($data as $item5) :
                    array_push($exclude, $item5['user_id']);
                    ?>

                    <li>
                        <ul class="friends-list">
                            <li><p><?php echo $item5['user_first'] . " " . $item5['user_last']; ?></p>
                                <p>
                                    <input type="submit" class="request_snd" value="Send a request">
                                    <input type="text" value="<?php echo $item5['user_id']; ?>" hidden>
                                </p>
                                <img id="profile-image"
                                     src=<?php echo '"data:image;base64,' . base64_encode($item5['user_img']) . '"'; ?>>
                            </li>
                        </ul>
                    </li>
                <?php

                endforeach;
            endif;

        }
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id NOT IN(?)");
        $stmt->execute([$_SESSION['u_id']]);
        $data = $stmt->fetchAll();
        $stmt = null;
        if ($data) :
            foreach ($data as $item6) :
                array_push($exclude, $item6['user_id']);
                ?>

                <li>
                    <ul class="friends-list">
                        <li><p><?php echo $item6['user_first'] . " " . $item6['user_last']; ?></p>
                            <p>
                                <input type="submit" class="request_snd" value="Send a request">
                                <input type="text" value="<?php echo $item6['user_id']; ?>" hidden>
                            </p>
                            <img id="profile-image"
                                 src=<?php echo '"data:image;base64,' . base64_encode($item6['user_img']) . '"'; ?>>
                        </li>
                    </ul>
                </li>
            <?php

            endforeach;
        endif;
    }

    ?>
        </ul>
        </div>
        </article>


        </div>

    <?php   } ?>
<?php include_once 'footer.php';?>