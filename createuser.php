<?php
	require_once('db.php');
	$user = 'admin';
	$pass = md5('pass2013');
	$stmt = $db->prepare("INSERT INTO users VALUES ('', :user, :password, 'admin')");
	$stmt->bindValue(':user', $user, PDO::PARAM_STR);
	$stmt->bindValue(':password', $pass, PDO::PARAM_STR);
	$stmt->execute();
?>