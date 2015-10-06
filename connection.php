<?php

include('includes/db.php');
include('includes/forum.php');

$forum=new Forum($pdo);
$connexion=$forum->connexion(
	$_POST['email'],
	$_POST['password']

	);

if ( count($connexion) > 0 ) {
	
	$_SESSION['users'] = $connexion[0];
	header('Location: accueil.php');

} else {

	header('Location: connection.html');

}
