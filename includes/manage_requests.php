<?php

include_once 'dbh.inc.php';
session_start();

if ($_POST['action'] != 'deny') {
    $stmt = $pdo->prepare("UPDATE `users_friends` SET friend_status=? WHERE row_id=?");
    $stmt->execute(['active', $_POST['row_id']]);

} elseif($_POST['action'] != 'add') {
    $stmt = $pdo->prepare("UPDATE `users_friends` SET friend_status=? WHERE row_id=?");
    $stmt->execute(['denied', $_POST['row_id']]);
}
