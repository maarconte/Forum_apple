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

$request= $pdo->query('DELETE FROM topics WHERE id="'.$_GET['id'].'"');
$result=$request->fetchAll();
header('Location: update_profil.php?id='.$_SESSION["users"]["id"].'');


?>
