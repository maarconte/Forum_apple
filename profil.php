<?php


$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);


$request= $pdo->query('UPDATE users SET  pseudo="'.$_POST['pseudo'].'", email= "'.$_POST['email'].'" WHERE  id="'.$_GET['id'].'"');
$result=$request->fetchAll();

header('Location: accueil.php');
?>
