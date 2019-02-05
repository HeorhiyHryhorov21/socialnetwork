<?php

include_once 'dbh.inc.php';
session_start();
$stmt = $pdo->prepare("INSERT INTO users_friends(user_id, user_friend_id, friend_status) VALUES (?, ?, ?)");
$stmt->execute([$_SESSION['u_id'], $_POST['friend_id'], 'pending']);
