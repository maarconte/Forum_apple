<?php


include('includes/db.php');

if ( empty($_SESSION['users']) ) {
	header('Location: connection.html');
	die();
}

$request= $pdo->query('INSERT INTO  topics ( title,description,creatorId,creation ) VALUES ("'.$_POST['title'].'", "'.$_POST['description'].'","'.$_SESSION['users']['id'].'",NOW());');
$result=$request->fetchAll();
header('Location: accueil.php');


?>
