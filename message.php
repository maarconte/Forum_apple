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

$sql = 'INSERT INTO  messages ( creation,creatorId,topicId,message ) VALUES (NOW(), "'.$_SESSION['users']['id'].'","'. $_GET["id"].'","'.$_POST['message'].'";';
	
	die($sql);
$request= $pdo->query($sql);

header('Location: topic.php');

// print_r($result);
// die();

?>
