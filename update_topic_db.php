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


$request= $pdo->query('UPDATE topics SET  title="'.$_POST['title'].'", description= "'.$_POST['description'].'" WHERE  id="'.$_GET['id'].'"');
$result=$request->fetchAll();


header('Location: profil.php?id='.$_SESSION["users"]["id"].'');
?>
