<?php


$dsn = 'mysql:host=localhost;dbname=forumlepoles';
$user = 'root';
$pass = '';

$pdo = new PDO(
	$dsn,
	$user,
	$pass
);
session_start();

if ( empty($_SESSION['users']) ) {
	header('Location: connection.html');
	die();
}

$request= $pdo->query('INSERT INTO  topics ( title,description,creatorId,creation ) VALUES ("'.$_POST['title'].'", "'.$_POST['description'].'","'.$_SESSION['users']['id'].'",NOW());');

$result=$request->fetchAll();
header('Location: accueil.php');


?>
