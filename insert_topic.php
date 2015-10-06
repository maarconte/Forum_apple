<?php


include('includes/db.php');
include('includes/forum.php');


if ( empty($_SESSION['users']) ) {
	header('Location: connection.html');
	die();
}

if ( !empty($_POST['description']) AND (!empty($_POST['title'])) ){

	$insert_topic= new Forum($pdo);

	$insert_topic->creerTopic(
	
	$_POST['title'],
	$_POST['description'],
	$_SESSION['users']['id'],
	$_POST['categorie']

	
	);

	header('Location: accueil.php');
	die();

}

else {
	header('Location: formulaire_topic.php');
}






?>
