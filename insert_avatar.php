<?php

include('includes/db.php');

$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);


$request= $pdo->query('UPDATE users SET  avatar="'.$_POST['avatar'].'" WHERE  id="'.$_GET['id'].'"');
$result=$request->fetchAll();

header('Location: profil.php?id='.$_SESSION["id"].'');
?>