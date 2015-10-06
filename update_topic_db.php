<?php

include('includes/db.php');
include('includes/forum.php');

$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);

$forum=new Forum($pdo);
$update=$forum->updateTopic(
	$_POST['title'],
	$_POST['description'],
	$_GET['id']

	);


header('Location: profil.php?id='.$_SESSION["users"]["id"].'');
?>
