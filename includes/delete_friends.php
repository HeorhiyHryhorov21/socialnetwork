<?php

include_once 'dbh.inc.php';
session_start();

$stmt = $pdo->prepare("DELETE FROM `users_friends` WHERE row_id=?");
$stmt->execute([$_POST['row_id']]);