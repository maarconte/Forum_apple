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

$request= $pdo->query('INSERT INTO  messages ( creation,creatorId,topicId,message ) VALUES (NOW(), "'.$_SESSION['users']['id'].'","'.NULL.'","'.$_POST['message'].'";');

$result=$request->fetchAll();
header('Location: topic.php');

// print_r($result);
// die();

?>
