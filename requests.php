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

    <h1>Requests to be friends</h1>
    <ul>
    <?php
           $stmt = $pdo->prepare("SELECT * FROM users_friends WHERE user_id=? OR user_friend_id=?");
           $stmt->execute([$_SESSION['u_id'], $_SESSION['u_id']]);
           $row = $stmt->fetchAll();
           $stmt = null;
             if (isset($row)) :
                foreach ($row as $item1 => $value1) :
                    if($value1['friend_status'] != 'active' && $value1['friend_status'] != 'denied') {
                        if ($value1['user_id'] == $_SESSION['u_id']) {
                            $friend_id = $value1['user_friend_id'];
                            $rqst_sender = true;
                        } elseif($value1['user_friend_id'] == $_SESSION['u_id']) {
                            $friend_id = $value1['user_id'];
                            $rqst_sender = false;
                        }
                        $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id=?");
                        $stmt->execute([$friend_id]);
                        $data = $stmt->fetchAll();
                        $stmt = null;
                        if (isset($data)) :
                            foreach ($data as $item) :
                                if ($rqst_sender) {
                            ?>

                                    <li>
                                        <ul class="friends-list">
                                            <li>
                                                <p><?php echo $item['user_first'] . " " . $item['user_last']; ?></p>
                                                <p>
                                                    <?php
                                                    if($value1['friend_status'] != 'denied') {
                                                        echo "Your request is pending";
                                                    } elseif($value1['friend_status'] != 'pending') {
                                                        echo "Your request was denied";
                                                    }
                                                    ?>
                                                </p>
                                                <img id="profile-image"
                                                     src=<?php echo '"data:image;base64,' . base64_encode($item['user_img']) . '"'; ?>>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                } else { ?>
                                    <li>
                                        <ul class="friends-list">
                                            <li>
                                                <p><?php echo $item['user_first'] . " " . $item['user_last']; ?></p>
                                                <p>
                                                    <input type="button" class="add_friend" value="Add">
                                                    <input type="button" class="deny_friend" value="Deny">
                                                    <input type="hidden" class="friend_request_id" value=<?php echo $item['user_id'];?>>
                                                    <input type="hidden" class="relat_row" value=<?php echo $value1['row_id'];?>>
                                                </p>
                                                <img id="profile-image"
                                                     src=<?php echo '"data:image;base64,' . base64_encode($item['user_img']) . '"'; ?>>
                                            </li>
                                        </ul>
                                    </li>
                            <?php
                                }

                            endforeach;
                        endif;
                    } elseif($value1['friend_status'] != 'pending') {
                        continue;
                    }

               endforeach;
            endif;?>

        </ul>
        </div>
        </article>


        </div>

    <?php  } ?>
<?php include_once 'footer.php';?>